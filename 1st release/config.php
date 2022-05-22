<?php
header('Access-Control-Allow-Origin: *');

define('HOST', '127.0.0.1');
define('USER', 'eusebio');
define('PASSWORD', '1234');
define('DATABASE', 'quizApp');

$connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Cannot connect to database!");
 

?>
