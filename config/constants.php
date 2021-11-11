<?php 
//start session
session_start();

//create constants to store non repeating values
    define('SITEURL', 'http://localhost/resto%20admin/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'mujigae resto admin page');

    $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn)); //database connection
    $db_select = mysqli_select_db($conn, 'mujigae resto admin page') or die(mysqli_error($conn)); //selecting data base
?>