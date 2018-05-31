<?php
include 'db_config.php';
include 'module/session.php';

require 'module/language/init.php';
require 'module/language/lang_index.php';
?>
<!DOCTYPE html>
<html>
<?php
if(isset($_SESSION['login_id'])){
  $user_id = $_SESSION['login_id'];
  $query = "SELECT * FROM member WHERE id = '$user_id'";
  $result = mysqli_query($conn, $query);
  $objResult = mysqli_fetch_array($result);
  $username = $objResult['username'];
}
?>
<?php
$title = "Meeting Tours";
include 'component/header.php';

$sublink = "tour_static_detail.php?type=meeting&";
?>
<body>
  <div class="container row">
    <h3>Meeting tour</h3>
<ul class="collapsible popout">
  <li>
    <div class="collapsible-header">New employee training meeting</div>
    <div class="collapsible-body">
      <span>
        <ul>
          <li><a href=<?php echo $sublink . "style=1&plan=a"; ?>>Plan <i class="material-icons">A</i></a></li>
          <li><a href=<?php echo $sublink . "style=1&plan=b"; ?>>Plan <i class="material-icons">B</i></a></li>
          <li><a href=<?php echo $sublink . "style=1&plan=c"; ?>>Plan <i class="material-icons">C</i></a></li>
        </ul>
      </span>
    </div>
  </li>
  <li>
    <div class="collapsible-header">New product interduction meeting</div>
    <div class="collapsible-body">
      <span>
        <ul>
          <li><a href=<?php echo $sublink . "style=2&plan=a"; ?>>Plan <i class="material-icons">A</i></a></li>
          <li><a href=<?php echo $sublink . "style=2&plan=b"; ?>>Plan <i class="material-icons">B</i></a></li>
          <li><a href=<?php echo $sublink . "style=2&plan=c"; ?>>Plan <i class="material-icons">C</i></a></li>
        </ul>
      </span>
    </div>
  </li>
  <li>
    <div class="collapsible-header">Department meeting</div>
    <div class="collapsible-body">
      <span>
        <ul>
          <li><a href=<?php echo $sublink . "style=3&plan=a"; ?>>Plan <i class="material-icons">A</i></a></li>
          <li><a href=<?php echo $sublink . "style=3&plan=b"; ?>>Plan <i class="material-icons">B</i></a></li>
          <li><a href=<?php echo $sublink . "style=3&plan=c"; ?>>Plan <i class="material-icons">C</i></a></li>
        </ul>
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
