<script type="text/javascript" src="http://127.0.0.1/SK-Bakes/js/js.js"></script>
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

            $sql = 'SELECT userName, pass FROM logindata WHERE userName = "'.$name.'" AND pass = "'.$password.'"';

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
                // echo '<script type="text/javascript">',
                // 'ftest();',
                // '</script>';
                header("location: ../index.html");

            }
            
        }
        mysqli_close($conn);
        ?>