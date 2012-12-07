package com.example.hakiyako;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.*;
public class MainActivity extends Activity{
	public TextView Textview1;
	public Button  Button1 ,Button2 ,Button3;
	public ProgressBar ProgressBar;


	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		Textview1=(TextView) findViewById(R.id.textView1);
		Button1=(Button) findViewById(R.id.feedback);
		Button2=(Button) findViewById(R.id.cancel);
		Button3=(Button) findViewById(R.id.profile);
		ProgressBar=(ProgressBar) findViewById(R.id.progressBar1);
		Button1.setOnClickListener(new OnClickListener() {
			public void onClick(View v) {
				// TODO Auto-generated method stub
				Intent intent=new Intent();
				 intent.setClass(MainActivity.this,screen1.class);
				 //intent.putExtra("usname", textw);
				 startActivity(intent);
				 
			}
		});
		Button3.setOnClickListener(new OnClickListener() {
			public void onClick(View v) {
				// TODO Auto-generated method stub
				Intent intent=new Intent();
				 intent.setClass(MainActivity.this,profile.class);
				 //intent.putExtra("usname", textw);
				 startActivity(intent);
		
		
	}
		});
	}
	
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.activity_main, menu);
		return true;
	}

}