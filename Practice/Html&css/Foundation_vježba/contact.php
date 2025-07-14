<?php 
  include "Include/Head.php";
?>
<body>

<!--Top bar(Navigation)-->

<?php 
  include "Include/Navigation.php";
?>
<div class="space"></div>
<!--End top bar(Navigation)-->


<form class="log-in-form max-width-700 align-center-middle" method="POST">
<h4 class="text-center">Contact</h4>
<div class="grid-x grid-margin-x">
  <div class="cell large-6">
  
        <label>Name
        <input type="text" name="name" placeholder="Input name">
        </label>
  
  </div>
  <div class="cell large-6">
  
        <label>Email
        <input type="email" name="email" placeholder="Input email">
        </label>

  </div>
</div>
<label>Message
<textarea name="textbox" id="w3review" name="w3review" rows="4" cols="50" placeholder="Your message"></textarea>
</label>
<input class="button expanded" type="submit" name="Submit" value="Send">

</form>

<br>
<div class="space"></div>
<?php

include "Include/Footer.php";

?>




<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST["Submit"])){

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username =  // YOUR gmail email
    $mail->Password =  // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('cifi.123@live.com', $_POST["name"]);
    $mail->addAddress('cifi.123@live.com', $_POST["name"]);
    $mail->addReplyTo('cifi.123@live.com', 'Ante.d.o.o'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = $_POST["email"];
    $mail->Body = $_POST["textbox"];
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

    $mail->send();
    echo "Email message sent.";

} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
