<?php 
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
    <div class="logo-header">
        <img src="../img/<?php echo $row['logo_path'];?>" alt="" width="80px">
    </div>
    <div class="nav shadow">
        <div class="nav-items">
            <ul>
                <li>
                    <a href="dashboard.php">Home</a>
                </li>
                <li>
                    <a href="branding.php">Branding</a>
                </li>
                <li>
                    <a href="services.php">Services</a>
                </li>
                <li>
                    <a href="review.php">Reviews</a>
                </li>
                <li>
                    <a href="inquiries.php">Inquiries</a>
                </li>
                <li>
                    <a href="feedbacks.php">Feedbacks</a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
