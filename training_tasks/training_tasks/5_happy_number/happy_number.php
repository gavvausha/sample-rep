<?php // Happy number
$num_arr = array(86, 32, 4565, 42, 5555, 69);
foreach($num_arr as $key => $val) {
 	print $val." is ";
 	isHappy($val);
}
function isHappy($num) {
	$len = strlen($num);
	$sum = 0;
	for ($i = 0; $i < $len; $i++) {
		$char = substr($num, $i, 1);
		$sum = $sum + $char*$char;
	}
	if(strlen($sum) == 1) {
		if($sum == 1) {
		  print "a happy number <br />";
		} else {
			print "an unhappy number <br />";
		}
	} else {
		isHappy($sum);
	}
}
?>
