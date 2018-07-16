<?php
include 'db_config.php';
include 'module/session.php';

require 'module/language/init.php';
require 'module/language/lang_meeting.php';

$pdf_path = 'pdf/tours_static_detail/meeting';
?>
<!DOCTYPE html>
<html>
<?php
$title = $string_meeting_title;
include 'component/header.php';

?>
<body>
  <div class="container row">
    <h3><?php echo $string_meeting_title;?></h3>
<ul class="collapsible">
  <li>
    <div class="collapsible-header"><?php echo $string_meeting_type1;?></div>
    <div class="collapsible-body">
      <span>
        <embed src="<?php echo $pdf_path; ?>/<?php echo $_COOKIE['lang'];?>/type_1.pdf" type="application/pdf"   height="800px" width="100%"/>
      </span>
    </div>
  </li>
  <li>
    <div class="collapsible-header"><?php echo $string_meeting_type2;?></div>
    <div class="collapsible-body">
      <span>
        <embed src="<?php echo $pdf_path; ?>/<?php echo $_COOKIE['lang'];?>/type_2.pdf" type="application/pdf"   height="800px" width="100%"/>
      </span>
    </div>
  </li>
  <li>
    <div class="collapsible-header"><?php echo $string_meeting_type3;?></div>
    <div class="collapsible-body">
      <span>
        <embed src="<?php echo $pdf_path; ?>/<?php echo $_COOKIE['lang'];?>/type_3.pdf" type="application/pdf"   height="800px" width="100%"/>
      </span>
    </div>
  </li>
</ul>
</div>


<?php
include 'component/footer.php';
?>

</body>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>
</html>
