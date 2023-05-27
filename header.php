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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
        <img src="./img/<?php echo $row['logo_path'];?>" alt="">
        <div class="nav-links">
            <ul>
                <li>
                    <a href="#">Home</a>
                    <a href="about.php">About</a>
                    <a href="#services">Services</a>
                    <a href="tours.php">Tour Packages</a>
                    <a href="feedback.php">Reviews</a>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
        <div class="toggle-btn">
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
</body>
</html>
