package com.android.infobreak;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;


public class Settings extends Fragment{
	View rootView;
	
	public Settings(){}
    
	
    	@Override
    	public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
    		rootView = inflater.inflate(R.layout.settingslayout, container, false);
    
          
    		return rootView;
    	}

}
