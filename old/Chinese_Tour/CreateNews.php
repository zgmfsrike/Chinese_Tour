<?php
include 'module/session.php';
requireLogin();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chinese Tour</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>
    <!-- Navigation -->
  <?php
    include 'component/header.php';
  ?>

    <!-- Body -->
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h3 class="entry-title"><span><br><br>Create News</span> </h3>
          <hr>
        <form class="form-horizonta" action="php_create_news.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="col-md-8 col-sm-9">
              <label for="control-label col-sm-8"><h5>Topic</h5></label>
              <div class="col-md-8">
                <div class="input-group">
                  <input required type="text" class="form-control" value="" name="newsAddtopic">
                </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-8 col-sm-9">
            <label for="control-label col-sm-8"><h5>Add images</h5></label>
          <input class="form-control" type="file" name="newsPicAddtopic1" value="" accept="image/*">
          <input class="form-control" type="file" name="newsPicAddtopic2" value="" accept="image/*">
          <input class="form-control" type="file" name="newsPicAddtopic3" value="" accept="image/*">
          <input class="form-control" type="file" name="newsPicAddtopic4" value="" accept="image/*">
          <input class="form-control" type="file" name="newsPicAddtopic5" value="" accept="image/*">
        </div>
        </div>
        <div class="form-group">
          <div class="col-md-8 col-sm-9">
            <label for="control-label col-sm-8"><h5>Add PDF</h5></label>
          <input class="form-control" type="file" name="newsPdf1" value="" accept="application/pdf">
          <input class="form-control" type="file" name="newsPdf2" value="" accept="application/pdf">
          <input class="form-control" type="file" name="newsPdf3" value="" accept="application/pdf">
          <input class="form-control" type="file" name="newsPdf4" value="" accept="application/pdf">
          <input class="form-control" type="file" name="newsPdf5" value="" accept="application/pdf">
        </div>
        </div>
        <div class="form-group">
          <div class="col-md-8 col-sm-9">
            <label for="control-label col-sm-8"><h5>Description</h5></label>
            <textarea required name="newsDescription" rows="8" cols="80" maxlength="500" minlength="10"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-8 col-sm-9">
            <label for="control-label col-sm-8"><h5>Content</h5></label>
            <textarea required name="newsContent" rows="8" cols="80" maxlength="500" minlength="10"></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-8 col-sm-9">
            <input name="save" type="submit" class="btn btn-danger btn-md" value="Save">
            <input name="cancel" type="submit" value="Cancel" onclick="window.location.href='Index.php'" class="btn btn-warning">

          </div>
        </div>
        </form>
    </div>
    </div>
    </div>


    <!-- Footer -->
    <?php
      include 'component/footer.php';
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
