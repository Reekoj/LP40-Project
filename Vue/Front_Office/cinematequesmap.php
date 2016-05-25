<!DOCTYPE html>
<html>
	<head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="js/map.js"></script>
        <title>Voiture</title>
     <style type="text/css">

.ii{
position : relative;
width:27%;
height:100%;
}
</style>
    </head>	 
    <script type="text/javascript">
			var positions=<?php echo json_encode($positions)?>;
	</script>
    
	 <body onload="execute(positions);" class="acceuil"> 

    	<?php
    	
    	//print_r(geoip_record_by_name('php.net'));
            if(session_id() == "")
                session_start();            
        ?>
        <div id="cheader2">
            <div id="corps">
            
            
	
        </div>
    </div>
		
	</body>
</html>