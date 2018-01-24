<?php
$str = "O'Reill'sy?";
echo addslashes($str);
echo "<br>";
eval("echo '" . addslashes($str) . "';");
?>
