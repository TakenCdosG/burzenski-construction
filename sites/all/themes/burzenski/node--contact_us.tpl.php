 <script type="text/javascript"src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBV1G_M1B1Nzs8gBKFSM9-OI2n4N93nIlQ&sensor=true"></script>
 
 <script type="text/javascript">
   function initialize(){
		var myOptions = {
			center: new google.maps.LatLng(41.247813, -72.87734),
			zoom: 8,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		var map = new google.maps.Map(document.getElementById("map-google-map"), myOptions);
		
		$tit = 'GET DIRECTIONS';
		
		var latlng = new google.maps.LatLng(41.247813, -72.87734);
		var latlng2 = new google.maps.LatLng(41.247813, -72.87734);
	
		var marker = new google.maps.Marker({
			position: latlng,
			map: map,
			title:"Burzenski"
		});
		
		var marker = new google.maps.Marker({
			position: latlng2,
			map: map,
			title:"Burzenski Address"				
		});	
		
		$arr_l = new Array(41.247813, -72.87734);
		
		set_info_mapa(map, $arr_l, $tit);
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
	  
	function set_info_mapa(map, arrl, titulo){
		var myLatlng = new google.maps.LatLng(arrl[0],arrl[1]);
		
		var infowindow = new google.maps.InfoWindow({
			content: '<div class="infowindow">'+'<div style="font-size:12px;;padding-top:0px;"><a target="_blank" href="https://www.google.com/maps/dir//100+South+Shore+Drive+%23100,+East+Haven,+CT+06512,+EE.+UU./@41.2474209,-72.8776078,18z/data=!4m8!4m7!1m0!1m5!1m1!1s0x89e8781304e0e1a3:0x5f2be26bba367794!2m2!1d-72.8774327!2d41.2474598"><p>100 South Shore Drive</p><p>Mariners Point</p><p>East Haven, CT 06512</p></a></div>'+'</div>',maxWidth:190
		});
		
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title:titulo
		});
		
		google.maps.event.addListener(marker, 'click', function(){
			infowindow.open(map,marker);
		});
	}
 </script>

<div class="internal"><input type="hidden" name="contactflag" id="contactflag" value="contactflag"/>
	<h1 class="basic_page"  <?php print $title_attributes; ?>><?php print $title; ?></h2>
	<div class="content"<?php print $content_attributes; ?>>
		<div style="width: 450px; float:left; margin-right: 20px;">
			<h1 class="contactus_h1"><a href="<?php print "mailto:".$node->field_email_us_link['und'][0]['value']; ?>"   >Email Us</a></h1>
			<div id="map_google_text"> 
				<?php
					print $node->body['und'][0]['value'];
				?>
			</div>
			<div id="map-google-map"></div>
			<p id="get-direction"><a target="_blank" href="https://www.google.com/maps/dir//100+South+Shore+Drive+%23100,+East+Haven,+CT+06512,+EE.+UU./@41.2474209,-72.8776078,18z/data=!4m8!4m7!1m0!1m5!1m1!1s0x89e8781304e0e1a3:0x5f2be26bba367794!2m2!1d-72.8774327!2d41.2474598" >Get Directions</a></p>
		</div>
		<div style="width: 450px; float:left;" class="contact_side">
            <?php print render($region['contact_side']); ?>
            <?php
            //$block = module_invoke('webform', 'block_view', 'client-block-650');
            //print render($block['content']);
            ?>        
		</div>
	</div>
</div>	