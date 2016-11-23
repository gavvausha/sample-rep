<?php
date_default_timezone_set('Asia/Kolkata');
function draw_radius($img,$x,$y,$r,$ang,$col) {
	$x1 = $x+$r*cos($ang);
	$y1 = $y+$r*sin($ang);
	imagelinethick($img,$x,$y,$x1,$y1,$col,4);
}
function imagelinethick($im, $x1, $y1, $x2, $y2, $color, $thick = 1) {
    if($thick == 1) {
        return imageline($im, $x1, $y1, $x2, $y2, $color);
    }
    $t = $thick/2-0.5;
    if ($x1 == $x2 || $y1 == $y2) {
        return imagefilledrectangle($im, round(min($x1, $x2) - $t), round(min($y1, $y2) - $t), round(max($x1, $x2) + $t), round(max($y1, $y2) + $t), $color);
    }
    $k = ($y2-$y1)/($x2-$x1); 
    $a = $t/sqrt(1+pow($k,2));
    $points = array(
        round($x1 - (1+$k)*$a), round($y1 + (1-$k)*$a),
        round($x1 - (1-$k)*$a), round($y1 - (1+$k)*$a),
        round($x2 + (1+$k)*$a), round($y2 - (1-$k)*$a),
        round($x2 + (1-$k)*$a), round($y2 + (1+$k)*$a),
    );
    imagefilledpolygon($im, $points, 4, $color);
    return imagepolygon($im, $points, 4, $color);
}
$center_x = 250;
$center_y = 250;

$rmin = 200;
$rhour = 150;
$rsec = 250;

$hour = ((date("h")/12)*2*pi() - (pi()/2));
$min = ((date("i")/60)*2*pi() - (pi()/2));

$image = imagecreatetruecolor(500,500);
$bg = imagecolorallocate($image,0,0,0);
$color = imagecolorallocate($image,255, 255, 255);
$circle = imagefilledellipse($image,250,250,480,480,$color);
draw_radius($image, $center_x, $center_y, $rhour, $hour, $bg);
draw_radius($image, $center_x, $center_y, $rmin, $min, $bg);

imagelinethick($image,250,50,250,0,$bg,3);
imagelinethick($image,50,250,0,250,$bg,3);
imagelinethick($image,250,450,250,500,$bg,3);
imagelinethick($image,450,250,500,250,$bg,3);

imagelinethick($image,0,0,110,110,$bg,4);
imagelinethick($image,500,0,390,110,$bg,4);
imagelinethick($image,500,500,390,390,$bg,4);
imagelinethick($image,0,500,110,390,$bg,4);

// imagelinethick($image,0,110,250,250,$bg,4);
// imagelinethick($image,110,0,250,250,$bg,4);
// imagelinethick($image,390,500,250,250,$bg,4);
// imagelinethick($image,500,390,250,250,$bg,4);

//$rotate = imagerotate($image,0, 0);
header("Content-type:image/png");
imagepng($image);
?> 
