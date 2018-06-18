<?php
include 'db_config.php';
include 'module/session.php';
if(!isLoginAs(array('admin','member'))){
  header('Location: message.php?msg=please_login');
}

require 'module/language/init.php';
// require 'module/language/lang_profile.php';
?>

<!DOCTYPE html>
<html>
<?php
$title = "Booking Detail";

include 'component/header.php';

$link_update_booking_status = "php_update_booking_status.php";
$link_upload = "php_payment_upload.php";

$ref_code = $_GET['ref'];
?>

<script type='text/javascript'>
function preview_image(event)
{
  var reader = new FileReader();
  reader.onload = function()
  {
    var output = document.getElementById('output_image');
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
</script>

<?php
// GET data from database
$id = $_SESSION['login_id'];
$sql =  "SELECT distinct  T.tour_description, BH.reference_code , TR.start_date_time, TR.end_date_time, BH.status, BH.uploaded_file FROM tour_booking_history BH ";
$sql .= "LEFT JOIN tour_round_member RM ON BH.member_id = RM.id ";
$sql .= "LEFT JOIN tour_round TR ON RM.tour_round_id = TR.tour_round_id ";
$sql .= "LEFT JOIN tour_en T ON TR.tour_id = T.tour_id ";
$sql .= "WHERE BH.reference_code = '$ref_code'";
// echo $sql;
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);
?>

<body>
  <!-- body -->
  <div class="container">

    <!-- Waiting -->
    <div class="section"></div><div class="section"></div>
    <h4 class="center"><b>Booking detail</b></h4>
    <!-- desktop -->
    <table class="responsive-table hide-on-med-and-down highlight container" style="border: 1px solid gray;border-radius: 8px;">
      <tbody>
        <tr>
          <th class="center" style="width:30%;">Reference code</th>
          <td><?php echo $data['reference_code'];?></td>
        </tr>
        <tr>
          <th class="center">Tour detail</th>
          <td><?php echo $data['reference_code'];?></td>
        </tr>
        <tr>
          <th class="center">Start date</th>
          <td><?php echo $data['reference_code'];?></td>
        </tr>
        <tr>
          <th class="center">End date</th>
          <td><?php echo $data['reference_code'];?></td>
        </tr>
        <tr>
          <th class="center">Member</th>
          <td><?php echo $data['reference_code'];?></td>
        </tr>
        <tr>
          <th class="center">Number of seat</th>
          <td><?php echo $data['reference_code'];?></td>
        </tr>
        <tr>
          <th class="center">Add-on</th>
          <td><?php echo $data['reference_code'];?></td>
        </tr>
        <tr>
          <th class="center">Net Price</th>
          <td><?php echo $data['reference_code'];?></td>
        </tr>
        <tr>
          <th class="center">Status</th>
          <td><?php echo $data['reference_code'];?></td>
        </tr>
      </tbody>
    </table>

    <!-- mobile and tablet -->
    <table class="responsive-table hide-on-large-only" style="border: 1px solid gray;border-radius: 8px;">
      <tbody>
        <tr>
          <th>Reference code</th>
          <th>Tour detail</th>
          <th>Start date</th>
          <th>End date</th>
          <th>Member</th>
          <th>Number of seat</th>
          <th>Add-on</th>
          <th>Net Price</th>
          <th>Status</th>
        </tr>
        <tr>
          <td><?php echo $data['reference_code'];?></td>
          <td><?php echo $data['reference_code'];?></td>
          <td><?php echo $data['reference_code'];?></td>
          <td><?php echo $data['reference_code'];?></td>
          <td><?php echo $data['reference_code'];?></td>
          <td><?php echo $data['reference_code'];?></td>
          <td><?php echo $data['reference_code'];?></td>
          <td><?php echo $data['reference_code'];?></td>
          <td><?php echo $data['reference_code'];?></td>
        </tr>
      </tbody>
    </table>

    <?php
    /*
    Payment image
    Shown when " $data['uploaded_file'] != '' "
    */
    $filename = 'images/payments/' . $data['uploaded_file'];
    if (file_exists($filename) AND ($data['uploaded_file'] != '') ) {
      ?>
      <h4>Payment image</h4>
      <div id="uploaded-pic">
        <img src="<?php echo $filename;?>">
      </div>
      <?php
    }
    ?>


    <?php
    /*
    Role: member
    Detail: upload booking payment file
    */
    if(isLoginAs(array('member'))){
      ?>
      <form action="<?php echo $link_upload; ?>" method="post" enctype="multipart/form-data">
        <h4>Upload payment slip</h4>
        <input type="text" name="ref_code" value="<?php echo $ref_code; ?>" style="display:none">
        <div class="container col s12">
          <div class="file-field input-field">
            <div class="btn">
              <span>Upload Image</span>
              <input name='image' class='image' type='file' accept="image/*" onchange="preview_image(event)"/>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Image here">
            </div>
          </div>
        </div>
        <img id="output_image"/>
        <div class="row col s12 center">
          <button name="cancel" type="button" value="Cancel"  class="waves-effect waves-light btn red" onclick="history.go(-1)">Cancel</button>
          <button type="submit" name="save" class="waves-effect waves-light btn green" value="Save">Save</button>
        </div>
      </form>
      <?php
    }
    ?>


    <?php
    /*
    Role: admin
    Detail: change booking status
    */
    if(isLoginAs(array('admin'))){
      ?>
      <form action="<?php echo $link_update_booking_status; ?>" method="post" enctype="multipart/form-data">
        <div class="section"></div>
        <h4 class="center"><b>Update booking status</b></h4>
        <input type="text" name="ref_code" value="<?php echo $ref_code; ?>" style="display:none">
        <div class="container col s12">
          <label>Update booking status</label>
          <select class="browser-default" name="status_id">
            <option value="" disabled>Choose your option</option>
            <option value="1" <?php echo $data['status'] == 1 ? "selected" : "" ?>>No payment</option>
            <option value="2" <?php echo $data['status'] == 2 ? "selected" : "" ?>>Waiting check payment</option>
            <option value="3" <?php echo $data['status'] == 3 ? "selected" : "" ?>>Payment done</option>
            <option value="4" <?php echo $data['status'] == 4 ? "selected" : "" ?>>Cancel</option>
          </select>
        </div>
        <div class="section"></div><div class="section"></div>
        <div class="row col s12 center">
          <a href="payment.php"><button name="cancel" type="button" value="Cancel"  class="btn red">Cancel</button></a>
          <button type="submit" name="save" class="btn green" value="Save">Save</button>
        </div>
        <div class="section"></div>
      </form>
      <?php
    }
    ?>

  </div>

  <?php
  include 'component/footer.php';
  ?>
</body>
