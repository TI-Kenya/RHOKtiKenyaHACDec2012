package com.example.hakiyako;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class home extends Activity {
	public Button Button1,Button2,Button3;
	
protected void onCreate(Bundle savedInstanceState) {
		
		super.onCreate(savedInstanceState);
		setContentView(R.layout.home);
		Button1=(Button) findViewById(R.id.Profile);
		Button2=(Button) findViewById(R.id.complaints);
		Button3=(Button) findViewById(R.id.positive);
		Button1.setOnClickListener(new OnClickListener() {
			public void onClick(View v) {
				// TODO Auto-generated method stub
				Intent intent=new Intent();
				 intent.setClass(home.this,profile.class);
				 //intent.putExtra("usname", textw);
				 startActivity(intent);
				
			}
		});
		Button2.setOnClickListener(new OnClickListener() {
			public void onClick(View v) {
				// TODO Auto-generated method stub
				Intent intent=new Intent();
				 intent.setClass(home.this,screen1.class);
				 //intent.putExtra("usname", textw);
				 startActivity(intent);
				
			}
		});
		Button3.setOnClickListener(new OnClickListener() {
			public void onClick(View v) {
				// TODO Auto-generated method stub
			System.exit(0);
				
			}
		});
}
}