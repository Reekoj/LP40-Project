<!DOCTYPE html>
<html>
	<head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="js/map.js"></script>
        <title>Cinematheque</title>
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
			var nomscinemas=<?php echo json_encode($nomscinemas)?>;
			var imgscinemas=<?php echo json_encode($imgscinemas)?>;
			var idcinemas = <?php echo json_encode($idcinemas)?>;
	</script>
    
	 <body onload="execute(positions,nomscinemas,imgscinemas,idcinemas);" class="centrage"> 

    	<?php
                if(session_id() == "")
                session_start();
                require 'require/menu.php';
        ?>
        <div id="cheader2">
            <div id="corps">
            
            
	
        </div>
    </div>
		<?php require 'require/footer.php';?>
	</body>
</html>