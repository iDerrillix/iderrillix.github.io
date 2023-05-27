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
        $mail->Username = '1netravelandtours@gmail.com';
        $mail->Password = 'ohbcbnxxqsmbqrqe';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('1netravelandtours@gmail.com',  "1ne Travel and Tours");
        $mail->addAddress($_POST['femail'], $_POST['fname']);
        $mail->isHTML(true);
        $mail->Subject = "Thank you for your feedback";
        $mail->Body = 'Hi, '.$_POST['fname'].'.  Thank you for time and effort in sharing your thoughts about our service. We sincerely value your active participation and commitment in assisting us to expand and deliver the utmost quality service. Customers such as yourself serve as a constant source of inspiration, driving us to pursue excellence day in and day out.
        <br><br>
        Once again, we extend our gratitude for the invaluable feedback you provided. If you have any additional suggestions, ideas, or concerns, please feel free to contact us without hesitation. We highly appreciate your ongoing partnership and eagerly anticipate the opportunity to serve you even better in the days ahead.
        <br><br>
        May you have an outstanding day ahead!';
        $mail->send();
        $query = "INSERT INTO feedback VALUES (null, '".$_POST['fname']."', '".$_POST['femail']."', '".$_POST['fmessage']."', null, 'Unresolved')";
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