<?php
 $input_file=fopen("input1.txt","r"); // reading the input.txt file.
 $count=fgets($input_file); // taking the number of given dictionary words.
 $var=0;
 for($i=0;$i<$count;$i++){ // taking the given dictionary words into '$dic' array.
	$dic[$i]=trim(fgets($input_file));
 }
 $alpha=range("a","z"); // taking an array with values from 'a' to 'z'.
 $starsArray=array_fill(0,26,'*'); // taking a 26 size array with all the values as '*'s.
 while(!feof($input_file)){
  	$input_read=trim(fgets($input_file)); // taking the given encoded line. 
	if(feof($input_file))
	break;
	$input=explode(" ",$input_read); // splitting into words and taking them into an input array.
	for($i=0;$i<count($input);$i++){ // taking one input string and checking for the same string length in the 
		for($j=0;$j<count($dic);$j++){ // given dictionary words.
			if(strlen($dic[$j])==strlen($input[$i])){ // calling the 'assign_values' function if the two string 
				if(assign_values($dic[$j],$input[$i])){// lengths are equal.
					$inindex=$i;
					$dicindex=$j;	
					break;
				}
				elseif($j==count($dic)-1){
					delete_values($dic[$dicindex]);
					$i=$inindex;
					$j=$dicindex+1;
				}
				else{ continue; }
			}
		}
	}
	for($i=0;$i<count($input);$i++){ // decrypting the code using the generated format.
		for($j=0;$j<strlen($input[$i]);$j++){
			$output[$i][$j]=$starsArray[array_search($input[$i][$j],$alpha)];
		}	
		$outArray[$i]=implode("",$output[$i]);
	}
	echo "<div style='font-family:courier;'>";
	for($i=0;$i<count($input);$i++){ 
		if(in_array($outArray[$i],$dic)) // checking for the obtained decrypted word in the given dictionary.
			echo $outArray[$i]." ";
		else{
			$stars=array_fill(0,strlen($outArray[$i]),"*"); // writing the stars in the output_file if the word 
			$stars=implode("",$stars);
			echo $stars." ";
		}
	
	}
	echo "<br />";
 }
 echo "</div>";
 function assign_values($dicWord,$inputWord){
	global $alpha;	// globalising the '$alpha' array 
	global $starsArray; // globalising the '$starsArray' array
	for($i=0;$i<strlen($inputWord);$i++){ // generating the format for decrypting the encoded lines.
		if(!array_search($dicWord[$i],$starsArray)){
				$starsArray[array_search($inputWord[$i],$alpha)]=$dicWord[$i];	
		}
		else if(array_search($dicWord[$i],$starsArray)==array_search($inputWord[$i],$alpha)){
			//$starsArray[array_search($inputWord[$i],$alpha)]=$dicWord[$i];
		}
		else{
			// delete_values($starsArray);
			return false;
		}
	} return true; 
 }
 function delete_values($dicWord){
	global $starsArray;
	for($i=0;$i<strlen($dicWord);$i++){
		$starsArray[array_search($dicWord[$i],$starsArray)]="*";
	}
 }	
 fclose($input_file); // closing the input_file
?>
