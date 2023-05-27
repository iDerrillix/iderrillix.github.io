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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="feedback.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Packages | 1ne Travel and Tours</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
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
    <div class="featured-tours">
    <p class="hidden" style="color: grey;">Explore and Uncover</p>
    <h1 class="hidden">TOUR PACKAGES</h1>
    <div class="tours">
        <?php 
            $query = "SELECT * FROM packages;";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='tour-card hidden'>
                <div class='tour-image'>
                    <img src='./img/".$row['pImgPath']."' alt=''>
                </div>
                <div class='intro'>
                    <h1>".$row['p_name']."</h1>
                    <p>".$row['p_desc']."</p>
                </div>
            </div>";
            }
        ?>
    </div>
</div>
    <div class="home6 background-tint-dark" id="contact">
        <div class="touch-container hidden">
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
    <script src="app.js"></script>
</body>
</html>