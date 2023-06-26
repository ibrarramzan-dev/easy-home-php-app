<?php
  session_start();
  //Import PHPMailer classes into the global namespace
  //These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  include('../includes/db.php');

  $email = $_POST['email'];

  $select_client_query = "select * from clients where email='$email'";

  $results = mysqli_query($conn, $select_client_query);

  if(mysqli_num_rows($results) > 0) {

    include('../util/randomString.php');
    $rand_str = getRandomString(40);

    $time = time() + (7 * 24 * 60 * 60);  // recovery token expiry for next 7 days

    $row = mysqli_fetch_assoc($results);
    $client_username = $row['username'];

    $update_client_query = "update clients set recovery_token = '$rand_str', recovery_token_expiry = '$time' where email = '$email'";
    mysqli_query($conn, $update_client_query);

    # send email
    //Load Composer's autoloader
    require '../phpmailer/Exception.php';
    require '../phpmailer/PHPMailer.php';
    require '../phpmailer/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'ibrarramzan.dev@gmail.com';                     //SMTP username
      $mail->Password   = 'mseiiotdgodaygex';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('ibrarramzan.dev@gmail.com', 'Reset Password');
      $mail->addAddress($email, $client_username);     //Add a recipient

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Reset Password';
      $link = "http://localhost/recover_account.php?email=$email&recovery_token=$rand_str";
      $mail->Body = " 
        <h4>Account Recovery</h4>
        <p>Please click on the link to recover your account: </p>
        <p><a href='$link'>$link</a></p>
      ";

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    echo "<script>window.open('../', '_self')</script>";
  } else {
    $_SESSION['forgot_password_error'] = "Email not found";
    echo "<script>window.open('../forgot_password.php', '_self')</script>";
  }

?>