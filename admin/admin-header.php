<?php
    include 'admin-verify.php';
    require '../dbcon.php';
        $query = "SELECT * FROM company;";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../utilities.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <nav>
        <div class="logo-header shadow">
            <div style="display: flex; align-items: center; gap: 20px;">
                <img src="../img/<?php echo $row['logo_path'];?>" alt="" width="80px">
                <h3>1ne Travel and Tours</h3>
            </div>
            <div>
                <a href="admin-login.php" style="text-decoration: none; color: white; font-weight: bold;">Logout</a>
            </div>
            
        </div>
        <div class="nav">
            <div class="nav-items">
                <ul>
                    <li>
                        <a href="dashboard.php">HOME</a>
                    </li>
                    <li>
                        <a href="branding.php">BRANDING</a>
                    </li>
                    <li>
                        <a href="services.php">SERVICES</a>
                    </li>
                    <li>
                        <a href="tour-packages.php">TOUR PACKAGES</a>
                    </li>
                    <li>
                        <a href="review.php">REVIEWS</a>
                    </li>
                    <li>
                        <a href="inquiries.php">INQUIRIES</a>
                    </li>
                    <li>
                        <a href="feedbacks.php">FEEDBACKS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
</body>
</html>
