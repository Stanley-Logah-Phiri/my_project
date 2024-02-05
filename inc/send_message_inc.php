<?php
    session_start();
    function test_inputs($data) {
        include('dbcon.php');
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = $conn->real_escape_string($data);

        return $data;
    }
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP; 
    use PHPMailer\PHPMailer\Exception;

    require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
    require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
    require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php'; 




    if (isset($_POST['send_message'])) {
        # code...
        include('dbcon.php');
        $name = test_inputs( $_POST['name']);
        $email = test_inputs($_POST['email']);
        $subject = test_inputs($_POST['subject']);
        $messages = test_inputs($_POST['message']);

      

            $letters = '';
            $numbers = '';
            foreach (range('A', 'Z') as $char) {
                $letters .= $char;
            }
            for($i = 0; $i < 12; $i++){
                $numbers .= $i;
            }
           
            $message_code = substr(str_shuffle($numbers), 0, 6);
           
        
            $sqs = "INSERT INTO contact_us(name, email, subject, message) VALUES('$name', '$femail', '$subject', '$messages')";
            $que = $conn->query($sqs);

            if($sqs){
                echo "message received, we will get back to you soon";
            }else{
                echo "Error!". err;
            }
            
            
            

                $message ="
                    <b>Dear $full_name</b><br/>
                    <br><b></b>
                    <b>
                        $subject  </b>
                        $messages<br>
                        Best regards,<br>
                        
                        $name<br>
                        $email<br>

                   ";

                // passing true in constructor enables exceptions in PHPMailer

                $mail = new PHPMailer(true);

                try {
                    // Server settings
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->Username = 'christiechagoe@gmail.com'; // YOUR gmail email
                    $mail->Password = 'ieip gdio kzjm apgc'; // YOUR gmail password

                    // Sender and recipient settings
                    $mail->setFrom('christiechagoe@gmail.com', 'TNM RECUITMENTS');
                    $mail->addAddress($email, 'Receiver Name');
                    $mail->addReplyTo('christiechagoe@gmail.com', 'TNM RECUITMENTS'); // to set the reply to

                    // Setting the email content
                    $mail->IsHTML(true);
                    $mail->Subject = "CUSTOMER ";
                    $mail->Body = $message;
                    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

                    $mail->send();
                    $_SESSION['success'] = 'Account Successfully Created Please login to your email to get activation code';
                    echo "<script type='text/javascript'>document.location.href='../contact.php';</script>";
                }catch (Exception $e) {
                    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                    echo "<script type='text/javascript'>document.location.href='../contact.php';</script>";
                }
                
                echo "<script type='text/javascript'>document.location.href='../contact.php';</script>";

        
    } 
?>