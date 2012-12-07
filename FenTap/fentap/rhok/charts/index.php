<html>
<head>
    <!-- add the jQuery script -->
    <script type="text/javascript" src="scripts/jquery-1.6.2.min.js"></script>	
    <!-- add the jQWidgets framework -->
    <script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
    <!-- add one or more widgets -->
    <script type="text/javascript" src="../../jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="jqwidgets/jqxchart.js"></script>
<script type="text/javascript" src="jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxbuttons.js"></script>
    <!-- add one of the jQWidgets styles -->
    <link rel="stylesheet" href="jqwidgets/styles/jqx.darkblues.css" type="text/css" />
    <link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css" />
</head>
<body>
   
	
  
<script type="text/javascript">
    $(document).ready(function () {
// prepare the data
var source ={
datatype: "json",
datafields: [{ name: 'CompanyName' },{ name: 'ContactName' },{ name: 'ContactTitle' },{ name: 'Address' },{ name: 'City' },],
url: 'data.php'
};
$("#jqxgrid").jqxGrid({
source: source,
theme: 'classic',
columns: [{ text: 'Company Name', datafield: 'name', width: 250 },{ text: 'ContactName', datafield: 'email', width: 150 },{ text: 'Contact Title', datafield: 'app_date', width: 180 },{ text: 'Address', datafield: 'amount_app', width: 200 },{ text: 'City', datafield: 'app_date', width: 120 }]
});
});
</script>
<div id="jqxgrid"></div>
</html>