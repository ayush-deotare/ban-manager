package me.ayush_03.banmanager;

import java.io.DataOutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.Charset;

public class WebConnection {

	public static HttpURLConnection connect(String api, String args) {

		try {
			args = "key=" + Main.API_KEY + "&" + args;
			byte[] data = args.getBytes(Charset.forName("UTF-8"));
			int dataLength = args.length();
			URL url = new URL("http://" + "localhost" + "/banmanager/api/" + api + ".php");

			HttpURLConnection connection = (HttpURLConnection) url.openConnection();
			connection.setDoInput(true);
			connection.setDoOutput(true);
			connection.setRequestMethod("POST");
			connection.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
			connection.setRequestProperty("charset", "UTF-8");
			connection.setRequestProperty("Content-Length", String.valueOf(dataLength));

			DataOutputStream out = new DataOutputStream(connection.getOutputStream());
			out.write(data);
			out.flush();
			out.close();

			return connection;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}

}
