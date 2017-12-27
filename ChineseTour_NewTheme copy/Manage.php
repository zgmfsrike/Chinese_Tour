<?php
include 'module/session.php';
if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}
 ?>
<!DOCTYPE html>
  <html>
<?php
      include 'component/header.php';
      include 'php_profile_func.php';
?>
<body>
  <div class="container">
    <div class="row">
      <div class="section"></div>
      <div class="col s12 l3">
        <div class="collection">
          <a href="Profile.php" class="collection-item black-text">Profile</a>
          <a href="Manage.php" class="collection-item active amber">Manage</a>
          <a href="php_search_tour.php" class="collection-item black-text">Search Tour</a>
          <a href="Purchase.php" class="collection-item black-text">Purchase</a>
          <a href="Record.php" class="collection-item black-text">Record</a>
        </div>
      </div>
      <div class="col s12 l9">
        <h5>Index Manage</h5><hr/>
        <div class="center">
          <a href="AdminChangeBanners.php" name="changeBanners" value="Change Banners" class="btn waves-effect waves-light green darken-1">Change Banners</a>
          <a href="AdminEditAnnounce.php" name="editAnnounce" value="Edit Announce" class="btn waves-effect waves-light green darken-1">Edit Announcesment</a>
          <a href="CreateNews.php" name="createNews" value="Create News" class="btn waves-effect waves-light green darken-1">Create News</a>
        </div>
        <div class="section"></div>
      </div>
      <div class="col s12 l9">
        <h5>Tour</h5><hr/>
        <div class="center">
          <a href="php_search_tour.php" name="searchTour" class="btn waves-effect waves-light green darken-1">Search Tour</a>
          <a href="TourList.php" name="tourList" class="btn waves-effect waves-light green darken-1">Tour List</a>
          <a href="AdminCreateTour.php" name="createTour" class="btn waves-effect waves-light green darken-1">Create Tour</a>
        </div>
        <div class="section"></div>
      </div>
    </div>
    <div class="row">
      <div class="col s12 l3"></div>
      <div class="col s12 l9">
        <h5>About Us Manage</h5><hr/>
        <div class="center">
          <a href="AdminEditAboutUs.php" name="editAboutUs" class="btn waves-effect waves-light green darken-1">Edit AboutUs</a>
        </div>
      </div>
    </div>
  </div>
  <div class="section"></div>

  <!-- Footer -->
  <?php
  include 'component/footer.php';
  ?>
</body>
</html>
