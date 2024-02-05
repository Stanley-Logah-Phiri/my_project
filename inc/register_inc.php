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




    if (isset($_POST['register_btn'])) {
        # code...
        include('dbcon.php');
        $salute = test_inputs( $_POST['salute']);
        $full_name = test_inputs($_POST['full_name']);
        $password = test_inputs($_POST['password']);

        $password_conf = test_inputs($_POST['password_confirm']);

        $email = test_inputs($_POST['email']);
    
		if ($password != $password_conf) {
            # code...
            $_SESSION['errorRegister'] = "Your Passwords Do Not Match";
            header('location: ../register.php');
    
        } else {
            # code...
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            #$hashed_password = $password;
            
            

            $role = '3';
            
            $log_count = '0';
            $status = 'Active';
            $activation_status = 'Not Verified';
        
        

            $letters = '';
            $numbers = '';
            foreach (range('A', 'Z') as $char) {
                $letters .= $char;
            }
            for($i = 0; $i < 12; $i++){
                $numbers .= $i;
            }
            $user_code = substr(str_shuffle($letters), 0, 2).substr(str_shuffle($numbers), 0, 5).substr(str_shuffle($letters), 0, 2).substr(str_shuffle($numbers), 0, 5);

            $activation_code = substr(str_shuffle($numbers), 0, 6);
            if (isset($_FILES["profilepic"]) && $_FILES["profilepic"]["error"] == 0) {
                $targetDir = "../candidate/uploads/";
                $targetFile = $targetDir . basename($_FILES["profilepic"]["name"]);
        
                if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $targetFile)) {
                    echo "Profile picture uploaded successfully.";
                    $profilePicFileName = basename($_FILES["profilepic"]["name"]);
                } else {
                    echo "Error uploading profile picture.";
                }
            } 
           
        
            $sqs = "INSERT INTO users(user_id, user_code, full_name, email, password, profile_picture, role, activation_code, activation_status, status, date_created) VALUES('', '$user_code', '$full_name', '$email', '$hashed_password', '$profilePicFileName', '$role', '$activation_code', '$activation_status', '$status', NOW())";
            $que = $conn->query($sqs);
            
            
            if ($que == TRUE) {

                $message ="
                    <b>Dear $full_name</b><br/>
                    <br><b></b>
                    <b>
                        Greetings from TNM RECRUITMENT! We're thrilled to have you on board.<br><b></b>

                        To kickstart your journey with us, we've just sent you a unique activation code. This code is crucial to unlocking the full potential of your account. Follow the simple steps below to complete the activation process:<br><b></b>

                        Visit our website: http://localhost/day2/adminlte/login.php<br><b></b>
                        Log in using your credentials: [Your Username/Email and Password]<br><b></b>
                        You will be redirected to the activation section<br><b></b>
                        Enter the activation code: [$activation_code]<br><b></b>
                        Your activation code is designed exclusively for you, so please keep it confidential. This step ensures the security of your account and guarantees that only you can access its features.<br><b></b>

                        Should you encounter any challenges or have queries, our dedicated support team is ready to assist. Reach out to them at logahstankey@gmail.com.<br><b></b>

                        We're delighted to have you as part of the  TNM community. Activate your account today and dive into a world of possibilities!<br><b></b>

                        Best regards,<br><b></b>
                        
                        System Administrator<br><b></b>
                        TNM RECRUITMENT<br><b></b>

                    </b>";

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
                    $mail->Subject = "Your Account Activation Code - Action Required";
                    $mail->Body = $message;
                    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

                    $mail->send();
                    $_SESSION['successRegister'] = 'Account Successfully Created Please login to your email to get activation code';
                    echo "<script type='text/javascript'>document.location.href='../login.php';</script>";
                }catch (Exception $e) {
                    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                    echo "<script type='text/javascript'>document.location.href='../register.php';</script>";
                }
                
                echo "<script type='text/javascript'>document.location.href='../login.php';</script>";

          


            } else {
                $_SESSION['errorRegister'] = "Error Failed to Register User";
                echo "<script type='text/javascript'>document.location.href='../register.php';</script>";
            }

            echo "<script type='text/javascript'>document.location.href='../login.php';</script>";
        }
        
        echo "<script type='text/javascript'>document.location.href='../login.php';</script>";
    } 
?>