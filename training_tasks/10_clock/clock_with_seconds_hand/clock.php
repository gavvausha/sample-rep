<?php
date_default_timezone_set('Asia/Kolkata');
header("refresh:1;url=clock.php"); 
$t = time();

$seconds = date('s');
$minutes = date('i') + ($seconds/60);
$hours = date('h') + ($minutes/60);

$rSec = 280;
$rMin = 250;
$rHrs = 175;

$xSec = $rSec * cos(deg2rad(($seconds-15) * (360/60))) + 513;
$ySec = $rSec * sin(deg2rad(($seconds-15) * (360/60))) + 420;

$xMin = $rMin * cos(deg2rad(($minutes-15) * (360/60))) + 513;
$yMin = $rMin * sin(deg2rad(($minutes-15) * (360/60))) + 420;

$xHrs = $rHrs * cos(deg2rad(($hours-3) * (360/12))) + 513;
$yHrs = $rHrs * sin(deg2rad(($hours-3) * (360/12))) + 420;


header("Content-type: image/jpeg");

//Create Clock Image form Clock Jpeg
$clock = imagecreatefromjpeg('clockface.jpg');

//Colors for hand
$black = imagecolorallocate($clock, 0, 0, 0);
$brown = imagecolorallocate($clock, 0x50, 0x63, 0xf8);
$magenta = imagecolorallocate($clock, 0x90, 0x00, 0x56);
$lgreen = imagecolorallocate($clock, 0x90, 0xf8, 0x56);
$green = imagecolorallocate($clock, 0x35,0xff,0x88);

//Hands for lines
/*imagesetthickness($clock, 15);
imageline($clock, 513, 420, $xHrs, $yHrs, $magenta);

imagesetthickness($clock, 10);
imageline($clock, 513, 420, $xMin, $yMin, $brown);

imagesetthickness($clock, 3);
imageline($clock, 513, 420, $xSec, $ySec, $lgreen);*/

//Polygon hands
imagefilledpolygon($clock, array(500,410,530,430,$xHrs,$yHrs), 3, $magenta);
imagefilledpolygon($clock, array(510,420,530,410,$xMin,$yMin), 3, $brown);
imagefilledpolygon($clock, array(513,420,511,418,$xSec,$ySec), 3, $lgreen);

//Draw Center Circle
imagefilledarc($clock, 513, 420, 38, 38, 0, 360, $green, IMG_ARC_PIE);

imagejpeg($clock);
imagedestroy($clock);

$fn = "clock.php";

 


?>