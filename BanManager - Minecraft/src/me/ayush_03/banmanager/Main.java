package me.ayush_03.banmanager;

import org.bukkit.plugin.java.JavaPlugin;

public class Main extends JavaPlugin {
	
	public static String API_KEY;
	
	@Override
	public void onEnable() {
		
		saveDefaultConfig();
		API_KEY = getConfig().getString("api-key");
		
		// <------------------ Commands ----------------->
		getCommand("ban").setExecutor(new BanCommand());	
		
		// <------------------ Listeners ----------------->
		getServer().getPluginManager().registerEvents(new PlayerLoginListener(), this);

	}
	
	@Override
	public void onDisable() {
		
	}
}
