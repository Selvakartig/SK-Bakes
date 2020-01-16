
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
        header("location: ../html/signup.php");
    }
    
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>SK Bakes - Login</title>
        <link rel="icon" type="image/png" href="../images/sk-logo.png">
        <!-- For apple devices -->
        <link rel="apple-touch-icon" type="image/png"
            href="../images/sk-logo.png"
            />
        <link rel="stylesheet" href="../css/main.css">
        <script src="../js/js.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Baumans'
            rel='stylesheet'>
    </head>
    <body>
        <div class="front-container">
            <div class="front-item">
                <form id="front-form"
                    action="<?php $_SERVER['PHP_SELF'] ?>"
                    method="post" onsubmit="return validateForm()">
                    <div class="form-item">
                        <label for="uname">Username</label>
                        <input type="text" placeholder="Enter your Username"
                            name="uname" id="uname" autofocus >
                    </div>
                    <div class="form-item">
                        <label for="pass">Password</label>
                        <input type="password" placeholder="Enter your Password"
                            name="pass" id="pass">
                    </div>

                    <button class="front-btn"
                        type="submit">Login</button>
                </form>
                
            </div>
            <!-- <button onclick="ftest()" >click me</button> -->
            <!-- <div style="color: red;" id="snackbar">Some text some message..</div> -->
        </div>
    </body>
</html>