package com.haki;

import android.app.Activity;
import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class Report extends Activity {
    /** Called when the activity is first created. */
    @Override
public void onCreate(Bundle savedInstanceState) {
super.onCreate(savedInstanceState);
setContentView(R.layout.report);

WebView myWebView = (WebView) findViewById(R.id.webView1);
myWebView.loadUrl("http://kenya.ushahidi.com/");

WebSettings webSettings = myWebView.getSettings();
webSettings.setJavaScriptEnabled(true);

myWebView.setWebViewClient(new WebViewClient());
    }

}


