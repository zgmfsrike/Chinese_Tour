<?php
$hash_text = time();
$hash_text2 = time()+2;
$reference_code = hash("crc32", $hash_text);
$reference_code2 = hash("crc32", $hash_text2);
echo $reference_code."<br />";
echo $reference_code2."<br />";

 ?>
