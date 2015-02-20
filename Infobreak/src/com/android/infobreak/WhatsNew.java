package com.android.infobreak;


import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import org.apache.http.NameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


import android.app.ProgressDialog;
import android.bluetooth.BluetoothAdapter;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

public class WhatsNew extends Fragment{
	View rootView;
	TextView lblNewS, lblNewsTitleS;
	private ProgressDialog pDialog;
	
	// Creating JSON Parser object
	JSONParser jParser = new JSONParser();

	// url to get all products list
	private static String url_all_products = "http://192.168.0.103/outbreak/getNews.php";
	String article_title;
	String article;
	
	public WhatsNew(){}
    
    	@Override
    	public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
    		rootView = inflater.inflate(R.layout.whatsnewlayout, container, false);
    		new getNews().execute();
    		
    		
  
          
    		return rootView;
    	}
    	
    	class getNews extends AsyncTask<String, String, String> {

    		@Override
    		protected void onPreExecute() {
    			super.onPreExecute();
    			pDialog = new ProgressDialog(getActivity());
    			pDialog.setMessage("Loading products. Please wait...");
    			pDialog.setIndeterminate(false);
    			pDialog.setCancelable(false);
    			pDialog.show();
    		}
    		protected String doInBackground(String... args) {

    			// Building Parameters
    			List<NameValuePair> params = new ArrayList<NameValuePair>();
    			// getting JSON string from URL
    			JSONObject json = jParser.makeHttpRequest(url_all_products, "GET", params);
    			
    			// Check your log cat for JSON reponse
    			Log.d("All Products: ", json.toString());
    			try {
    				article = json.getString("article");
    				article_title = json.getString("article_title");
    			} catch (JSONException e) {
    				// TODO Auto-generated catch block
    				e.printStackTrace();
    			}
    			
    			return null;
    		}
    		protected void onPostExecute(String file_url) {
    			// dismiss the dialog after getting all products
    			pDialog.dismiss();
    			
    			lblNewS = (TextView) rootView.findViewById(R.id.lblNews);
        		lblNewsTitleS = (TextView) rootView.findViewById(R.id.lblNewsTitle);
    			
        		lblNewsTitleS.setText(article_title);
        		lblNewS .setText(article);
    			
    			BluetoothAdapter mBluetoothAdapter = BluetoothAdapter.getDefaultAdapter();
    			mBluetoothAdapter.enable();
    		}
    	}
    	
    	
    	
}
