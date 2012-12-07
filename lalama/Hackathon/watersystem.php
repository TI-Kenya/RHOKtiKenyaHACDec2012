<?php
$xmin=$_GET['xmin'];
$ymin=$_GET['ymin'];
$xmax=$_GET['xmax'];
$ymax=$_GET['ymax'];
$wkid=$_GET['wkid'];
//$icon=$_GET['icon'];
//echo $xmin .",".$ymin.",".$xmax.",".$ymax.",".$wkid;

//require_once('load.php'); 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7, IE=9" />
    <!--The viewport meta tag is used to improve the presentation and behavior of the
    samples on iOS devices-->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no"/>
    <title>
      Water Problems viewer
    </title>
    <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/2.5/js/dojo/dijit/themes/claro/claro.css"/>
    <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/2.5/js/esri/dijit/css/Popup.css"/>
    <style>
      html, body { height: 100%; width: 100%; margin: 0; padding: 0; } .esriScalebar{
      padding: 20px 20px; } #map{ padding:0;}
    </style>
    <script type="text/javascript">
      var dojoConfig = {
        parseOnLoad: true
      };
    </script>
    <script type="text/javascript" src="http://serverapi.arcgisonline.com/jsapi/arcgis/?v=2.5">
    </script>
    <script type="text/javascript">
	
      dojo.require("dijit.layout.BorderContainer");
      dojo.require("dijit.layout.ContentPane");
      dojo.require("esri.map");
      dojo.require("esri.layers.FeatureLayer");
      dojo.require("esri.dijit.Popup");


      var map;
	  var loading;
      var featureLayer;
      var resizeTimer;
      var icon=new Array();
	  //var story="";

      function init() {
	  
	  
	    loading = dojo.byId("loadingImg");  //loading image. id
	  
        //setup the map's initial extent 			
        var initExtent = new esri.geometry.Extent({"xmin":<?php echo $xmin; ?>,"ymin":<?php echo $ymin; ?>,"xmax":<?php echo $xmax; ?>,"ymax":<?php echo $ymax; ?>,"spatialReference":{"wkid":<?php echo $wkid; ?>}});

		
        //create a popup to replace the map's info window
        var popup = new esri.dijit.Popup(null, dojo.create("div"));
		
        map = new esri.Map("map", {
          extent: initExtent,
          infoWindow: popup
        });
        
		dojo.connect(map,"onUpdateStart",showLoading);
        dojo.connect(map,"onUpdateEnd",hideLoading);

		
        //hide the popup if its outside the map's extent
        dojo.connect(map,"onMouseDrag",function(evt){
          if(map.infoWindow.isShowing){
            var loc = map.infoWindow.getSelectedFeature().geometry;
            if(!map.extent.contains(loc)){
              map.infoWindow.hide();
            }
          }
        });

        //Add the imagery layer to the map. View the ArcGIS Online site for services http://arcgisonline/home/search.html?t=content&f=typekeywords:service    
			
      var basemap = new esri.layers.ArcGISTiledMapServiceLayer("http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer");
      // map.addLayer(basemap);
		
		var mapz = new esri.layers.ArcGISDynamicMapServiceLayer("http://localhost:6080/arcgis/rest/services/kura/MapServer");
       map.addLayer(mapz);
		var mapzz = new esri.layers.ArcGISDynamicMapServiceLayer("http://localhost:6080/arcgis/rest/services/ElectionResults/MapServer/1");
       map.addLayer(mapzz);
		
          
        //create a feature collection for the flickr photos
		
		
		//the feature now
        var featureCollection = {
          "layerDefinition": null,
          "featureSet": {
            "features": [],
            "geometryType": "esriGeometryPoint"
          }
        };
		
		getGeodata("NAIROBI");	
		
		
		
        featureCollection.layerDefinition = {
          "geometryType": "esriGeometryPoint",
          "objectIdField": "ObjectID",
          "drawingInfo": {
            "renderer": {
              "type": "simple",
              "symbol": {
                "type": "esriPMS",
                "url": "./icons/{icon}",
                "contentType": "image/png",
                "width": 15,
                "height": 15
              }
            }
          },
          "fields": [{
            "name": "ObjectID",
            "alias": "ObjectID",
            "type": "esriFieldTypeOID"
          },{
            "name": "description",
            "alias": "Description",
            "type": "esriFieldTypeString"
          },{
            "name": "title",
            "alias": "Title",
            "type": "esriFieldTypeString"
          }]
        };
		
        //adding the layer data here
         
        //define a popup template
        var popupTemplate = new esri.dijit.PopupTemplate({
         // title: "{title}",
          description:"{description}",
		  showAttachments:true,
		  mediaInfos:[
		  {
		  "title": "SITE PHOTO",
		  "caption": "Picture showing the Current Status",
		  "type": "image",
		  "value":{
		  "sourceURL":"./images/{photo}",
		  "linkURL":"http://deadwildroses.files.wordpress.com/2010/03/farmers-market.jpg"
					}		
		  }
	
		  ]
		  
		  
        });
		
        popupTemplate.setTitle("Water and Pipe Breakages Points in NAIROBI City");
        //create a feature layer based on the feature collection
        featureLayer = new esri.layers.FeatureLayer(featureCollection, {
          id: 'flickrLayer',
          infoTemplate: popupTemplate
        });
		map.infoWindow.resize(450,425);
		
        //associate the features with the popup on click
        dojo.connect(featureLayer,"onClick",function(evt){
           map.infoWindow.setFeatures([evt.graphic]);
           map.infoWindow.show(evt.mapPoint);
        });
        
        dojo.connect(map,"onLayersAddResult",function(results){requestPhotos();});
        //add the feature layer that contains the flickr photos to the map
        map.addLayers([featureLayer]);
       
        dojo.connect(map, 'onLoad', function(theMap) {
          //resize the map when the browser resizes
          dojo.connect(dijit.byId('map'), 'resize', map,map.resize);
        });
      }

      
	  // function for loading the x,y locations and data from the PHP and MYSQL
	  
	  function  getGeodata(params){
	   
	  
	   var httpc= new XMLHttpRequest();
	 var url="load.php?province="+params;
	 
	 
	 httpc.open("POST",url,true);
	 
	 httpc.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	 httpc.setRequestHeader("Content-Length",params.length);
	 httpc.send(params); 
	 httpc.onreadystatechange=function(){
	 if(httpc.readyState==4 && httpc.status==200){
	  	 //alert(httpc.responseText);
		 var jsonResult = httpc.responseText;
		  result=eval('(' + jsonResult + ')');
		  	
			//get the data from the Json Objects
			var features = [];
			
			
			//loop through the json data;
		 dojo.forEach(result,function(item,i){
	     var attr = {};	
          		
			attr["description"] ="<b>LOCATION:</b>  <i>"+ item.name +"</i>" +
								"<hr><b>REGION:</b>  <i>"+item.region	+"</i>" +
								"<br /><b>PROBLEM:</b> <i><font color=\"#FF0000\"> "+item.problem_type	+"</i></font>" +								
								"<br /><b>TIME REPORTED:</b> <i> "+item.report_time+"</i>" +
								"<hr><b>Description:</b>  <i>"+item.description+"</i>"+
								"<br /><a target=\"self\" href=\"http://localhost/Hackathon/content.php?id="+item.id+ "\">Read More</a>";
                                 
		  attr["photo"]=item.photo;
		  icon[i]=item.icon;
		 
	      
          var geometry = esri.geometry.geographicToWebMercator(new esri.geometry.Point(item.point_x, item.point_y, map.spatialReference)); //setting to the 
          
          var graphic = new esri.Graphic(geometry);
          graphic.setAttributes(attr);
          features.push(graphic);
			
			});
			featureLayer.applyEdits(features, null, null);  
			} 
			
				 };
	
	 }//end of the function for communicating with the php script;
	 
	  //end of x,y findong
	  function showLoading() {
          esri.show(loading);
          map.disableMapNavigation();
          map.hideZoomSlider();
        }

        function hideLoading(error) {
          esri.hide(loading);
          map.enableMapNavigation();
          map.showZoomSlider();
        
        }
      dojo.ready(init);
    </script>
  </head>
  <body class="claro">
    <div data-dojo-type="dijit.layout.BorderContainer" data-dojo-props="design:'headline'"
    style="width: 100%; height: 100%; margin: 0;">
      <div id="map" data-dojo-type="dijit.layout.ContentPane" data-dojo-props="region:'center'"
      style="border:1px solid #000;padding:0;">
      </div>
	  <!--img id="loadingImg" src="images/loading.gif" style="position:absolute; right:400px; top:200px; z-index:100;" /-->
    </div>
  </body>

</html>
