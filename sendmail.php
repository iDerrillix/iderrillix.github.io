<?php 
    require 'dbcon.php';
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
        $mail->setFrom('jjfoodtrays@gmail.com',  "One Travel and Tours");
        $mail->addAddress($_POST['femail'], $_POST['fname']);
        $mail->isHTML(true);
        $mail->Subject = "Feedback";
        $mail->Body = $_POST['fname'].',  We have received your concern.';
        $mail->send();
        $query = "INSERT INTO feedback VALUES (null, '".$_POST['fname']."', '".$_POST['femail']."', '".$_POST['fmessage']."', null, 'New')";
        if(mysqli_query($con, $query)){
            header("Location: index.php#feedback");
        } else {
            echo 'error';
        }
        
    } else {
        header("Location: index.php");
    }
    exit;
?>