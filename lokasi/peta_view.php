<?php
include('inc/config.php');
?>
<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<script src="https://maps.googleapis.com/maps/api/js?AIzaSyCeVAAEkS11WUBoIQQVoWQ8TwD54k4v7m0&sensor=false"></script>
  
          <style type="text/css">
          	#map img { 
  max-width: none;
}

#map label { 
  width: auto; display:inline; 
} 
          	
          </style>
</head> 
<body>
	

  <div id="map" style="width: 650px; height: 300px;"></div>

  <script type="text/javascript">

  var locations = [
   <?php
            
            	$sql_lokasi="SELECT idlokasi,nama,lat,lng
            	FROM lokasi ";
            	$result=mysqli_query($koneksi, $sql_lokasi) or die(mysql_error());
            	while($data=mysqli_fetch_object($result)){
            		 ?>
            		    ['<?=$data->nama;?>', '<?=$data->lat;?>', '<?=$data->lng;?>'],
       <?php
				}
		?>
		
    
    ];

  

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i))) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      }((marker, i));
    }

  
  </script>
</body>
</html>