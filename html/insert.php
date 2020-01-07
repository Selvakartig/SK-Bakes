<?php
include('dbconfig.php');

if ($_POST) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mail = $_POST['mail'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass1'];


    $sql = 'SELECT userName FROM logindata WHERE userName = "' . $uname . '"';

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "User name already exist";
    } else {
        $sql2 = 'INSERT INTO logindata (firstName, lastName, email, userName, pass) VALUES 
                    ( "' . $fname . '", "' . $lname . '", "' . $mail . '","' . $uname . '",AES_ENCRYPT("' . $pass . '","secret"))';

        if (mysqli_query($conn, $sql2)) {

            $to = $mail;
            $subject = 'Thanks for joining SK Bakes';

            $message = "
                <html>
                <head>
                <title>SK Bakes</title>
                <style>
                .sk{
                    background-color: darkgray; 
                    border-radius: 15px; 
                    padding: 3px;
                }
                a{
                    text-decoration: none;
                }
                table{
                    border-collapse: collapse;
                }
                table, td, th {
                    border: 1px solid black;
                    padding: 4px;
                }
                footer{
                    padding: 1px;
                    margin-top: 20px;
                    background-color: gainsboro; 
                    text-align: center;
                }
                </style>
                </head>
                <body>
                <p>Hey <b>$fname!</b></p>
                <p>We're so excited that you joined us. A big warm welcome goes from all SK Bakes family!</p>
                <p>Please verify your details below</p>
                <table border='1'>
                <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Username</th>
                </tr>
                <tr>
                <td>$fname</td>
                <td>$lname</td>
                <td>$uname</td>
                </tr>
                </table>
                <p>If any corrections, please click <a style='color:blue' href='https://selvakartig.tech/SK-Bakes/html/signup.html'>here</a> </p>
                <a class='sk' href='https://selvakartig.tech/index.html'>Go to SK Bakes</a>
                </body>
                <footer>
                <p>&copy;&nbsp;2020 - SK Bakes</p>
                </footer>
                </html>
                ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: SK Bakes no-reply@selvakartig.tech' . "\r\n";
            // $headers .= 'Cc: myboss@example.com' . "\r\n";

            mail($to, $subject, $message, $headers);


            header("location: ../../index.html");
        } else {
            echo "Not inserted : " . mysqli_error($sql2);
        }
    }
}
