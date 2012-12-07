package com.haki;

import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class Quicklinks extends Activity {
	Button btnpolice,btnanticorruption,btnkhrc,btnconstitution,btnti;
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.quicklinks);
        btnpolice = (Button)findViewById( R.id.button1 );
        btnpolice.setOnClickListener( new View.OnClickListener()
        {
		public void onClick(View v)
		{
			Uri uri = Uri.parse( "http://www.kenyapolice.com" );
			startActivity( new Intent( Intent.ACTION_VIEW, uri ) );
		}
        });

     
        btnanticorruption = (Button)findViewById( R.id.button2 );
        btnanticorruption.setOnClickListener( new View.OnClickListener()
        {
		public void onClick(View v)
		{
			Uri uri1 = Uri.parse( "http://www.kenyaanticorruptioncommision.com" );
			startActivity( new Intent( Intent.ACTION_VIEW, uri1 ) );
		}
        });
        btnkhrc = (Button)findViewById( R.id.button3 );
        btnkhrc.setOnClickListener( new View.OnClickListener()
        {
		public void onClick(View v)
		{
			Uri uri2 = Uri.parse( "http://www.kenyahumanrightscommission.com" );
			startActivity( new Intent( Intent.ACTION_VIEW, uri2 ) );
		}
        });
        btnconstitution = (Button)findViewById( R.id.button4 );
        btnconstitution.setOnClickListener( new View.OnClickListener()
        {
		public void onClick(View v)
		{
			Uri uri3 = Uri.parse( "http://www.kenyaconstitution.com" );
			startActivity( new Intent( Intent.ACTION_VIEW, uri3 ) );
		}
        });
        btnti = (Button)findViewById( R.id.button5 );
        btnti.setOnClickListener( new View.OnClickListener()
        {
		public void onClick(View v)
		{
			Uri uri4 = Uri.parse( "http://www.mgmblog.com" );
			startActivity( new Intent( Intent.ACTION_VIEW, uri4 ) );
		}
        });

    }
}