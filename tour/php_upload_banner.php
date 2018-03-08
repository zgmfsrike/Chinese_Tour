<?php
include "db_config.php";

for($i=0;$i<count($_FILES["filUpload"]["name"]);$i++)
{
	if($_FILES["filUpload"]["name"][$i] != "")
	{
		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"][$i],"myfile/".$_FILES["filUpload"]["name"][$i]))
		{
			echo "Copy/Upload Complete<br>";
		}
	}
}

?>
