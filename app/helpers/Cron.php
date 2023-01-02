<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// CHANGE STATIC PATH AND VARIABLES IF DOMAIN AND HOST IS CHANGED

require '/home/u693528914/domains/aiems.online/public_html/aiems/app/helpers/PHPMailer.php';
require '/home/u693528914/domains/aiems.online/public_html/aiems/app/helpers/SMTP.php';
require '/home/u693528914/domains/aiems.online/public_html/aiems/app/helpers/Exception.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "u693528914_aiems", "Pup@1928", "u693528914_aiems");

$result = $mysqli->query("SELECT a.*, b.name, b.email FROM employment AS a LEFT JOIN users AS b ON a.alumni_id = b.a_id WHERE a.date_responded = (SELECT MAX(c.date_responded) FROM employment AS c WHERE c.alumni_id = a.alumni_id)");

$rows = $result->fetch_all(MYSQLI_ASSOC);



foreach ($rows as $row) {
    $date_respond_update = date('Y-m-d', strtotime('+1 year', strtotime($row['date_responded'])));
    if ($date_respond_update < date("Y-m-d")) {
        sendEmail($row);
    }
    
}

function sendEmail($row) {
    $mail = new PHPMailer(true);
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->SMTPDebug = 0;
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'universitymailtest@gmail.com';                     //SMTP username
    $mail->Password   = 'buiesfznxbpjznhp';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('universitymailtest@gmail.com', 'AIEMS Administrator');
    $mail->addAddress($row['email'], $row['name']);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'How are you doing?';
    
    $mail->Body    = 'Hey '.$row['name'].',<br>'
                    .'<br>I hope this email finds you well. As we continue to stay connected with our alumni community, we wanted to reach out and see how you have been doing since graduating from our school.<br>'
                    .'<br>We are always interested in hearing about the successes and accomplishments of our alumni, and we would love to know what you have been up to since graduating. Therefore, we would greatly appreciate if you could take a moment to update us on your current situation in our website AIEMS.<br>'
                    .'<br>We also wanted to let you know about some exciting things happening at our school and see if you might be interested in getting more involved. We are always looking for ways to engage with our alumni and help them stay connected to the school and each other.<br>'
                    .'<br>Please let us know if you have any news or updates that you would like to share, or if there is anything else we can do to support you. We would love to hear from you and stay in touch';

    $mail->Priority = 1;
    $mail->addCustomHeader("X-MSMail-Priority: High");
    $mail->addCustomHeader("Importance: High");
    if (!$mail->send()) {
        echo 'Mailer Error: '. $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }
}

?>