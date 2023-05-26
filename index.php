
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>1ne Travel and Tours</title>
    <link rel="stylesheet" href="modal.css">
</head>
<body>
    <div class="modal-background" onclick="toggleModal()"></div>

    <div class="modal" id="modal">
        <h2>Thank you for contacting us!</h2>
        <p>
            Thank you for leaving an honest review!
        </p>
    </div>
    <script src="modal.js"></script>
    <?php 
        include 'header.php';
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
            $mail->Username = 'jjfoodtrays@gmail.com';
            $mail->Password = 'ltpmkxujuugyhmkc';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('jjfoodtrays@gmail.com',  "One Travel and Tours");
            $mail->addAddress($_POST['email'], $_POST['cname']);
            $mail->isHTML(true);
            $mail->Subject = "Thank You for Contacting Us!";
            $mail->Body = 'Hi, '.$_POST['cname'].'.  Thank you for reaching out to us through our website. We appreciate your interest in One Travel and Tours. 
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
                    window.location.href = 'index.php#contact';
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
    <div class="home">
        <div class="text">
        <img src="./img/<?php echo $row['logo_path'];?>" alt="" width="120px" class="hidden">
        <h1 class="home-content hidden">From <b style="color: #d7263d;">DREAM</b> to <b style="color: #03d3fc;">DESTINATION</b></h1>
        
        <p class="home-content hidden">Travel the world, one adventure at a time</p><br>
        <button class="home-content hidden" onclick="window.location.href='./index.php#contact';">Start Your Journey Now</button>
        </div>
        <div class="slider background-tint-dark">
            <div class="slides background-tint-dark">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">

                <div class="sliding first">
                    <img src="./img/shrine-entrance.jpg" alt="">
                </div>
                <div class="sliding">
                    <img src="./img/huts.jpg" alt="">
                </div>
                <div class="sliding">
                    <img src="./img/lake.jpg" alt="">
                </div>
                <div class="sliding">
                    <img src="./img/pic1.jpg" alt="">
                </div>
            </div>
        </div>
        
        
    </div>
    <script>
        var counter = 1;
        setInterval(function(){
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if(counter > 4){
                counter = 1;
            }
        }, 5000);
    </script>
    <div class="home2 background-tint" id="about">
        <span class="hidden">TRAVEL
        <span style="font-weight: bold; color: #d7263d;">MORE,</span><br>
        <span class="hidden">WORRY
        <span style="font-weight: bold; color: #d7263d;">LESS.</span>
        
        <p class="hidden">We are a travel agency that provide diverse travel services to clients all <b>across the country</b>.<br> Founded in <b>2022</b>, we specialize in assisting you in your travel needs.</p>
        <button id="button" class="hidden" onclick="window.location.href='about.php';">Find Out More</button>
    </div>
    <div class="home3" id="services">
        <p class="hidden" style="color: grey;">What We Offer</p>
        <h1 class="hidden">SERVICES</h1>
        <br>
        <div class="services">
            <div class="flex flex-center" >
                <?php 
                    $query = "SELECT * FROM services;";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="card-showcase hidden">
                        <div class="image">
                            <img src="./img/'.$row['sevice_imgPath'].'" alt="">
                        </div>
                        <div class="description">
                            <h4>'.strtoupper($row['service_name']).'</h4>
                        </div>
                    </div>';
                    }
                ?>
                
            </div>
        </div>
    </div>
    <div class="img-area background-tint-dark" id="img-area">
        <div class="text hidden">
            <p style="color: white;">At One Travel and Tours, our commitment to high-quality work extends beyond the booking process. </p>
            <span style="color: white; font-size: 32px;">We provide <b style="color: #d7263d;">timely assistance</b> and <b style="color: #d7263d;">support</b>, even while you are on the <b style="color: #d7263d;">go</b>.</span>
            
        </div>
        <img id="test" src="./img/suitcase2.jpeg"/>
    </div>
<script>
      window.addEventListener('scroll', () => {  
    let scrollTop = document.documentElement.scrollTop;
    document.getElementById('test').style.width = 100 + scrollTop / 5 + '%';
  });
window.addEventListener('scroll', () => {
  let imgElement = document.getElementById('test');
  let imgAreaElement = document.getElementById('img-area');
  
  let imgAreaRect = imgAreaElement.getBoundingClientRect();
  let imgAreaTop = imgAreaRect.top;
  let imgAreaBottom = imgAreaRect.bottom;
  
  let viewportHeight = window.innerHeight;
  
  if (imgAreaTop < viewportHeight && imgAreaBottom > 0) {
    let scrollTop = document.documentElement.scrollTop;
    let scrollPosition = imgAreaTop - scrollTop;
    let scrollPercentage = (viewportHeight - scrollPosition) / viewportHeight;
    let zoomLevel = 100 + (scrollPercentage * 20); // Adjust the zoom speed as needed
    console.log(zoomLevel);
    imgElement.style.width = zoomLevel + '%';
  }
});
</script>
    <div class="home4" id="feedback">
        <p style="color: #fff;" class="hidden">Tried our services before?</p>
        <h3 style="color: #d7263d;" class="hidden"> <b>Give us a feedback!</b> </h3>
        <form action="sendmail.php" method="POST" class="hidden">
            <input type="text" name="fname" id="fname" placeholder="Your Name" required>
            <input type="email" name="femail" id="femail" placeholder="Your Email" required>
            <textarea name="fmessage" id="" cols="30" rows="5" placeholder="Your Feedback" required></textarea >
            <input type="submit" value="Send" onclick="document.querySelector('#modal h2').innerHTML = 'Thank you for your feedback!';
                document.querySelector('#modal p').innerHTML = 'We appreciate your thoughts and we will keep striving to become better.';
                toggleModal();
                setTimeout(function(){
                    window.location.href = 'index.php#feedback';
                }, 5000);" name="submit">
        </form>
        
    </div>
    <div class="home5">

        <p class="hidden" style="color: grey;">What Our Customers Say</p>
        <h1 class="hidden">Reviews</h1><br>
        <div class="flex flex-center">
        <?php 
            $query = "SELECT customers.cName, reviews.rating, reviews.r_msg, reviews.r_date FROM reviews JOIN customers ON reviews.cID = customers.cID LIMIT 3";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='feedback-container hidden flex flex-col flex-main-spacebetween'>
                <div>
                    ".$row['r_msg']."
                </div>
                <div style='align-self: flex-end;'>
                    <b>".$row['cName']."</b>
                </div>
            </div>";
            }
        ?>
            
            
        </div>
        <button id="button" class="hidden" onclick="window.location.replace('./feedback.php')">SEE ALL</button>
    </div>
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
            <form action="index.php" method="POST">
                <div class="flex">
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
    <script src="stickynav.js"></script>
    <script defer src="app.js"></script>
    
</body>
</html>
