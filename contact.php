<?php require 'dbcon.php';?>
<?php 
    $query = "SELECT * FROM company;";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $logo = $row['logo_path'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="modal.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="utilities.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Contact Us | 1ne Travel and Tours</title>
</head>
<body>
<header class="scrolled">
        <img src="./img/<?php echo $row['logo_path'];?>" alt="">
        <div class="nav-links">
            <ul>
                <li>
                    <a style="color: black;" href="index.php">Home</a>
                    <a style="color: black;" href="about.php">About</a>
                    <a style="color: black;" href="index.php#services">Services</a>
                    <a style="color: black;" href="tours.php">Tour Packages</a>
                    <a style="color: black;" href="feedback.php">Reviews</a>
                    <a style="color: black;"href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
        <div class="toggle-btn" style="color: black;">
            <i class="fa-solid fa-bars" id="hamburger"></i>
        </div>
    </header>
    <div class="dropdown_menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="index.php#services">Services</a></li>
            <li><a href="tours.php">Tour Packages</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="contact.php">Contact</a></li>
        </div>
        <div class="modal-background" onclick="toggleModal()"></div>

<div class="modal" id="modal">
    <h2>Thank you for contacting us!</h2>
    <p>
        Thank you for leaving an honest review!
    </p>
</div>
<script src="modal.js"></script>
<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
?>
<?php 
    if(isset($_POST['submit'])){
        $cname = $_POST['cname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $options = $_POST['options'];
        $message = $_POST['message'];
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '1netravelandtours@gmail.com';
        $mail->Password = 'ohbcbnxxqsmbqrqe';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('1netravelandtours@gmail.com',  "1ne Travel and Tours");
        $mail->addAddress($_POST['email'], $_POST['cname']);
        $mail->isHTML(true);
        $mail->Subject = "Thank You for Contacting Us!";
        $mail->Body = 'Hi, '.$_POST['cname'].'.  Thank you for reaching out to us through our website. We appreciate your interest in 1ne Travel and Tours. 
        This email is to acknowledge that we have received your message and want to assure you that we will contact you soon. 
        Please keep your communication lines open.
        <br><br>
        Once again, thank you for choosing One Travel and Tours. We look forward to assisting you and providing you with the information or assistance you require. 
        You are important to us, and we will make every effort to ensure your experience with us is positive.
        <br><br>
        Wishing you a wonderful day ahead!';
        $mail->send();
        $query = "INSERT INTO contact_form VALUES (null, '$cname', '$phone', '$email', '$options', '$message', null, 'Pending');";
        $result = mysqli_query($con, $query);
        $_POST = array();
        if($result){
            echo "<script>
            document.querySelector('#modal h2').innerHTML = 'Thank you for contacting us!';
            document.querySelector('#modal p').innerHTML = 'You will hear from us soon. Please keep your communication lines open.';
            toggleModal();
            setTimeout(function(){
                window.location.href = 'contact.php';
            }, 3000);
            </script>";
        } else {
            echo "<script>
            document.querySelector('#modal h2').innerHTML = 'An error has occured';
                document.querySelector('#modal p').innerHTML = 'Contact us if you think there is a problem.';
                toggleModal();
                </script>";
        }
    }
?>
    <div class="home6 background-tint-dark" id="contact">
        <div class="flex flex-main-center">
            <div class="form hidden" style="max-width: 650px;">
                <?php 
                    $query = "SELECT * FROM company;";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result);

                ?>
                <span>Get in <b style="color: #d7263d;">touch</b> with us</span>
                
                <p><b>Phone:</b> <?php echo $row['contact_no']; ?></p>
                <p><b>Email:</b> <?php echo $row['email_add']; ?></p><br>
                <p>Reach out to us for any business enquiries, service assistance, and everything else in between! </p>
                <hr>
            <form action="contact.php" method="POST">
                <div class="flex" style="width: 100%;">
                    <div style="width: 100%;">
                        <label for="cname">Full Name</label><br>
                        <input type="text" name="cname" id="" placeholder="e.g. Jonas C. Vasallo" required><br>
                        <label for="phone">Contact Number</label><br>
                        <input type="tel" name="phone" id="" placeholder="e.g. 09123456789" required pattern="[0][9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" title="11 Digit Contact Number (09XXXXXXXXX)">
                    </div>
                    <div class="div" style="width: 100%;">
                        <label for="email">Email Address</label><br>
                        <input type="email" name="email" id="" placeholder="e.g. example@mail.com" required><br>
                        <label for="inquiry">Choose Option</label><br>
                        <select name="options" id="options" required>
                            <option value="" disabled selected>Select your option</option>
                            <option value="Inquire">Inquire</option>
                            <option value="Help">Help</option>
                          </select><br>
                    </div>
                </div>
                <label for="message">Message</label><br>
                <textarea name="message" id="" cols="30" rows="10" placeholder="Type your message here..." required></textarea>
                <input type="submit" value="Submit" name="submit">


            </form>
            </div>
            <div class="contact hidden" style="max-width: 650px;">
                <span><b style="color: #d7263d;">Located</b> in</span><br>
                <p><b>Address:</b> <?php echo $row['address']; ?></p>
                <?php echo $row['mapsEmbed']; ?>
                
            </div>
        </div>
        
    </div>
    <footer>
        Copyright © 2022 1NE Travel and Tours. All rights reserved.
    </footer>
    <script>
        const toggleBtnIcon = document.querySelector('.toggle-btn i');
        const toggleBtn = document.querySelector('.toggle-btn');
        const dropdownMenu = document.querySelector('.dropdown_menu');
        toggleBtn.onclick = function(){
            dropdownMenu.classList.toggle('open');

            const isOpen = dropdownMenu.classList.contains('open');
            toggleBtnIcon.classList = isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
        }
    </script>
    <script src="modal.js"></script>
    <script defer src="app.js"></script>
</body>
</html>
<?php
    if(isset($_GET['add-review'])){
        $email = $_GET['email'];
        $rating = $_GET['rating'];
        $message = $_GET['message'];
        $query = "SELECT * FROM customers WHERE cEmail='$email'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $id = $row['cID'];
            $query = "INSERT INTO reviews VALUES (null, $rating, '$message', DEFAULT, $id);";
            $result = mysqli_query($con, $query);
            if($result){
                echo "<script>
                document.querySelector('#modal h2').innerHTML = 'Success!';
                document.querySelector('#modal p').innerHTML = 'Thank you for leaving a review!';
                toggleModal();
                setTimeout(function(){
                    window.location.href = 'feedback.php';
                }, 5000);
                </script>";
            } else {
                echo "error";
            }
        } else {
            echo "<script>
            document.querySelector('#modal h2').innerHTML = 'You are not included as a customer!';
            document.querySelector('#modal p').innerHTML = 'Contact us if you think there is a problem.';
            toggleModal();
            </script>";
        }
        
    }
    $_GET = array();
?>