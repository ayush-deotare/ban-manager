package me.ayush_03.banmanager;

import org.bukkit.Bukkit;
import org.bukkit.ChatColor;
import org.bukkit.OfflinePlayer;
import org.bukkit.command.Command;
import org.bukkit.command.CommandExecutor;
import org.bukkit.command.CommandSender;

public class UnbanCommand implements CommandExecutor {
	
	@Override
	public boolean onCommand(CommandSender sender, Command cmd, String label, String[] args) {
		
		if (cmd.getName().equalsIgnoreCase("unban")) {
			if (!sender.hasPermission("banmanager.unban")) {
				sender.sendMessage(ChatColor.RED + "You do not have permission to execute this command!");
				return true;
			}
			
			if (args.length != 1) {
				sender.sendMessage(ChatColor.RED + "Usage: /unban <player>");
				return true;
			}
			
			@SuppressWarnings("deprecation")
			OfflinePlayer target = Bukkit.getOfflinePlayer(args[0]);
			
			if (target == null || !target.hasPlayedBefore()) {
				sender.sendMessage(ChatColor.RED + "Cannot find any player with that name!");
				return true;
			}
			
			// TODO: Open connection with the API...
			
		}
		
		return true;
	}

}
