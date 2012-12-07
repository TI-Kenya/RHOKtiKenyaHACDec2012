package com.haki;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class Home extends Activity {
	Button btnaboutus,btnmore,btncontacts;
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.home);
      btnaboutus=(Button) findViewById(R.id.button1) ; 
      btnaboutus.setOnClickListener(new OnClickListener() {
		
		public void onClick(View arg0) {
			startActivity(new Intent(Home.this, Aboutus.class));
		}
	});
     
      btncontacts=(Button) findViewById(R.id.button3) ; 
      btncontacts.setOnClickListener(new OnClickListener() {
		
		public void onClick(View arg0) {
			startActivity(new Intent(Home.this, Contacts.class));
		}
	});
      btnmore=(Button) findViewById(R.id.button2) ; 
      btnmore.setOnClickListener(new OnClickListener() {
		
		public void onClick(View arg0) {
			startActivity(new Intent(Home.this, More.class));
		}
	});
    }
}