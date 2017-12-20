<!DOCTYPE html>
  <html>
<?php
      include 'component/header.php';
?>
<body>

    <!--tour body-->
    <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="section"></div>
                        <h5 class="center">Search</h5>
                        <div class="search-wrapper card">
                          <form>
                            <div class="input-field">
                              <input id="search" type="search" required>
                              <i class="material-icons red-text">search</i>
                            </div>
                          </form>
                        </div>
               </div>
            </div>
        </div>

        <!--just a Sample table-->
        <section>
            <div class="container">
                <table class="table table-striped custab highlight centered responsive-table">
                <thead>
            <tr>
                <th name="tourID">Tour Id</th>
                <th name="tourname">Name</th>
                <th name="Type">Type</th>
                <th name="aDate">Arrival Date</th>
                <th name="rDate">Return Date</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
                </thead>
            <tr>
                <td>1</td>
                <td>Mearim Fuwafuwa</td>
                <td>SSR</td>
				        <td>11/12/2017</td>
                <td>11/01/2017</td>
                <td class="text-center"><a class="waves-effect waves-light btn green" href="#"><i class="large material-icons">mode_edit</i></a></td>
                <td class="text-center"><a class="waves-effect waves-light btn" href="#"><i class="large material-icons">delete</i></a></td>
            </tr>
                </table>
            </div>
            </section>

      <!--Footer-->
      <?php
      include 'component/footer.php';
      ?>

    </body>
  </html>
