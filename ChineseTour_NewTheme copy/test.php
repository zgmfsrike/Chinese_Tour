<?php
$str = "O'Reilly?";
echo addslashes($str);
echo "<br>";
eval("echo '" . addslashes($str) . "';");
?>