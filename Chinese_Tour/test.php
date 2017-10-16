<html>
<body>
    <?php
if($_GET){
    if(isset($_GET['insert'])){
        insert();
    }elseif(isset($_GET['select'])){
        select();
    }
}

    function select()
    {
       echo "The select function is called.";
    }
    function insert()
    {
       echo "The insert function is csalled.";
    }

?>
<form>
    <input type="submit" name="insert" value="insert" onclick="insert()" />
    <input type="submit" name="select" value="select" onclick="select()" />
</form>