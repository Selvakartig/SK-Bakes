<?php
include('dbconfig.php');

if ($_POST) 
{
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $comments = $_POST['comment'];

    $sql = 'INSERT INTO comment (userName, email, mobile, city, states, comment) VALUES ( "' . $username . '", "' . $email . '","' . $mobile . '","' . $city . '","' . $state . '","' . $comments . '")';

    if (mysqli_query($conn, $sql)) 
    {
        header("location: http://127.0.0.1/sk-bakes/html/contact-us.html");
        // echo 'inserted comments';
    } else {
        echo "Not inserted : " . mysqli_error($sql);
    }
}
?>