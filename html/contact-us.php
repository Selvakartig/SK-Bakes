
<?php
ini_set('display_errors', 1);
include('dbconfig.php');
$op1 = "";
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
        $op1 = '<div class="msg" >
                Your request has been submitted!! <br>
                We will get back to you soon.
              </div>';
        // header("location: ../html/contact-us.html");
        // echo 'inserted comments';
    } 
    else 
    {
        echo "Not inserted : " . mysqli_error($sql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>About Us</title>
        <link rel="icon" type="image/png" href="../images/sk-logo.png">
        <!-- For apple devices -->
        <link rel="apple-touch-icon" type="image/png"
            href="../images/sk-logo.png"
            />
        <link rel="stylesheet" href="../css/main.css">
        <link href='https://fonts.googleapis.com/css?family=Baumans'
            rel='stylesheet'>
    </head>
    <body class="container">
        <header class="pro-head-container">
                <a href="../html/main.html"><img src="../images/SK_Bakes_logo.png"
                        alt="logo" width="150px" height="80px"></a>
                <h1 style="margin: auto auto;">Contact Us</h1>
                <a href="../html/main.html"><img src="../images/SK_Bakes_logo.png"
                        alt="logo" width="150px" height="80px"></a>
            </header>
        <div class="contact-container">
             <div class="contact-item">
             <div class="popup">
                <p><?= $op1; ?></p>
            </div>
                <form id="front-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                
                    <div class="form-item">
                        <label for="name">Username</label> 
                        <input type="text" id="uname-contact" name="uname" readonly>
                    </div>
                    <div class="form-item">
                        <label for="cellnum">Mobile No</label>
                        <input type="tel" id="mobile" name="mobile"
                            placeholder="Mobile No">
                    </div>
                    <div class="form-item">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" list="cities"
                            placeholder="City">
                    </div>
                    <div class="form-item">
                        <label for="state">State</label>
                        <select name="state" id="state">
                            <optgroup label="State">
                                <option disabled selected>---- Select State ---</option>
                                <option value="tamilnadu">Tamil nadu</option>
                                <option value="kerala">Kerala</option>
                                <option value="andra">Andra pradesh</option>
                                <option value="karnataka">Karnataka</option>
                                <option value="maharastra">Maharastra</option>
                                <option value="telungana">Telungana</option>
                            </optgroup>
                        </select>
                    </div>
                    
                    <div class="form-item">
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment" cols="21" rows="2"
                            placeholder="Comment"></textarea>
                    </div>
                    <button class="front-btn" type="submit">Submit</button>
                </form>
             </div>   
            </div>
            <datalist id="cities">
                <option value="Tirupur"></option>
                <option value="Coimbatore"></option>
                <option value="Erode"></option>
                <option value="Madurai"></option>
                <option value="Chennai"></option>
            </datalist>
        
        <footer class="footer-container" >
                <h3>Contact&nbsp;:&nbsp;</h3>
                <p>Mobile : 984xxxx123 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email :
                    selvxxx@gmail.com</p>
                    
            </footer>

            <script>
                document.getElementById("uname-contact").value = sessionStorage.getItem('uname');
            </script>
    </body>
</html>