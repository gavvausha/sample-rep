<?php
if(isset($_POST['submit'])) 
{ 
    // Method - 1
    echo "METHOD: 1<br />";
    $num = $number = $_POST['number'];
    echo "User has submitted the number : <b> $number </b>";
    while ($num%2 == 0) {
      $num = $num/2;
    }
    if ($num == 1) {echo "<br><b>$number</b> is IMPOLITE.<br>";}
    else {echo "<br><b>$number</b> is POLITE.<br />";}
    
    // Method - 2
    echo "<br />METHOD: 2<br />";
    $a = $_POST['number'];
    $b = $a - 1;
    if(($a & $b) == false) {
      echo "<b>".$_POST['number']."</b> is IMPOLITE.<br />";
    } else {
      echo "<b>".$_POST['number']."</b> is POLITE.<br />";
    }
}
?>

<HTML>
<HEAD><title>Polite or Impolite</title></HEAD>
<BODY> 
<FORM method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <input type="text" name="number"><br>
   <input type="submit" name="submit" value="Polite or Impolite?"><br>
</FORM>
</BODY>
</HTML>
