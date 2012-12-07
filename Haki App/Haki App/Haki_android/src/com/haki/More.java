package com.haki;

import android.app.ListActivity;
import android.content.Intent;

import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

public class  More extends ListActivity {
	//The ListActivity class provides a way of binding a source data (an array or cursor) to a ListView object through a ListAdapter
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        //Binding the ArrayAdapter to the ListActivity by calling the setListAdapter()method
        setListAdapter(new ArrayAdapter<String>(this,R.layout.more,Complaints));
        //binding the ArrayAdapter to the ListActivity
        ListView lv=getListView();
        lv.setTextFilterEnabled(true);
        lv.setOnItemClickListener(new OnItemClickListener()
        {
        	public void onItemClick(AdapterView<?> parent, View view, int position, long Id)
        	{
        		Toast.makeText(getApplicationContext(), ((TextView)view).getText(), Toast.LENGTH_LONG).show();
        	}});
       }
    	static final String []Complaints =new String []{
    		"By sending a message to 254713606944 or 12052181783", "By sending an email to kenya@ushahidi.com",
    		"By sending a tweet with the hashtag/s #KEVarsityDemo", "By filling a form  at the website"
    	};
}