package com.android.infobreak;

import java.util.ArrayList;
import java.util.Arrays;


import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.ActionBar;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.widget.DrawerLayout;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.os.Build;

public class MainActivity extends ActionBarActivity {
	DrawerLayout drawer_layoutS;
	ListView slide_menuS;
	ArrayAdapter<String> listAdapter;
	String[] menuNames = new String[] { "What's new", "Favorites", "Settings"};

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		defaultPage();
		refIds();
		
		ArrayList<String> menuNamesHolder = new ArrayList<String>();  
		menuNamesHolder.addAll(Arrays.asList(menuNames));  
		
			listAdapter = new ArrayAdapter<String>(this, R.layout.slidemenurowlayout, menuNamesHolder); 
			slide_menuS.setAdapter(listAdapter);
			slide_menuS.setOnItemClickListener(new SlideMenuClickListener());
		
		}
	
	private class SlideMenuClickListener implements ListView.OnItemClickListener {
		@Override
			public void onItemClick(AdapterView<?> parent, View view, int position,long id) {
				displayView(position);
			}
		}
	
	public void defaultPage(){
		Fragment fragment = new WhatsNew();
		
		if (fragment != null) {
			FragmentManager fragmentManager = getSupportFragmentManager();
			fragmentManager.beginTransaction().replace(R.id.frame_container, fragment).commit();
		} 
	}
	
	private void displayView(int position) {

		Fragment fragment = null;
			switch (position) {
				case 0:
					fragment = new WhatsNew();
					break;
				case 1:
					fragment = new Favorite();
					break;
				case 2:
					fragment = new Settings();
					break;

				default:
					break;
			}

			if (fragment != null) {
				FragmentManager fragmentManager = getSupportFragmentManager();
				fragmentManager.beginTransaction().replace(R.id.frame_container, fragment).commit();

				slide_menuS.setItemChecked(position, true);
				slide_menuS.setSelection(position);
				drawer_layoutS.closeDrawer(slide_menuS);
			} 
			
			
	}

	
	
	
	public void refIds(){
		drawer_layoutS = (DrawerLayout) findViewById(R.id.drawer_layout);
		slide_menuS = (ListView) findViewById(R.id.slide_menu);
		
	}
	
	}

	
