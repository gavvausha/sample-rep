<?php
date_default_timezone_set('Asia/Kolkata');
/* the hands function draws the hands of a clock (and if
requested a simple clock face too) onto an image in PHP
using the GD module. */

# $h - hour of day
# $m - minute of hour
# $fn - jpg image onto which hands are to be added
# $l - length in pixels of minute hand (hour hand is shorter)
# $x and $y - centre of clock
# $a - flag. 0 - just hands. 1 - draw circle around clockface
#      2 and 3 - filled clock face, different colours

function hands($h, $m, $l=150, $x=200, $y=200,$a=0) {

        $angle_min =  90.0 - $m * 6.0;  # minute to degrees
        $angle_hour = 90.0 - ($h + $m / 60.0) *30.0;

        $minx = $l * cos($angle_min / 57.295779);
        $miny = $l * sin($angle_min / 57.295779);
        $hourx = 0.65 * $l * cos($angle_hour / 57.295779);
        $houry = 0.65 * $l * sin($angle_hour / 57.295779);

        $hh[0] = $x - 0.10 * $hourx; # backend of hand
        $hh[1] = $y + 0.10 * $houry;

        $hh[2] = $x - 0.10 * $houry; # side of hand
        $hh[3] = $y - 0.10 * $hourx;

        $hh[4] = $x + $hourx;   # tip if hand
        $hh[5] = $y - $houry;

        $hh[6] = $x + 0.10 * $houry;
        $hh[7] = $y + 0.10 * $hourx; # side of hand

        $mm[0] = $x - 0.05 * $minx;
        $mm[1] = $y + 0.05 * $miny;

        $mm[2] = $x - 0.05 * $miny;
        $mm[3] = $y - 0.05 * $minx;

        $mm[4] = $x + $minx;
        $mm[5] = $y - $miny;

        $mm[6] = $x + 0.05 * $miny;
        $mm[7] = $y + 0.05 * $minx;

       
		// create a blank image
		$im = imagecreatetruecolor(400, 400);

		// fill the background color
		$bg = imagecolorallocate($im, 0, 0, 0);

		// choose a color for the ellipse
		$col_ellipse = imagecolorallocate($im, 255, 255, 255);
		imagefilledellipse($im, 200, 200, 380, 380, $col_ellipse);
        $pink = imagecolorallocate($im,255,30,90);
        $blue = imagecolorallocate($im,240,90,30);
        if ($a % 3) {
        $brown = imagecolorallocate($im,80,80,10);
        } else {
        $brown = imagecolorallocate($im,80,20,80);
        }
        if ($a > 1 )
        imagefilledarc($im,$x,$y,$l*2,$l*2,0,360,$brown,IMG_ARC_PIE);
        imagefilledpolygon($im,$mm,4,$blue);
        imagefilledpolygon($im,$hh,4,$pink);
        if ($a == 1)
        imagearc($im,$x,$y,$l*2,$l*2,0,360,$pink);
		$rotate = imagerotate($im, 0, 90);
        header("content-type: image/jpeg");
        imagejpeg($rotate);
        }
        $h = date("h");
        $m = date("i");
        hands($h,$m);
?>
