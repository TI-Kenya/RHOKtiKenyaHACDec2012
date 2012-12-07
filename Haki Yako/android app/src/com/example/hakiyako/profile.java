package com.example.hakiyako;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class profile extends Activity {
	public Button Button1;
	protected void onCreate(Bundle savedInstanceState) {
		
		super.onCreate(savedInstanceState);
		setContentView(R.layout.profile);
		Button1=(Button) findViewById(R.id.home1);
		Button1.setOnClickListener(new OnClickListener() {
			public void onClick(View v) {
				// TODO Auto-generated method stub
				Intent intent=new Intent();
				 intent.setClass(profile.this,home.class);
				 //intent.putExtra("usname", textw);
				 startActivity(intent);
				
			}
		});

}

}
