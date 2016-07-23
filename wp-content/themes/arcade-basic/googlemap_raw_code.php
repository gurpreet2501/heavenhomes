<?php /*<style>
body{
 background: #333 !important;
}
#map-canvas {
  height: 600px !important;
  margin: auto;
  padding: 0;
  width: 800px !important;
}
@media only screen 
and (max-device-width : 480px) {
 #map-canvas {
  height: 100% !important;
  margin: auto;
  padding: 0;
  width: 100% !important;
 }
}
</style>

<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri().'/style.css'?>" />
<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri().'/css/style.css'?>" />
<script src="<?=get_template_directory_uri().'/js/markers.js'?>"></script>
<script src="<?=get_template_directory_uri().'/js/markers_compiled.js'?>"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmDZPtx7uFq0i3bLKIXjWA9QJ38XGdMfM"></script>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVGeOlG-oGCCteMnKE9sY7tAdrws5BVg0"></script> -->
<? //$data=query_posts('post_type=markers', 'posts_per_page=12'); 
  $data = get_posts(array(
	'post_type' => 'markers',
	'posts_per_page' => -1,
	'post_status' => 'publish',
   
  ));
$marker_data=array();
foreach($data as $value){
   $long_lat=get_post_custom($value->ID); 
	 $long= $long_lat['wpcf-longitude'][0];
	 $lat= $long_lat['wpcf-lattitude'][0];
	 $markers_data[]=array(
		'title' => $value->post_title,
		'longitude' => $long, 
		'lattitude' => $lat,
		'permalink' => get_post_permalink($value->ID),
	 ); 
	 
 }
 
 ?>
<div class="maps_page_top_bar">
 <div class="text-center"><a href="/">Back To Home <h4>(The numbering shows the markers Cluster. Just Click it to see more)</h4></a></div>
</div>
<div class="parent-map-markers">
 <script>
	 var $ = jQuery.noConflict();
	 var all_markers=<?=json_encode($markers_data)?>;
		 function initialize() {
					var myLatlng = new google.maps.LatLng(30.355882,76.404922); 
						var mapOptions = {
							zoom: 15,
							center: myLatlng,
							//styles: [{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#b5cbe4"}]},{"featureType":"landscape","stylers":[{"color":"#efefef"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#83a5b0"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#bdcdd3"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e3eed3"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}]
							
						}
					 var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
					 var markers = [];
					 var mcOptions = {gridSize: 50, maxZoom: 15};
		   //To add the marker to the map, use the 'map' property
					 $.each(all_markers,function(index,value){
						  var new_marker = new google.maps.LatLng(value.longitude, value.lattitude);
							console.log(new_marker);
							var marker = new google.maps.Marker({
											position: new_marker,
											map: map,
											title: value.title,
											link: value.permalink
							});
						markers.push(marker);
						google.maps.event.addListener(marker, 'click', function () {
								window.location.href = value.permalink;	 
						 });
					});
					var markerCluster = new MarkerClusterer(map, markers);		 
						
			}
	  google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</div>
<div id="map-canvas"></div> */?>