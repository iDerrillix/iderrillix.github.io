
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>1ne Travel and Tours</title>
</head>
<body>
    <?php 
        include 'header.php';
    ?>
    <?php 
        if(isset($_POST['submit'])){
            $cname = $_POST['cname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $options = $_POST['options'];
            $message = $_POST['message'];

            $query = "INSERT INTO contact_form VALUES (null, '$cname', '$phone', '$email', '$options', '$message', null, 'Pending');";
            $result = mysqli_query($con, $query);
            $_POST = array();
            if($result){
                echo "<script>alert('Success'); window.location.href='index.php#contact';</script>";
            } else {
                echo "<script>alert('Failed'); ";
            }
        }
    ?>
    <div class="home background-tint-dark">
        <img src="./img/<?php echo $row['logo_path'];?>" alt="" width="120px" class="hidden">
        <h1 class="home-content hidden">From <b style="color: #d7263d;">DREAM</b> to <b style="color: #03d3fc;">DESTINATION</b></h1>
        
        <p class="home-content hidden">Travel the world, one adventure at a time</p><br>
        <button class="home-content hidden" onclick="window.location.href='./index.php#contact';">Start Your Journey Now</button>
    </div>
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
    <div class="home4" id="feedback">
        <p style="color: #fff;" class="hidden">Tried our services before?</p>
        <h3 style="color: #d7263d;" class="hidden"> <b>Give us a feedback!</b> </h3>
        <form action="sendmail.php" method="POST" class="hidden">
            <input type="text" name="fname" id="fname" placeholder="Your Name" required>
            <input type="email" name="femail" id="femail" placeholder="Your Email" required>
            <textarea name="fmessage" id="" cols="30" rows="5" placeholder="Your Feedback" required></textarea >
            <input type="submit" value="Send" onclick="feedback();" name="submit">
        </form>
        
    </div>
    <div class="home5">

        <p class="hidden" style="color: grey;">What Our Customers Say</p>
        <h1 class="hidden">Reviews</h1><br>
        <div class="flex flex-center">
            <div class="feedback-container hidden">
                testawdtawdt tawd awdtaw dtawd awtd awdtaw dtawd tawd awtd awtd awdt awdt awdta wdawtd awtd awtd awtd awtd watdaw dtw dawtd awtd wtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd"
                <br><br><b>-yung nagsabe hahaha</b>
            </div>
            <div class="feedback-container hidden">
                "testawdtawdt tawd awdtaw dtawd awtd awdtaw dtawd tawd awtd awtd awdt awdt awdta wdawtd awtd awtd awtd awtd watdaw dtw dawtd awtd wtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd"
                <br><br><b>-yung nagsabe hahaha</b>
            </div>
            <div class="feedback-container hidden">
                "testawdtawdt tawd awdtaw dtawd awtd awdtaw dtawd tawd awtd awtd awdt awdt awdta wdawtd awtd awtd awtd awtd watdaw dtw dawtd awtd wtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd
                <br><br><b>-yung nagsabe hahaha</b>
            </div>
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
