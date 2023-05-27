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
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="feedback.css">
    <link rel="stylesheet" href="utilities.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Reviews | 1ne Travel and Tours</title>
</head>
<body>
    <script>
        $(document).ready(function(){
            $('#review-form').hide();
        });
    </script>
<header class="scrolled">
        <img src="./img/<?php echo $row['logo_path'];?>" alt="">
        <div class="nav-links">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                    <a href="about.php">About</a>
                    <a href="index.php#services">Services</a>
                    <a href="tours.php">Tour Packages</a>
                    <a href="feedback.php">Reviews</a>
                    <a href="contact.php">Contact</a>
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
    <div class="banner background-tint">
        <h3>Testimonials</h3>
        <p>What Our Customers Say</p>
        <button class="button" onclick="$('#review-form').show(500);" type="button">Leave us a review</button>
    </div>
    <div class="modal-background" onclick="toggleModal()"></div>

    <div class="modal" id="modal">
        <h2>Success! </h2>
        <p>
            Thank you for leaving an honest review!
        </p>
    </div>
    <div id="review-form" class="review-form container shadow center-div" style="margin: auto; width: fit-content; position: absolute; max-width: 100vw; top: 25%;">
            <form action="feedback.php" method="GET">
                <button onclick="$('#review-form').hide(500);" style="color: red; background-color: rgba(255,255,255, 0);padding: 0; float: right;">X</button>
                <h3>Leave a review</h3>
                <input type="email" name="email" id="" class="text-box" placeholder="Email Address" required>
                <p style="color: black;">How would you rate us from 1 to 5?</p>
                <input type="number" name="rating" id="" required class="text-box" min="1" max="5" required>
                <textarea name="message" id="" cols="30" rows="5" class="text-box" maxlength="180" required></textarea>
                <input type="submit" value="Submit Review" class="input-btn" name="add-review">
            </form>
        </div>
    <div class="content">
        <?php 
            $rating = "";
            $query = "SELECT customers.cName, reviews.rating, reviews.r_msg, reviews.r_date FROM reviews JOIN customers ON reviews.cID = customers.cID";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_assoc($result)){
                for($i = 0; $i < 5; $i++){
                    if($i < $row['rating']){
                        $rating .= "<span class='fa fa-star checked'></span>";
                    } else {
                        $rating .= "<span class='fa fa-star'></span>";
                    }
                }
                echo "<div class='testimonial'>
                <div class='rating'>
                    $rating
                </div>
                <div class='message'>
                    ".$row['r_msg']."
                </div>
                <div class='customer-name'>
                    ".$row['cName']."
                </div>
                <div class='date'>
                    ".date("D d M Y", strtotime($row['r_date']))."
                </div>
            </div>";
            $rating = "";
            }
        ?>
        
    </div>
    <div class="home6 background-tint-dark" id="contact">
        <div class="touch-container">
            <p>Get in touch with</p>
            <div id="text-div">
            <img src="./img/<?php echo $logo;?>" alt="" style="width: 60px; margin: 10px 0;">
            <span>1ne Travel and Tours</span>
            </div>
            <button class="button" onclick="window.location.href = 'contact.php'">Inquire Now</button>
            <p style="font-size: 16px; margin: 10px 0;">Follow Us On</p>
            <a href="https://www.facebook.com/1netravelandtours"><img alt="Facebook" style="width: 32px; height: 32px; object-fit: cover;" fetchpriority="high" src="https://static.wixstatic.com/media/11062b_f4e3e7f537ff4762a1914aa14e3e36b9~mv2.png/v1/fill/w_32,h_32,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/11062b_f4e3e7f537ff4762a1914aa14e3e36b9~mv2.png"></a>
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