<?php
  function dictionary($start,$end,$total) {
    $total = stristr($total,$start);
    $f2    = stristr($total,$end);
    return substr($total,strlen($start),-strlen($f2));
  }
	$file = "input_file.txt";
	$fp   = fopen($file,"r");
		if(!$fp) {
			echo "File cannot be opened.";
		}
	$contents   = fread($fp, filesize($file));
	$dic        = trim(dictionary("[DICTIONARY]", "[MANUSCRIPT]", $contents));
  echo "<br />";
	$parts      = explode(" ", $dic);
  echo "<b>DICTIONARY:</b><br /><br />";
	print_r($parts);
	echo "<br /><br />";
	$manuscript = trim(dictionary("[MANUSCRIPT]", ".", $contents));
  echo "<b>MANUSCRIPT:</b><br /><br />";
	echo $manuscript."<br /><br /><br />";
	$len     = strlen($manuscript);
	$st_pos  = 0;
	$str_len = 1;
	$i       = 1;
  echo "<b>SINGLE LINE:</b><br /><br />";
  while($i <= $len) {
      $i++;
      $word    = trim(substr($manuscript, $st_pos, $str_len));
    if (in_array($word, $parts)) {
      echo " $word";
      $st_pos  = $st_pos + $str_len;
      $str_len = 1;
    } else {
      $str_len++;
    }
  }
  if($len == $st_pos) {
    echo ".";
  }
?>