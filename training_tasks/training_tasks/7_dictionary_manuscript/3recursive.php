<?php
// Extracting text between two land marks.
function dictionary($start,$end,$total) {
		$total=stristr($total,$start);
		$f2=stristr($total,$end);
		return substr($total,strlen($start),-strlen($f2));
}

$file = "manuscript.txt";
$fp = fopen($file,"r");
if(!$fp) {
	echo "File cannot be opened.";
}
global $parts;
$contents   = fread($fp,filesize($file));
$dic        = trim(dictionary("[DICTIONARY]","[MANUSCRIPT]",$contents));
$dic1       = filter_var($dic, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$parts      = explode(" ", $dic1);
echo "<b>DICTIONARY:</b><br /><br />";
print_r($parts);
echo "<br /><br />";
$manuscript = trim(dictionary("[MANUSCRIPT]",".",$contents));
echo "<b>MANUSCRIPT:</b><br /><br />";
//for removing \t & \n from the text.
$text       = filter_var($manuscript, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
echo "$text<br /><br />";

$len        = strlen($text);
$st_pos     = 0;
$str_len    = 1;
$i          = 1;
$result     = "";
//echo "<b>RESULT:</b><br /><br />";
while($i <= $len) {
	$i++;
	$word = trim(substr($text,$st_pos,$str_len));
	if ((in_array($word,$parts)) && verifyword($text,$st_pos,$str_len,$parts)) {
		$result.=" $word";
		//echo "$word ";
		$st_pos = $st_pos+$str_len;
		$str_len = 1;
	} else {
		$str_len++;
	}
}

echo wordwrap($result,80,"<br />").".";

function verifyword($ipstr, $a, $b, $dict){
	$x=1;
	if (($a+$b) >= strlen($ipstr)){
		return TRUE;
	}
	while($x<12){
		$b++;
		$tmpword=trim(substr($ipstr,$a,$b));
		if((in_array($tmpword,$dict)) && verifytext($ipstr,$a,$b)){
		// echo $tmpword."<br />";
			return FALSE;
		} else {
			$x++;
		}
	}
	return TRUE;
}	
	
function verifytext($vstr, $vpos, $vlen){
	global $parts;
	$x=1;
	// if (($a+$b) >= strlen($ipstr)){
		// return TRUE;
	// }
	$vpos = $vpos + $vlen;
	$vlen = 1;
	while($x<12){
		$vword=trim(substr($vstr,$vpos,$vlen));
		if(in_array($vword,$parts)){
			return TRUE;
		} else {
			$x++;
		}
		$vlen++;
	}
	return FALSE;
}
?>