<?php
 $input_file=fopen("jollyInput.txt","r"); # reading the input.txt file.
 $output_file=fopen("jollyOutput.txt","w"); #opening the output.txt file for writing the obtained output. 
 while(!feof($input_file)){
 	$input_read=trim(fgets($input_file)); # taking the given input line.
 	if(feof($input_file)){
		break;
	}
	$input=explode(" ",$input_read); # splitting the input line and taking it into the 'input' array.
	fputs($output_file,"\"".$input_read."\""); 
	jumper($input,$output_file,$input_read); # calling the jumper function with 'input' array as a parameter.
 }
 function jumper($input,$output_file,$input_read){
	$diff=array();
	$out=array();
	for($i=1;$i<$input[0];$i++){
		$diff[$i-1]=abs($input[$i]-$input[$i+1]); # taking the difference between the adjacent elements and 
	}                                           # storing it into '$diff' array.
	$range=range($input[0]-1,1); 
	if(jolly($input,$diff,$range)){ # calling the 'jolly' function with '$input', '$diff', '$range' as 
		echo "\"".$input_read."\""." is jolly</br>"; # parameters.
		fputs($output_file," is jolly\n"); # writing it into the output_file.
	}
	else{
		echo "\"".$input_read."\""." is not jolly</br>";
		fputs($output_file," is not a jolly\n");
	}
 }
 function jolly($input,$diff,$range){
	for($i=0;$i<$input[0];$i++){
		if(array_diff($diff,$range)!=null){ # comparing and returning the values using 'array_diff' function.
			return false; # returns false if it is not null.
		}
			return true; # returns true if it is null.
	}
 }
 fclose($input_file);
 fclose($output_file);
?>
