<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ob_start();

require 'vendor/autoload.php';

if(isset($_POST['submit'])){
    if(isset($_POST['email']) and isset($_POST['topic']) and isset($_POST['content'])){
        
        $contact_email = $_POST['email'];
        $topic = $_POST['topic'];
        $content = $_POST['content'];
        
        $body = "<table>
  <tr>
    <td><b>Email :</b></td>
    <td>$contact_email</td>
  </tr>
  <tr>
    <td><b>Topic :</b></td>
    <td>$topic</td>
  </tr>
  <tr>
    <td><b>Content :</b><br>$content</td>
  </tr>
</table>";
        
        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = "zgmfsrike@gmail.com";                 // SMTP username
            $mail->Password = 'amenoera7744';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('info@chtour.com', 'Chiangmai HongThai');
            $mail->addAddress('chiangmaihongthai@hotmail.com');
            
            
            // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $topic;
            $mail->Body    = $body;
            $mail->AltBody = strip_tags($body);

            $mail->send();
            header("location: contact.php?send_mail=done");
            ob_end_flush();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            //                echo 'Message could not be sent.';
            //                echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

    }
}
?>