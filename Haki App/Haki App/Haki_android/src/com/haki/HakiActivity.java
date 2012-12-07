package com.haki;

import android.app.TabActivity;
import android.content.Intent;
import android.content.res.Resources;
import android.os.Bundle;
import android.widget.TabHost;


public class HakiActivity extends TabActivity {
	
	
	
    /** Called when the activity is first created. */
   
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
      
        Resources res = getResources(); // Resource object to get Drawables
        TabHost tabHost = getTabHost();  // The activity TabHost
        TabHost.TabSpec spec;  // Reusable TabSpec for each tab
        Intent intent;  // Reusable Intent for each tab
        
      
        tabHost = getTabHost();  // The activity TabHost
        
        spec=getTabHost().newTabSpec("Home");
        //spec.setContent(R.id.home);
        Intent inspectionIntent = new Intent(this,Home.class);
        spec.setContent(inspectionIntent);
        spec.setIndicator("HOME", getResources().getDrawable(R.drawable.images1));
        getTabHost().addTab(spec);

        
        spec=getTabHost().newTabSpec("Crimes");
        Intent mapsIntent = new Intent(this,Crimes.class);
        spec.setContent(mapsIntent);
        spec.setIndicator("CRIMES", getResources().getDrawable(R.drawable.images1));
        getTabHost().addTab(spec);
 
        spec=getTabHost().newTabSpec("report");
        Intent mapsIntent1 = new Intent(this,Report.class);
        spec.setContent(mapsIntent1);
        spec.setIndicator("REPORT", getResources().getDrawable(R.drawable.images1));
        getTabHost().addTab(spec);
        
        spec=getTabHost().newTabSpec("quicklinks");
        Intent mapsIntent11 = new Intent(this,Quicklinks.class);
        spec.setContent(mapsIntent11);
        spec.setIndicator("QUICK LINKS", getResources().getDrawable(R.drawable.images1));
        getTabHost().addTab(spec);
        
     
        
        
       
        getTabHost().setCurrentTab(0);
      
    }
}