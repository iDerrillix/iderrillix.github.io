<?php require 'dbcon.php';?>
<?php 
    $query = "SELECT * FROM company;";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="modal.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="feedback.css">
    <link rel="stylesheet" href="utilities.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customer Reviews</title>
</head>
<body>
<header class="scrolled">
        <img src="./img/<?php echo $row['logo_path'];?>" alt="">
        <div class="nav-links">
            <ul>
                <li>
                <a href="./index.php#">Home</a>
                <a href="./index.php#about">About</a>
                <a href="./index.php#services">Services</a>
                <a href="./index.php#feedback">Feedback</a>
                <a href="./index.php#contact">Contact</a>
                </li>
            </ul>
        </div>
        <div class="toggle-btn" style="color: black;">
            <i class="fa-solid fa-bars" id="hamburger"></i>
        </div>
    </header>
    <div class="dropdown_menu">
            <li><a href="index.php#">Home</a></li>
            <li><a href="index.php#about">About</a></li>
            <li><a href="index.php#services">Services</a></li>
            <li><a href="index.php#feedback">Feedback</a></li>
            <li><a href="index.php#contact">Contact</a></li>
        </div>
    <div class="banner background-tint">
        <h3>Testimonials</h3>
        <p>What Our Customers Say</p>
        <button class="button" onclick="document.querySelector('#review-form').style.visibility = 'visible';" type="button">Leave us a review</button>
    </div>
    <div class="modal-background" onclick="toggleModal()"></div>

    <div class="modal" id="modal">
        <h2>Success! </h2>
        <p>
            Thank you for leaving an honest review!
        </p>
    </div>
    <div id="review-form" class="review-form container shadow center-div" style="margin: auto; width: fit-content; position: absolute; max-width: 100vw; visibility: hidden;">
            <form action="feedback.php" method="GET">
                <button onclick="document.querySelector('#review-form').style.visibility = 'hidden';" style="color: red; background-color: rgba(255,255,255, 0);padding: 0; float: right;">X</button>
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
                    ".date("D d M", strtotime($row['r_date']))."
                </div>
            </div>";
            $rating = "";
            }
        ?>
        
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