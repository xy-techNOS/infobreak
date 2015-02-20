package com.android.infobreak;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;


public class Favorite extends Fragment{
	
	View rootView;
	
	public Favorite(){}
    
	
    	@Override
    	public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
    		rootView = inflater.inflate(R.layout.favoriteslayout, container, false);
    
          
    		return rootView;
    	}

}
