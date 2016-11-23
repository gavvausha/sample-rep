<?php
echo "<html><head><style> 
	body { font-family:courier;}
    </style></head><body>";
  $file = "mine_field.txt";
  // open file in read mode
  $fp   = fopen($file, "r");
    if(!$fp) {
      echo "File cannot be opened.";
    }
  // get one line at a time
  $len  = fgets($fp);
  $dim  = explode(" ", $len);
  $rows = $dim[0];
  $cols = $dim[1];
  echo "ROWS = ".$rows."<br />";
  echo "COLS = ".$cols."<br /><br />";
  $contents  = fread($fp, filesize($file));
  $contents1 = filter_var($contents, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
  // echo $contents1;
  $len = strlen($contents1);
  // echo $len;
  $st_pos = 0;
  $mat    = array();
  $res    = array();
  echo "<b>INPUT:</b><br />";
  for($i = ($rows-1); $i >= 0; $i--) {
    for($j = 0; $j < $cols; $j++) {
      $mat[$i][$j] = substr($contents1, $st_pos, 1);
      echo $mat[$i][$j]." ";
      $st_pos++;
    }
    echo "<br />";
  }
  echo "<br />";
  for($i = ($rows-1); $i >= 0; $i--) {
    for($j = 0; $j < $cols; $j++) {
      if($mat[$i][$j] == "*") {
        $res[$i][$j] = "*";
      } else {
        $res[$i][$j] = count_stars($mat, $i, $j);
      }
    }
  }
  echo "<br /><br /><b>RESULT:</b><br /><br />";
  for($i = ($rows-1); $i >= 0; $i--) {
    for($j = 0; $j < $cols; $j++) {
      echo $res[$i][$j]." ";
    }
    echo "<br />";
  }
  echo "</body></html>";
 // function for counting number of stars 
  function count_stars($check_mat,$x,$y){
	$count = 0;
	for($i = ($x-1); $i <= ($x+1); $i++) {
		for($j = ($y-1); $j <= ($y+1); $j++) {
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
