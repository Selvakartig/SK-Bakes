<?php
            include('dbconfig.php');

            if($_POST)
            {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $uname = $_POST['uname'];
                $pass = $_POST['pass1'];
                

                $sql = 'SELECT userName FROM logindata WHERE userName = "'.$uname.'"';

                $result=mysqli_query($conn, $sql); 
            
                if(mysqli_num_rows($result) > 0)
                {  
                    echo "User name already exist";
                }

                else
                {
                    $sql2 = 'INSERT INTO logindata (firstName, lastName, userName, pass) VALUES ( "'.$fname.'", "'.$lname.'","'.$uname.'","'.$pass.'")';
                
                    if(mysqli_query($conn, $sql2))
                    {
                    header("location: http://127.0.0.1/sk-bakes/index.html");
                    }

                else
                {
                    echo "Not inserted : " .mysqli_error($sql2);
                }
                }
                
            }
            
?>