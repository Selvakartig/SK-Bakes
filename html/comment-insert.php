<?php
include('dbconfig.php');

if ($_POST) 
{
    $username = $_POST['uname'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $comments = $_POST['comment'];

    $sql = 'INSERT INTO comment (userName, mobile, city, states, comment) VALUES ( "' . $username . '","' . $mobile . '","' . $city . '","' . $state . '","' . $comments . '")';

    if (mysqli_query($conn, $sql)) 
    {
        header("location: ../html/contact-us.html");
        // echo 'inserted comments';
    } 
    else 
    {
        echo "Not inserted : " . mysqli_error($sql);
    }
}
?>