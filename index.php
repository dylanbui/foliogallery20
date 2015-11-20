<?php

define("__USERNAME", "admin");
define("__PASSWORD", "admin");

if (!isset($_SERVER['PHP_AUTH_USER']))
{
    header("WWW-Authenticate: Basic realm=\"Private Area\"");
    header("HTTP/1.0 401 Unauthorized");
    print "Sorry - you need valid credentials to be granted access!\n";
    exit;
} else
{
    if (($_SERVER['PHP_AUTH_USER'] != __USERNAME) && ($_SERVER['PHP_AUTH_PW'] != __PASSWORD))
    {
        header("WWW-Authenticate: Basic realm=\"Private Area\"");
        header("HTTP/1.0 401 Unauthorized");
        print "Sorry - you need valid credentials to be granted access!\n";
        exit;
    }

}

require_once 'foliogallery/mobile_detect.php';

$detect = new Mobile_Detect;
$videoFrameWidth = "800";
$videoFrameHeight = "600";

// Any tablet device.
if( $detect->isTablet() )
{
    $videoFrameWidth = "600";
    $videoFrameHeight = "450";
}


// Any mobile device (phones or tablets).
if ( $detect->isMobile() )
{
    $videoFrameWidth = "400";
    $videoFrameHeight = "300";
}


?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Image Gallery By FolioPages.com</title>
<style type="text/css">
body {
background:#eee;
margin:0;
padding:0;
font:12px arial, Helvetica, sans-serif;
color:#222;
}
</style>
<link type="text/css" rel="stylesheet" href="foliogallery/foliogallery.css" />
<link type="text/css" rel="stylesheet" href="colorbox/colorbox.css" />
<script type="text/javascript" src="foliogallery/jquery.1.11.js"></script>
<script type="text/javascript" src="colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="foliogallery/foliogallery.js"></script>


<script type="text/javascript">
$(document).ready(function(){
    // initiate colorbox
	$('.albumpix').colorbox({rel:'albumpix', maxWidth:'96%', maxHeight:'96%', slideshow:true, slideshowSpeed:3500, slideshowAuto:false});
	$('.vid').colorbox({rel:'albumpix', iframe:true, width:'80%', height:'96%'});

    $(".flowplayer").colorbox({rel: 'nofollow', iframe:true, scrolling: false, innerWidth:'<?php echo $videoFrameWidth; ?>', innerHeight:'<?php echo $videoFrameHeight; ?>'});
});
</script>
</head>
<body>

<br />
<br />

<?php $_REQUEST['fullalbum']=1; include 'foliogallery/foliogallery.php'; ?>

<br />
<br />


</body>
</html>