<?php
date_default_timezone_set('Asia/Kolkata');
 $s=4;				
 $rows=(2*$s)+3;
 $columns=$s+2;
 $t=time();
 $time=date("Hi",$t);		// getting the time in hours and minutes
 $clock=str_split($time);	// spliting the string into an array
 $space1=array("&nbsp;");	// an array with an element as space
 $verticalSlash=array("<b>|</b>"); // an array with an element as ("|")
 $dash=array_fill(1,$s,"<b>-</b>"); // an array with an element as ("-")
 $horz=array_merge($space1,$dash,$space1); // creating (" ----- ") using array merging
 $horArray=array($horz);		// converting $horz array into two dimensional array
 $space2=array_fill(1,$s,"&nbsp;");	// creating an array with elements as spaces in the keys from 1 to $s
 $space3=array_fill(1,$s+1,"&nbsp;");	// creating an array with elements as spaces in the keys from 1 to $s+1
 $space4=array_fill(0,$s+1,"&nbsp;");	// creating an array with elements as spaces in the keys from 0 to $s+1
 $leftVer=array_merge($verticalSlash,$space3); // creating ("|      ") using array merging
 $rightVer=array_merge($space4,$verticalSlash); // creating ("      |") using array merging
 $twoVer=array_merge($verticalSlash,$space2,$verticalSlash); // creating ("|     |") using array merging
 $completeSpace=array_fill(0,$s+2,"&nbsp;"); // creating an array with complete spaces ("       ") 
 $completeSpace2d=array($completeSpace); 		// converting $space array into two dimensional array
 $twoVers=array_fill(1,$s,$twoVer);// creating $s ("|     |") blocks and converting into two dimensional array
 $leftVers=array_fill(1,$s,$leftVer);// creating $s ("|      ") blocks and converting into two dimensional array
 $rightVers=array_fill(1,$s,$rightVer);// creating $s("      |")blocks and converting into two dimensional array
 $output=array(); // creating an ouput variable and declaring it as an array
 // Evaluating each value based on the current time and pushing those values into output array
 for($i=0;$i<count($clock);$i++){		
	switch($clock[$i]){
 		case 0:	$zero=array_merge($horArray,$twoVers,$completeSpace2d,$twoVers,$horArray);
					array_push($output,$zero);
					break;
		case 1:  $one=array_merge($completeSpace2d,$rightVers,$completeSpace2d,$rightVers,$completeSpace2d);
					array_push($output,$one);
					break;
		case 2:	$two=array_merge($horArray,$rightVers,$horArray,$leftVers,$horArray);
					array_push($output,$two);
					break;
		case 3: 	$three=array_merge($horArray,$rightVers,$horArray,$rightVers,$horArray);
					array_push($output,$three);
					break;
		case 4:	$four=array_merge($completeSpace2d,$twoVers,$horArray,$rightVers,$completeSpace2d);
					array_push($output,$four);
					break;
		case 5: 	$five=array_merge($horArray,$leftVers,$horArray,$rightVers,$horArray);
					array_push($output,$five);
					break;
		case 6:	$six=array_merge($horArray,$leftVers,$horArray,$twoVers,$horArray);
					array_push($output,$six);
					break;
		case 7:	$seven=array_merge($horArray,$rightVers,$completeSpace2d,$rightVers,$completeSpace2d);
					array_push($output,$seven);
					break;
		case 8:	$eight=array_merge($horArray,$twoVers,$horArray,$twoVers,$horArray);
					array_push($output,$eight);
					break;
		case 9: 	$nine=array_merge($horArray,$twoVers,$horArray,$rightVers,$completeSpace2d);
					array_push($output,$nine);
					break;
		default: break;
	}				
}
echo "<samp>";  // displaying the output in sample code format
	for($i=0;$i<$rows;$i++){		// printing the three dimensional output
		for($j=0;$j<count($output);$j++){
			for($k=0;$k<$columns;$k++){
				echo $output[$j][$i][$k];
			}	echo "&nbsp;";
		} echo "</br>";
	}
echo "</samp>";
?>

