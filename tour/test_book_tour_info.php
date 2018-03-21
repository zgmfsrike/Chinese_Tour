<?php

//if($_POST['']){

// }

$_SESSION['tour']['p1']['first_name'] = 'p1';
$_SESSION['tour']['p2']['first_name'] = 'p2';

$_SESSION['tour']['p1']['last_name'] = 'p1 last';
$_SESSION['tour']['p2']['last_name'] = 'p2 last';

echo $_SESSION['tour']['p1']['first_name'] . '<br>';
echo $_SESSION['tour']['p1']['last_name'] . '<br>';
echo $_SESSION['tour']['p2']['first_name'] . '<br>';
echo $_SESSION['tour']['p2']['last_name'] . '<br>';

unset($_SESSION['tour']);

echo $_SESSION['p1']['first_name'] . '<br>';
echo $_SESSION['p1']['last_name'] . '<br>';
echo $_SESSION['p2']['first_name'] . '<br>';
echo $_SESSION['p2']['last_name'] . '<br>';



?>
