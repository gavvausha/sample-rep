<?php
function get_big_word($word, $d) {  
  foreach($d as $new) {  
     if(preg_match("/$word/", $new)) {
       $matches[] = $new;
     }     
   }    
   return $matches;
}

	$path = "manuscript.txt";
	$data = file_get_contents($path);

	
	list($x,$dict,$man) = explode("[", $data);
	list($y,$dictionarys) = explode("]", $dict);
	list($z,$mscript) = explode("]", $man);
		
	$dictionary_words = trim($dictionarys);
	$dict_words=filter_var($dictionary_words, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	echo 'DICTIONARY WORDS --> ' . $dict_words."<br /><br />";
	
	$dictionary = explode(" ", $dict_words);
	sort($dictionary);
	print_r($dictionary);
	echo "<br><br><br>"; 

	$menu_text=filter_var($mscript, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	echo 'MANUSCRIPT --> ' . $menu_text."<br /><br />";

 
  foreach($dictionary as $word) {
     $new_matches = get_big_word($word, $dictionary);
     if(count($new_matches) == 1) {
	       $new_text = preg_replace("/$word/", ' '.$word.' ', $menu_text);
	       $menu_text = $new_text;
		}else {   
             $new_sort = sort($new_matches);
            }     
    } 
  $final_output = trim($new_text);
  echo "NEW: ".$final_output."<br>";
  ?>