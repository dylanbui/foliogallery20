<?php

require_once 'VideoStream.php';

define ('__SITE_PATH', realpath(dirname(dirname(dirname((__FILE__))))));

// echo "<pre>";
// print_r(__SITE_PATH.'videos/trouble_maker.mp4');
// echo "</pre>";
// exit();

$video_file = !empty($_REQUEST['video']) ? $_REQUEST['video']: exit('No direct script access allowed');

$stream = new VideoStream(__SITE_PATH.'/'.$video_file);
$stream->start();
exit;
