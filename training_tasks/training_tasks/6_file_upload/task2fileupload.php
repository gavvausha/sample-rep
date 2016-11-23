<html>
<head>
<title>A File Upload Script</title>
</head>
<body>
<form enctype="multipart/form-data" action="<?php print $_SERVER['PHP_SELF']; ?>" method="post" >
<p> User Name:<input type="text" name="name" <br /><br />
File To Upload:<input type="file" name="file" size="50" /><br /><br />
<input type="submit" value="upload!" /><br /><br /></p>
</form>
</body>
<!-- <a href="download.php?download_file=<?php echo $file_name ?>">Download here</a> -->
</html>

<?php
/* creates a compressed zip file */
function create_zip($files = array(),$destination = '',$overwrite = false) {
  //if the zip file already exists and overwrite is false, return false
  if(file_exists($destination) && !$overwrite) { return false; }
  //vars
  $valid_files = array();
  //if files were passed in...
  if(is_array($files)) {
    //cycle through each file
    foreach($files as $file) {
      //make sure the file exists
      if(file_exists($file)) {
        $valid_files[] = $file;
      }
    }
  }
  //if we have good files...
  if(count($valid_files)) {
    //create the archive
    $zip = new ZipArchive();
    if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
      return false;
    }
    //add the files
    foreach($valid_files as $file) {
      $zip->addFile($file,$file);
    }
    //debug
    //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
    
    //close the zip -- done!
    $zip->close();
    
    //check to make sure the file exists
    return file_exists($destination);
  }
  else
  {
    return false;
  }
}
error_reporting(E_ALL);
if(!isset($_FILES['file'])) {
	echo " ";
	exit;
}
echo $file_name = $_FILES['file']['name'];
$err="   is an invalid file type!!!<br /><br /> You have to choose a .jpg, .exe, .doc & .pdf files only. . .<br/>";
$date=date('m/d/Y');
$target_path = 'uploads/';
$target_path = $target_path . basename( $_FILES['file']['name']); 
$size = ($_FILES["file"]["size"]> 1024) ? round(($_FILES["file"]["size"] / 1048576), 2).' MB': round(($_FILES["file"]["size"] / 1024), 2).' KB';
if(empty($file_name)) {
	echo "Server didn't accept this file<br />";
	print_r($_FILES);
	exit;
}
if(!(preg_match('/.doc$/i',$file_name)||preg_match('/.pdf$/i',$file_name)||preg_match('/.exe$/i',$file_name)||preg_match('/.jpg$/i',$file_name))) {
	echo "<br />";
	echo $file_name.$err;
	exit;
} 
	if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
			echo "<b> File Uploaded...</b>";
	}
	$file_arch = array($file_name);

$result = create_zip($file_arch,'my-archive.zip');
echo $result;
		print "<br /><br />";
		print "<b>User Name: ".     $_POST['name']     ."</b><br /><br />";
		print "File Name: ".     $file_name       ."<br />";
		print "Size: ".  $size  ."<br />";
		print "Date Uploaded: "." $date  "."<br />";
		print "Tmp Name: " .	$_FILES['file']['tmp_name']	."<br />";
		print "Target Folder: ".$target_path  ."<br />";
		print "Type: ".     $_FILES['file']['type']       ."<br />";
		print "Error:".$_FILES['file']['error']."<br />"."<br />";

?>
