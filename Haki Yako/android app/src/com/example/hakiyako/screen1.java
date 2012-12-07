package com.example.hakiyako;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.TextView;

public class screen1 extends Activity {
	public TextView Textview1;
	public Button  Button1 , Button2 ,Button3;
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.screen1);	
		
		Button1=(Button) findViewById(R.id.home);
		Button1.setOnClickListener(new OnClickListener() {
			public void onClick(View v) {
				// TODO Auto-generated method stub
				Intent intent=new Intent();
				 intent.setClass(screen1.this,home.class);
				 //intent.putExtra("usname", textw);
				 startActivity(intent);
				
			}
		});
		Button2=(Button) findViewById(R.id.post);
		Button2.setOnClickListener(new OnClickListener() {
			public void onClick(View v) {
				// TODO Auto-generated method stub
				Intent intent=new Intent();
				 intent.setClass(screen1.this,ref.class);
				 //intent.putExtra("usname", textw);
				 startActivity(intent);
				
			}
		});
}
}
