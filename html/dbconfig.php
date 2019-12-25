<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$dbname = 'mydb';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (! $conn){
    die ("Could not connect : " .mysqli_connect_error());
}
// echo "Connected successfully";
// echo '<br>';
?>