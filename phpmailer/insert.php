	
<?php


  include('../html/dbconfig.php');

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  // Load Composer's autoloader
  require 'vendor/autoload.php';
 
  //Create object of PHPMailer Class
  $mail = new PHPMailer(true);
 
  $op = "";
 
  if(isset($_POST))
  {
 
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mail1 = $_POST['mail'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass1'];

    $sql = 'SELECT userName FROM logindata WHERE userName = "' . $uname . '"';

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        echo "User name already exist";
    } 

    else 
    {
        $sql2 = 'INSERT INTO logindata (firstName, lastName, email, userName, pass) VALUES 
                    ( "' . $fname . '", "' . $lname . '", "' . $mail1 . '","' . $uname . '",AES_ENCRYPT("' . $pass . '","secret"))';

        if (mysqli_query($conn, $sql2))
        {
    try 
    {
    //   $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
      $mail->isSMTP();                           // Send using SMTP
      $mail->Host       = 'smtp.hostinger.com';      // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                  // Enable SMTP authentication
      $mail->Username   = 'no-reply@selvakartig.tech';  // SMTP username
      $mail->Password   = 'Selva@1996';               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
      $mail->Port       = 587;                  // TCP port to connect to
 
      $mail->setFrom( 'no-reply@selvakartig.tech' , 'SK Bakes' ); //Sender E-mail
      $mail->addAddress($mail1);     // Add a recipient
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');
 
      // Content
      $mail->isHTML(true);   //For sending HTML content
 
      $mail->Subject = 'SK Bakes - PHP Mailer';   //E-Mail Subject
      $mail->Body    = "
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
      ";   //E-Mail body
 
      $mail->send();
      $op = '<div class="alert alert-success" role="alert">
                  Thanks for your message we will be in touch with you shortly!!
                </div>';

                header("location: ../html/signup.html");

                // echo 'mail sent';
      } 
      catch (Exception $e) 
      {
        $op = '<div class="alert alert-danger" role="alert">
                    Message could not be sent. Mailer Error: {'.$mail->ErrorInfo.'}
                  </div>';

                  echo 'error in php mailer';
      }
    }

    else {
        echo "Not inserted : " . mysqli_error($sql2);
    }
  }
}
?>