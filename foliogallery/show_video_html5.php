<?php 

$video_file = !empty($_REQUEST['video']) ? $_REQUEST['video']: exit('No direct script access allowed');
$innerWith = !empty($_REQUEST['innerWith']) ? $_REQUEST['innerWith']: "800";
$innerHeight = !empty($_REQUEST['innerHeight']) ? $_REQUEST['innerHeight']: "600";

$ext = strtolower(pathinfo($_REQUEST['video'], PATHINFO_EXTENSION));
$video_type = "";
switch ($ext)
{
	case "mp4":
		$video_type = "video/mp4";
		break;
	case "webm":
		$video_type = "video/webm";
		break;
	case "flv":
		$video_type = "video/x-flv";
		break;
}



?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<style type="text/css">
body {
background:#eee;
margin:0;
padding:0;
font:12px arial, Helvetica, sans-serif;
color:#222;
}
</style>
</head>
<body>

<video width="<?php echo $innerWith; ?>" height="<?php echo $innerHeight; ?>" controls autoplay>
  	<source src="VideoStream/Stream.php?video=<?php echo $video_file; ?>" type="<?php echo $video_type; ?>">
	Your browser does not support the video tag.
</video>

</body>
</html>