package me.ayush_03.banmanager;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;

import org.bukkit.ChatColor;
import org.bukkit.event.EventHandler;
import org.bukkit.event.Listener;
import org.bukkit.event.player.PlayerLoginEvent;
import org.bukkit.event.player.PlayerLoginEvent.Result;

public class PlayerLoginListener implements Listener {
	
	@EventHandler
	public void onLogin(PlayerLoginEvent e) {

		String uuid = e.getPlayer().getUniqueId().toString();
		
		try {
			HttpURLConnection connection = WebConnection.connect("check-ban", "uuid=" + uuid);

			BufferedReader in = new BufferedReader(new InputStreamReader(connection.getInputStream()));
			String response = in.readLine();
			
			if (response != null) {

				boolean isBanned = response.equals("true");
				
				if (isBanned) {
					e.setResult(Result.KICK_BANNED);
					e.setKickMessage(ChatColor.RED + "You have been banned!");
					
					//TODO: Add more info, such as the reason and banned by who..
				}
			}

		} catch (IOException ex) {
			ex.printStackTrace();
		}

	}
}
