<html>
<body>
<?php
if($_GET){
    if(isset($_GET['insert'])){
        insert();
    }elseif(isset($_GET['select'])){
        select();
    }elseif(isset($_GET['hide'])){
        hide();
    }
    
}

    function select()
    {
       echo '<div style=" width: 400px;
    height: 400px;
    border: 1px solid #c3c3c3;
    display: -webkit-flex; /* Safari */
    -webkit-flex-direction: row-reverse; /* Safari 6.1+ */
    display: flex;
    flex-direction: row-reverse;>The select function is called.</div>';
    }
    function insert()
    {
       echo "The insert function is called.";
    }
    function hide(){}

?>
<form>
    <input type="submit" name="insert" value="insert" />
    <input type="submit" name="select" value="select"/>
    <input type="submit" name="hide" value="hide"/>
</form>