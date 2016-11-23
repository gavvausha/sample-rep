<?php
// Extracting text between two land marks.
  function dictionary($start,$end,$total) {
      $total = stristr($total,$start);
      $f2    = stristr($total,$end);
      return substr($total,strlen($start),-strlen($f2));
  }
  $file="multiplelines.txt";
  $fp=fopen($file,"r");
  if(!$fp) {
    echo "File cannot be opened.";
  }  
  $contents   = fread($fp,filesize($file));
  $dic        = trim(dictionary("[DICTIONARY]","[MANUSCRIPT]",$contents));
  $dic1       = filter_var($dic, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
  $parts      = explode(" ", $dic1);
	echo "<b>DICTIONARY:</b><br /><br />";
	print_r($parts);
		echo "<br /><br />";
	$manuscript = trim(dictionary("[MANUSCRIPT]",".",$contents));
	echo "<b>MANUSCRIPT:</b><br /><br />";
	echo "$manuscript<br /><br />";
	
//for removing \t & \n from the text.
		$text     = filter_var($manuscript, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$len      = strlen($text);
		$st_pos   = 0;
		$str_len  = 1;
		$i        = 1;
		$result   = "";
		echo "<b>RESULT:</b><br /><br />";
	while($i <= $len) {
		$i++;
		$word   = trim(substr($text,$st_pos,$str_len));
		if (in_array($word,$parts)) {
			$result.= " $word";
			$st_pos = $st_pos+$str_len;
			$str_len = 1;
		} else {
			$str_len++;
		}
	}
	echo $result."<br /><br />";
	$newtext = wordwrap($result,80,"<br />");
	echo "<b>RESULT AFTER APPLYING WORDWRAP:</b><br /><br />$newtext".".";
?>
