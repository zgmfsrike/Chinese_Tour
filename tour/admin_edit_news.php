<?php
include 'db_config.php';
include 'module/session.php';
if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}
?>

<!DOCTYPE html>
<html>
    <?php
    $title = "Edit News: " . $news_topic;
    include 'component/header.php';
    
    if($_GET['news_id'] != ""){
        $news_id = $_GET['news_id'];
        $_SESSION['news_id'] = $news_id;

        $sql= "SELECT n.news_id,n.topic,n.content,n.short_description FROM news n WHERE n.news_id = '$news_id'";
        $result = mysqli_query( $GLOBALS['conn'] , $sql );
        $show = mysqli_fetch_array($result);
        $news_topic = $show['topic'];
        $news_description = $show['short_description'];
        $news_content = $show['content'];


        // ----------- IMG & PDF---------------
        $sql_db =  "SELECT n.topic,n.topic,n.short_description,ni.news_image,np.news_pdf
  FROM news n INNER JOIN news_image ni ON n.news_id = ni.news_id  INNER JOIN news_pdf np ON n.news_id = np.news_id
  WHERE n.news_id = $news_id" ;
        $result_db = mysqli_query($conn,$sql_db);
        $data =  mysqli_fetch_array($result_db);


        // ----------------------------------------

        // -------------Only IMG---------- ------
        $sql_db_img = "SELECT n.topic,n.short_description,ni.news_image
  FROM news n INNER JOIN news_image ni on n.news_id = ni.news_id
  WHERE n.news_id = $news_id";
        $result_img = mysqli_query($conn,$sql_db_img);



        // ---------------------------------------

        // -----------------------Only PDF-------------------
        $sql_db_pdf = "SELECT n.topic,n.short_description,np.news_pdf
  FROM news n INNER JOIN news_pdf np ON n.news_id = np.news_id
  WHERE n.news_id = $news_id";
        $result_pdf = mysqli_query($conn,$sql_db_pdf);


        //--------------------Link to another page --------------
        $edit_news_func = "php_edit_news.php";


    }
    // $data = mysqli_fetch_array($result);
    ?>


    <body>
        <!--Edit News Here-->

        <div class="container">
            <div class="row">
                <h3>Edit News</h3>
                <form class="form-horizonta" action=<?php echo $edit_news_func; ?> method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col s12">
                            News Topic :
                            <div class="input-field inline">
                                <input id="newsTopic" name="newsAddtopic" type="text" class="validate" value="<?php echo $news_topic ?>">
                                <label for="newsTopic">Topic</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h5>Add Images</h5>
                        <div class="col s12 l6">
                            <?php

    $count_img = 1;
                                       $count_pdf = 1;
                                       $img_path = "./images/";

                                       if($data){
                                           // echo "Have img & pdf";
                                           $sql_show_img = "SELECT ni.news_image
              FROM news n INNER JOIN news_image ni on n.news_id =ni.news_id WHERE n.news_id = '$news_id'  ORDER BY img_index ASC ";
                                           $result_show_img = mysqli_query($conn,$sql_show_img);
                                           while ($data_db_img = mysqli_fetch_array($result_show_img)) {
                                               $img_file = $img_path.$data_db_img['news_image'];
                                               // echo "<br>Current images : ".$data_db_img['news_image'];
                                               // echo "<br><img src ='$img_file' width='200' height='150'>";
                                               // echo "<input class='form-control' type='file' name='newsPicAddtopic".$count_img."' accept='image/*'>";



                                               echo "
                <div   class='file-field input-field'>
                <div class='btn'>
                <span>File</span>
                <input type='file' name='newsPicAddtopic".$count_img."' accept='image/*'>
                </div>

                <div class='file-path-wrapper'>
                <div id='image_$count_img'>
                <a href='#' id='del_button' onclick='delete_image($count_img)' class='btn-large btn-floating tooltipped waves-effect waves-light red right' data-position='top' data-delay='50' data-tooltip='Delete'><i class='material-icons'>delete</i></a>
                <img src ='$img_file' width='200' height='150'>
                </div>

                <input class='file-path validate'  type='text' placeholder='Upload one or more files' >
                <input id='delete_$count_img' name='delete_$count_img' class='hide' type='text' value='0'/>
                </div>
                </div>
                ";
                                               $count_img++;
                                           }
                                           for($i = $count_img;$i<6;$i++){
                                               echo "
                <div class='file-field input-field'>
                <div class='btn'>
                <span>File</span>
                <input type='file' name='newsPicAddtopic".$i."' accept='image/*' >
                </div>

                <div class='file-path-wrapper'>
                <input class='file-path validate'  type='text' placeholder='Upload one or more files' >
                </div>
                </div>
                ";

                                           }

                                           $sql_show_pdf = "SELECT np.news_pdf
              FROM news n INNER JOIN news_pdf np on n.news_id =np.news_id WHERE n.news_id = '$news_id'  ORDER BY pdf_index ASC";
                                           $result_show_pdf = mysqli_query($conn,$sql_show_pdf);
                                           echo "<br><h5>Add PDF</h5>";
                                           while ($data_db_pdf =mysqli_fetch_array($result_show_pdf)){
                                               echo "
                <div  class='file-field input-field'>
                <div class='btn'>
                <span>File</span>
                <input type='file' name='newsPdf".$count_pdf."' accept='application/pdf'>
                </div>

                <div class='file-path-wrapper'>
                <div id='pdf_$count_pdf'>
                <a href='#' id='del_button' onclick='delete_pdf($count_pdf)' class='btn-large btn-floating tooltipped waves-effect waves-light red right' data-position='top' data-delay='50' data-tooltip='Delete'><i class='material-icons'>delete</i></a>
                </div>
                <p> Current file : ".$data_db_pdf['news_pdf']."</p>
                <input class='file-path validate'  type='text' placeholder='Upload one or more files' >
                <input id='delete_pdf_$count_pdf' name='delete_pdf_$count_pdf' class='hide' type='text' value='0'/>
                </div>
                </div>
                ";



                                               // echo "<br>Current file : ".$data_db_pdf['news_pdf'];
                                               // echo "<input class='form-control' type='file' name='newsPdf".$count_pdf."' accept='application/pdf'>";
                                               $count_pdf++;
                                           }
                                           for($g = $count_pdf;$g<6;$g++){
                                               echo "
                <div class='file-field input-field'>
                <div class='btn'>
                <span>File</span>
                <input type='file' name='newsPdf".$g."' accept='application/pdf'>
                </div>

                <div class='file-path-wrapper'>

                <input class='file-path validate' type='text' placeholder='Upload one or more files' >
                </div>
                </div>
                ";
                                               // echo "<input class='form-control' type='file' name='newsPdf".$g."' accept='application/pdf'>";
                                           }



                                           // }
                                       }else if($data_img = mysqli_fetch_array($result_img)) {

                                           $sql_show_img = "SELECT ni.news_image
              FROM news n INNER JOIN news_image ni on n.news_id =ni.news_id WHERE n.news_id = '$news_id' ORDER BY img_index ASC ";
                                           $result_show_img = mysqli_query($conn,$sql_show_img);
                                           while ($data_db_img = mysqli_fetch_array($result_show_img)) {
                                               $img_file = $img_path.$data_db_img['news_image'];

                                               // <p> Current images : ".$data_db_img['news_image']."</p>
                                               echo "
                <div  class='file-field input-field'>
                <div class='btn'>
                <span>File</span>
                <input type='file' name='newsPicAddtopic".$count_img."' accept='image/*'>
                </div>

                <div class='file-path-wrapper'>
                <div id='image_$count_img' >
                <a href='#' id='del_button' onclick='delete_image($count_img)' class='btn-large btn-floating tooltipped waves-effect waves-light red right' data-position='top' data-delay='50' data-tooltip='Delete'><i class='material-icons'>delete</i></a>
                <img src ='$img_file' width='200' height='150'>
                </div>

                <input class='file-path validate'  type='text' placeholder='Upload one or more files' >
                <input id='delete_$count_img' name='delete_$count_img' class='hide' type='text' value='0'/>
                </div>
                </div>
                ";
                                               $count_img++;
                                           }
                                           for($i = $count_img;$i<6;$i++){
                                               echo "
                <div class='file-field input-field'>
                <div class='btn'>
                <span>File</span>
                <input type='file' name='newsPicAddtopic".$i."' accept='image/*'>
                </div>

                <div class='file-path-wrapper'>
                <input class='file-path validate'  type='text' placeholder='Upload one or more files' >
                </div>
                </div>
                ";
                                               // echo "<input class='form-control' type='file' name='newsPicAddtopic".$i."'  accept='image/*'>";
                                           }

                                           echo "<br><h5>Add PDF</h5>";
                                           for($g = 1;$g<6;$g++){
                                               echo "
                <div class='file-field input-field'>
                <div class='btn'>
                <span>File</span>
                <input type='file'  name='newsPdf".$g."' accept='application/pdf'>
                </div>

                <div class='file-path-wrapper'>

                <input class='file-path validate'  type='text' placeholder='Upload one or more files' >
                </div>
                </div>
                ";

                                               // echo "<input class='form-control' type='file' name='newsPdf".$g."' accept='application/pdf'>";
                                           }
                                           // echo "Have img no pdf";

                                       }else if($data_pdf = mysqli_fetch_array($result_pdf)){
                                           // echo "Have pdf no img";
                                           for($i = 1;$i<6;$i++){
                                               echo "
                <div class='file-field input-field'>
                <div class='btn'>
                <span>File</span>
                <input type='file' name='newsPicAddtopic".$i."' accept='image/*'>
                </div>

                <div class='file-path-wrapper'>
                <input class='file-path validate'  type='text' placeholder='Upload one or more files' >
                </div>
                </div>
                ";

                                               // echo "<input class='form-control' type='file' name='newsPicAddtopic".$i."'  accept='image/*'>";
                                           }

                                           $sql_show_pdf = "SELECT np.news_pdf
              FROM news n INNER JOIN news_pdf np on n.news_id =np.news_id WHERE n.news_id = '$news_id'  ORDER BY pdf_index ASC ";
                                           $result_show_pdf = mysqli_query($conn,$sql_show_pdf);
                                           echo "<br><h5>Add PDF</h5>";
                                           while ($data_db_pdf =mysqli_fetch_array($result_show_pdf)){
                                               echo "
                <div  class='file-field input-field'>
                <div class='btn'>
                <span>File</span>
                <input type='file' name='newsPdf".$count_pdf."' accept='application/pdf'>
                </div>

                <div  class='file-path-wrapper'>
                <div id='pdf_$count_pdf'>
                <a href='#' id='del_button' onclick='delete_pdf($count_pdf)' class='btn-large btn-floating tooltipped waves-effect waves-light red right' data-position='top' data-delay='50' data-tooltip='Delete'><i class='material-icons'>delete</i></a>
                </div>
                <p> Current file : ".$data_db_pdf['news_pdf']."</p>
                <input class='file-path validate'  type='text' placeholder='Upload one or more files' >
                <input id='delete_pdf_$count_pdf' name='delete_pdf_$count_pdf' class='hide' type='text' value='0'/>
                </div>
                </div>
                ";

                                               // echo "<br>Current file : ".$data_db_pdf['news_pdf'];
                                               // echo "<input class='form-control' type='file' name='newsPdf".$count_pdf."' accept='application/pdf'>";
                                               $count_pdf++;
                                           }
                                           for($g = $count_pdf;$g<6;$g++){
                                               echo "
                <div class='file-field input-field'>
                <div class='btn'>
                <span>File</span>
                <input type='file' name='newsPdf".$g."' accept='application/pdf'>
                </div>

                <div class='file-path-wrapper'>

                <input class='file-path validate'  type='text' placeholder='Upload one or more files' >
                </div>
                </div>
                ";
                                               // echo "<input class='form-control' type='file' name='newsPdf".$g."' accept='application/pdf'>";
                                           }


                                       }else{
                                           for($i = 1;$i<6;$i++){
                                               echo "
                <div class='file-field input-field'>
                <div class='btn'>
                <span>File</span>
                <input type='file' name='newsPicAddtopic".$i."' accept='image/*'>
                </div>

                <div class='file-path-wrapper'>
                <input class='file-path validate'  type='text' placeholder='Upload one or more files' >
                </div>
                </div>
                ";
                                               // echo "<input class='form-control' type='file' name='newsPicAddtopic".$i."'  accept='image/*'>";
                                           }
                                           echo "<br><h5>Add PDF</h5>";
                                           for($g = $count_pdf;$g<6;$g++){

                                               echo "
                <div class='file-field input-field'>
                <div class='btn'>
                <span>File</span>
                <input type='file' name='newsPdf".$g."' accept='application/pdf'>
                </div>

                <div class='file-path-wrapper'>

                <input class='file-path validate'  type='text' placeholder='Upload one or more files' >
                </div>
                </div>
                ";
                                               // echo "<input class='form-control' type='file' name='newsPdf".$g."' accept='application/pdf'>";
                                           }

                                       }

                            ?>



                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 l6">
                            <h5>Content</h5>
                            <div class="input-field col s12">
                                <textarea id="textarea2" name="newsContent" class="materialize-textarea" required><?php echo $news_content ?></textarea>
                                <label for="textarea1"></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 l6">
                            <h5>Description</h5>
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="newsDescription" class="materialize-textarea"><?php echo $news_description ?></textarea>
                                <label for="textarea1"></label>
                            </div>
                        </div>
                    </div>


                    <div class="row col s12">
                        <button type="button" value="Cancel" onclick="window.location.href='news.php?news_id=<?php echo $news_id?>'" class="waves-effect waves-light btn red">Cancel</button>
                        <button name="save" type="submit" class="waves-effect waves-light btn green" value="Save">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!--Footer-->
        <?php
    include 'component/footer.php';
        ?>
        <script>
            function delete_image(id) {
                document.getElementById("image_"+id).style.display = 'none';
                document.getElementById("delete_"+id).value = 1;
            }
            function delete_pdf(id) {
                document.getElementById("pdf_"+id).style.display = 'none';
                document.getElementById("delete_pdf_"+id).value = 1;
            }
        </script>

    </body>
</html>
