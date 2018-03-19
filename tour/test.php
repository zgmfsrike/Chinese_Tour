<?php
 header('Content-Type: text/html; charset=utf-8');
include "module/hashing.php";
include "db_config.php";


if($_GET['lang']==''){
  $lang = 'ewa';
}else {
  $_SESSION['lang'] = $_GET['lang'];
  $lang = $_GET['lang'];
  $sql ='SELECT * FROM `language` WHERE lang_id =1';
  $result =mysqli_query($conn,$sql);
  $data = mysqli_fetch_array($result);

  $text = $data[$lang];
  $text2 ='';
}



?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<body>
  <select id='language' onchange="chang_lang(this)">
    <option  disabled selected>Language</option>
    <option value='en' >EN</option>
    <option value='ch' >CH</option>
  </select>
  <script>

  function chang_lang(lang){
    var lang = lang.options[lang.selectedIndex].value ;
    var text = document.getElementById('test').innerHTML = lang;
    if(text =='en'){
      var text2 = document.getElementById('test2').innerHTML = "en";
      window.location.href = 'test.php?lang=en';
    }else if(text =='ch'){
      var text2 = document.getElementById('test2').innerHTML = "ch";
      window.location.href = 'test.php?lang=ch';

    }

  }


  </script>
</body>
<p id='test'></p>
<p id='test2'></p>
<?php
echo "current lang : ".$lang."<br>";
echo "Text : ".$text;
?>
</html>
