package com.example.hakiyako;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class ref extends Activity {
	public Button Button1 ;
	protected void onCreate(Bundle savedInstanceState) {
	super.onCreate(savedInstanceState);
	setContentView(R.layout.ref);
	
	Button1.setOnClickListener(new OnClickListener() {
		public void onClick(View v) {
			// TODO Auto-generated method stub
			Intent intent=new Intent();
			 intent.setClass(ref.this,screen1.class);
			 //intent.putExtra("usname", textw);
			 startActivity(intent);
			
		}
	});
}
}

