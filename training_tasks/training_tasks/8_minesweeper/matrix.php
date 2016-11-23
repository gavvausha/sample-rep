<?php
$file = "matrix.txt";
$fp = fopen($file,"r");
if(!$fp) {
	echo "File cannot be opened.";
}
$contents = fread($fp,filesize($file));
$contents1 = filter_var($contents, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
// $pos=fgets($fp,$contents);
// echo $pos;
global $rows;
global $cols;
$rows = substr($contents1,0,1);
$cols = substr($contents1,2,1);
$matrix = substr($contents1,3);
$len = strlen($matrix);
$st_pos = 0;
$mat = array();
$res = array();
echo "<pre><b>INPUT:</b><br />";
for($i = ($rows - 1); $i >= 0; $i--) {
	for($j = 0; $j < $cols; $j++) {
		$mat[$i][$j] = substr($matrix, $st_pos, 1);
		echo $mat[$i][$j]." ";
		$st_pos++;
	}
	echo "<br />";
}
echo "<br />";
for($i = ($rows - 1); $i >= 0; $i--) {
	for($j = 0; $j < $cols; $j++) {
		if($mat[$i][$j] == "*") {
			$res[$i][$j] = "*";
		}
		else {
		// echo $i." ".$j."<br />";
		$res[$i][$j] = count_stars($mat, $i, $j);
		}
	}
}
echo "<br /><br /><b>RESULT:</b><br /><br />";
for($i = ($rows - 1); $i >= 0; $i--) {
	for($j = 0; $j < $cols; $j++) {
		echo $res[$i][$j]." ";
	}
	echo "<br />";
}

function count_stars($check_mat, $x, $y){
	$count = 0;
	// $x_val = $x;
	// $y_val = $y;
	for($i = ($x - 1); $i <= ($x + 1); $i++) {
		for($j = ($y - 1); $j <= ($y + 1); $j++) {
			if(isset($check_mat[$i][$j])){
				if($check_mat[$i][$j] == "*") {
					$count++;
				}
			}
			}
		}
return $count;
}
?>
