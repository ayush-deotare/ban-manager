package me.ayush_03.banmanager;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;

import org.bukkit.Bukkit;
import org.bukkit.ChatColor;
import org.bukkit.OfflinePlayer;
import org.bukkit.command.Command;
import org.bukkit.command.CommandExecutor;
import org.bukkit.command.CommandSender;
import org.bukkit.entity.Player;

public class BanCommand implements CommandExecutor {

	@Override
	public boolean onCommand(CommandSender sender, Command cmd, String label, String[] args) {

		if (cmd.getName().equalsIgnoreCase("ban")) {

			if (!sender.hasPermission("banmanager.ban")) {
				sender.sendMessage(ChatColor.RED + "You do not have permission to execute this command!");
				return true;
			}

			if (args.length < 2) {
				sender.sendMessage(ChatColor.RED + "Usage: /ban <player> <reason>");
				return true;
			}

			@SuppressWarnings("deprecation")
			OfflinePlayer target = Bukkit.getOfflinePlayer(args[0]);

			if (target == null || !target.hasPlayedBefore()) {
				sender.sendMessage(ChatColor.RED + "Cannot find any player with that name!");
				return true;
			}

			String uuid = target.getUniqueId().toString();
			String bannedBy;

			if (sender instanceof Player) {
				Player p = (Player) sender;

				if (target.getUniqueId().equals(p.getUniqueId())) {
					p.sendMessage(ChatColor.RED + "You cannot ban yourself!");
					return true;
				}

				bannedBy = p.getUniqueId().toString();

			} else {
				bannedBy = "CONSOLE";
			}

			String reason = "";

			for (int i = 1; i < args.length; i++) {
				reason += args[i] + " ";
			}

			reason.trim();

			try {
				HttpURLConnection connection = WebConnection.connect("ban",
						"uuid=" + uuid + "&by=" + bannedBy + "&reason=" + reason.replaceAll(" ", "%20"));
				BufferedReader in = new BufferedReader(new InputStreamReader(connection.getInputStream()));

				String response = in.readLine();

				if (response == null) {
					sender.sendMessage(ChatColor.RED + "There is some problem with the configuration.");
					return true;
				}

				if (response.contains("Error:")) {
					sender.sendMessage(ChatColor.RED + response);
					return true;
				}

				// Success, player banned.
				sender.sendMessage(ChatColor.GREEN + response);

			} catch (IOException e) {
				e.printStackTrace();
			}
		}
		return true;
	}
}
