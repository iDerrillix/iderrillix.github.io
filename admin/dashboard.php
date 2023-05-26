<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../utilities.css">
    <link rel="stylesheet" href="admin.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    include 'admin-header.php.';
?>
    <div class="stats flex flex-main-center flex-gap-20 flex-main-spaceearound center-div flex-wrap">
        <!-- <div class="nav-btn shadow" style="width: 200px;">
            <a href="">About</a>
            <p>Customize the website's about section</p>
        </div>
        <div class="nav-btn shadow" style="width: 200px;">
            <a href="">Services</a>
            <p>Add or remove services that is shown in the website</p>
        </div>
        <div class="nav-btn shadow" style="width: 200px;">
            <a href="">Reviews</a>
            <p>Manage customer reviews that are seen in the website</p>
        </div>
        <div class="nav-btn shadow" style="width: 200px;">
            <a href="">Branding</a>
            <p>Customize the website's logo</p>
        </div>
        <div class="nav-btn shadow" style="width: 200px;">
            <a href="">Inquiries</a>
            <p>View customer inquiries</p>
        </div>
        <div class="nav-btn shadow" style="width: 200px;">
            <a href="">Feedbacks</a>
            <p>View customer feedbacks</p>
        </div>
        <div>
            
        </div> -->
        <div class="nav-btn-container shadow">
            <a href="branding.php" class="nav-btn">
                <h1>Branding</h1>
                <p>Customize the company's information</p>
            </a>
        </div>
        <div class="nav-btn-container shadow">
            <a href="services.php" class="nav-btn">
                <h1>Services</h1>
                <p>Add or remove services that is shown in the website</p>
            </a>
        </div>
        <div class="nav-btn-container shadow">
            <a href="review.php" class="nav-btn">
                <h1>Reviews</h1>
                <p>Manage customer reviews that are seen in the website</p>
            </a>
        </div>
        
        <div class="nav-btn-container shadow">
            <a href="inquiries.php" class="nav-btn">
                <h1>Inquiries</h1>
                <p>View customer inquiries</p>
            </a>
        </div>
        <div class="nav-btn-container shadow">
        <a href="feedbacks.php" class="nav-btn">
            <h1>Feedbacks</h1>
            <p>View customer feedbacks</p>
        </a>
        </div>
        
        
    </div>
</body>
</html>