<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST['submit'])){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'jjfoodtrays@gmail.com';
        $mail->Password = 'ltpmkxujuugyhmkc';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('jjfoodtrays@gmail.com');
        $mail->addAddress($_POST['femail']);
        $mail->isHTML(true);
        $mail->Subject = $_POST['fname'];
        $mail->Body = $_POST['fname'].',  We have received your concern.';
        $mail->send();

        header("Location: index.php#feedback");
    } else {
        header("Location: index.php");
    }
    exit;
?>