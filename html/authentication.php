<?php
        include('dbconfig.php');   

        if(isset($_POST["uname"], $_POST["pass"])) 
        {   
            $username = $_POST['uname'];  
            $password = $_POST['pass'];    
    
            $name = stripcslashes($username);  
            $password = stripcslashes($password);  
            $name = mysqli_real_escape_string($conn, $username);  
            $password = mysqli_real_escape_string($conn, $password);  

            $sql = 'SELECT userName, AES_DECRYPT(pass,\'secret\') as pass FROM logindata WHERE userName = "'.$name.'" AND AES_DECRYPT(pass,\'secret\') = "'.$password.'"';

            $result=mysqli_query($conn, $sql); 
            
            if(mysqli_num_rows($result) > 0)
            {  
                $row = mysqli_fetch_assoc($result);

                $check_username=$row['userName'];
                $check_password=$row['pass'];

            if($name == $check_username && $password == $check_password)
            {
                header("location: main.html");
            }

            }
            else
            {
                header("location: ../../index.html");
            }
            
        }
        mysqli_close($conn);
        ?>