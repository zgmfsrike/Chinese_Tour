<?php
$pdf_dir="pdf/";
$pdf = "pdf_33_2.pdf";
$flgRename = rename($pdf_dir.$pdf,$pdf_dir.$pdf);
if($flgRename){
  echo "pass";
}else {
  echo "fail";
}
?>
