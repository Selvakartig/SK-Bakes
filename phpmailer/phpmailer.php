	
<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  // Load Composer's autoloader
  require 'vendor/autoload.php';
 
  //Create object of PHPMailer Class
  $mail = new PHPMailer(true);
 
  $result = "";
 
  if(isset($_POST['submit'])){
 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
 
    try {
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
      $mail->isSMTP();                           // Send using SMTP
      $mail->Host       = 'smtp.hostinger.com';      // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                  // Enable SMTP authentication
      $mail->Username   = 'no-reply@selvakartig.tech';  // SMTP username
      $mail->Password   = 'Selva@1996';               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
      $mail->Port       = 587;                  // TCP port to connect to
 
      $mail->setFrom( $email , $name ); //Sender E-mail
      $mail->addAddress('selvakarthig.cs14@bitsathy.ac.in');     // Add a recipient
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');
 
      // Content
      $mail->isHTML(true);   //For sending HTML content
 
      $mail->Subject = 'Form Submission';   //E-Mail Subject
      $mail->Body    = 'Name : '.$name.'<br>Phone : '.$phone.'<br>Email : '.$email.'<br>Has written you : '.$message;   //E-Mail body
 
      $mail->send();
      $result = '<div class="alert alert-success" role="alert">
                  Thanks for your message we will be in touch with you shortly!!
                </div>';
      } 
      catch (Exception $e) {
        $result = '<div class="alert alert-danger" role="alert">
                    Message could not be sent. Mailer Error: {'.$mail->ErrorInfo.'}
                  </div>';
      }
  }
?>
 
<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contact Form Using PHPMailer Library</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
 
<body class="bg-info">
  <div class="container">
    <div class="row justify-content-center mt-1">
      <div class="col-lg-5 bg-light p-3 m-3 rounded">
        <h2 class="text-primary text-center font-weight-bold pb-2">Contact Us Form!</h2>
        <hr class="my-2">
        <div>
          <?= $result; ?>
        </div>
        <form method="post" class="px-3" action="<?php $_SERVER['PHP_SELF'] ?>">
          <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control form-control-lg rounded-0" type="text" name="name" required placeholder="Enter your name">
          </div>
          <div class="form-group">
            <label for="email">E-Mail</label>
            <input class="form-control form-control-lg rounded-0" type="email" name="email" required placeholder="Enter your e-mail">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input class="form-control form-control-lg rounded-0" type="tel" name="phone" required placeholder="Enter your phone">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control form-control-lg rounded-0" rows="3" placeholder="Write your message here..."></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="SEND" class="btn btn-danger btn-block btn-lg rounded-0">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
 
</html>