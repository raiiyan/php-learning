
<?php
/*
* Built-in variables
*/

echo $_SERVER['DOCUMENT_ROOT'];
echo '<br>';
echo $_SERVER['PHP_SELF'];
echo '<br>';
echo $_SERVER['SERVER_NAME'];
echo '<br>';
echo $_SERVER['REQUEST_METHOD'];
echo '<br>';

// echo $_FILES[''];
// echo $_COOKIE[''];

$_SESSION['username'] = 'raiyan';
echo $_SESSION['username'];

// $_ENV[];

?>