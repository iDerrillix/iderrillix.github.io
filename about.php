<?php require 'dbcon.php';?>
<?php 
    $query = "SELECT * FROM company;";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="feedback.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div class="page1 background-tint-dark">
        <div class="about-details1 hidden">
            <h1>We want you to experience the best journey of your life!</h1>
        </div>
        <div class="about-details2 hidden">
            <p>We are a full-service travel agency dedicated to providing our clients with exceptional travel experiences. Our team of experienced professionals is passionate about travel and committed to delivering the highest level of customer service.</p>
        </div>
    </div>
    <div class="page2 background-tint-dark">
        <div class="div" id="inner-div">
        <div class="text-side hidden">
            <h3>At 1NE Travel and Tours, we believe that <b style="color: #d7263d;">travel</b> is <b style="color: #d7263d;">more than just visiting new places</b>.</h3>
            <br>
            <p>It's about immersing yourself in new cultures, experiencing unique adventures, and creating memories that will last a lifetime.</p>
        </div>
        <div class="video-side hidden">
            <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F1netravelandtours%2Fvideos%2F455122020039429%2F&show_text=false&width=560&t=0" width="640" height="480" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true" data-autoplay="true"></iframe>
        </div>
        </div>
        
        
    </div>
    <div class="page3 background-tint-dark">
        <p class="hidden">We pride ourselves on our attention to detail and commitment to providing our clients with the best possible travel experiences. Our goal is to make your travel dreams a reality and ensure that every aspect of your trip is seamless and stress-free.</p>
        <div class="vision_mission">
            <?php 
                $query = "SELECT * FROM company;";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);

            ?>
            <div class="mission hidden">
                <h1>Our <b style="color: #d7263d;">Mission </b></h1>
                <p><?php echo $row['mission'];?></p>
            </div>
            <div class="vision hidden">
                <h1>Our <b style="color: #d7263d;">Vision</b></h1>
                <p><?php echo $row['vision'];?></p>
            </div>
        </div>
        
    </div>
    <div class="page4 background-tint-dark">
        <p class="hidden">Travel with confidence and peace of mind, knowing that our team is dedicated to your satisfaction.</p>
        <h3 id="p1" class="hidden">We ensure that your travel needs are met with <b style="color: #d7263d;">professionalism</b>, <b style="color: #d7263d;">efficiency</b>, and <b style="color: #d7263d;">attention to detail</b>.</h3>
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
    <script src="app.js"></script>
</body>
</html>