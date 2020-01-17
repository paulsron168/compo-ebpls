<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<head>
<title>Athle</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="css/webgis.css" />
	
	<!--<link rel="stylesheet" type="text/css" href="css/balamban.css"  media="screen" />-->
	<!--<link rel="stylesheet" type="text/css" href="css/tabs.css" media="screen"/>-->
	<!--<link rel="stylesheet" type="text/css" href="css/tabcontent.css" media="screen" />
	<script type="text/javascript" charset="utf-8" src="LoadingPanel.js"> </script>-->
	
	
	
    <link rel="stylesheet" type="text/css" href="js/ext/resources/css/ext-all.css"/>	  
    <script type="text/javascript" src="js/ext/adapter/ext/ext-base.js"></script>
    <script type="text/javascript" src="js/ext/ext-all.js"></script>
	<script type="text/javascript" src="js/openlayers/lib/OpenLayers.js"></script>
	
	
	
	<script type="text/javascript" src="js/geoext/lib/GeoExt.js"></script>

	<script type="text/javascript" src="js/webgis-new.js"></script>

	<script type="text/javascript" >
	Ext.namespace('Ext.sccdata');
	
	Ext.sccdata.barangays = [{$brgy_for_selectbox}];
	Ext.sccdata.landclass = [{$lclass_for_selectbox}];
	Ext.sccdata.land_use = [{$luse_for_selectbox}];
	
	Ext.sccdata.taxability = [{$taxability_for_selectbox}];
	Ext.sccdata.qryParcels = [{$qryParcels}];
	
	var username = "{$sess->username}";
	//var hostipaddress = "http://{$config->servername}/";
	var hostipaddress = "http://localhost/";
	var applicationpath = "$config->app_path}";
	
	var qry=0; //from  1 to 0
	var bypass=1;
	var sql = '';
	var cat ='';
	{if $G->cat} 
	//if search is made...
	var value="{$G->value}";
	var where="{$G->where}";
	var sql = "{$G->sql}";
	var cat="{$G->cat}";
	var ref_no="{$G->ref_no}";
	
	    bypass=0;
		qry=1;
		cat="{$G->cat}";
	{/if}
	</script>	
 	<script type="text/javascript" src="js/geoUtils.js"></script>	
    <script type="text/javascript" src="js/geoExplorer.js"></script>
   	<script type="text/javascript" src="js/LegendPanel.js"></script>
   	
    
    
    {literal}
    <style type="text/css">
        .x-panel-header {
    		color:#fff;
		}
		.container{
		width:100% !important;
		}
		#header { position: relative; background: /*color:#006DB0;*/#79d9f5 url('imgs/balamheader3.jpg') no-repeat 0 0; height:121px; width: 100%; margin:0; padding:0; }/
    </style>
    {/literal}  
	
</head>
<!--div id="alertme">

</div-->