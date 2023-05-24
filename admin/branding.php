<?php 
    require '../dbcon.php';
    if(isset($_POST['submit'])){
        $find = array("'", "\'");
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $map = str_replace("'", '\"',$_POST['map']);
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileDestination = '../img/'.$fileName;
        move_uploaded_file($fileTmpName, $fileDestination);
        $mission = str_replace($find, "\'", $_POST['mission']);
        $vision = str_replace($find, "\'", $_POST['vision']);
        $query = "UPDATE company SET contact_no='$phone', email_add='$email', address='$address', mapsEmbed='$map', logo_path='$fileName', mission='$mission', vision='$vision' WHERE id=1;";
        $result = mysqli_query($con, $query);
        if(!$result){
            echo '<script>alert("Update Failed");</script>';
        } else {
            echo '<script>alert("Successfully Updated");</script>';
        }
    }
?>
<?php 
        $query = "SELECT * FROM company;";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

    ?>

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
<div class="logo-header">
        <img src="../img/<?php echo $row['logo_path'];?>" alt="" width="80px">
    </div>
    <div class="nav shadow">
        <div class="nav-items">
            <ul>
                <li>
                    <a href="">Home</a>
                </li>
                <li>
                    <a href="branding.php">Branding</a>
                </li>
                <li>
                    <a href="">Services</a>
                </li>
                <li>
                    <a href="">Reviews</a>
                </li>
                <li>
                    <a href="">Inquiries</a>
                </li>
                <li>
                    <a href="">Feedbacks</a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="container shadow" style="margin: auto; margin-top: 50px; width: 60%; text-align: left;">
        <h3>Customize Company Information</h3>
        <br>
        <br>
        <form action="branding.php" method="POST" enctype="multipart/form-data">
            
            <input type="tel" name="phone" id="" placeholder="Phone/Tel Number" class="text-box" value="<?php echo $row['contact_no']; ?>">
            <input type="email" name="email" id="" placeholder="Email Address" class="text-box" value="<?php echo $row['email_add']; ?>">
            <input type="text" name="address" id="" placeholder="Address" class="text-box" value="<?php echo $row['address']; ?>">
            <input type="text" name="map" id="" placeholder="Google Maps Embedded Map" class="text-box" placeholder="Paste Google Maps Embedded Map Link" value="<?php echo str_replace('"', "'",$row['mapsEmbed']);?>">
            <p>Company Logo</p>
            <input type="file" name="file" id="" placeholder="Company Logo" class="text-box">
            <div class="flex flex-main-spacebetween flex-gap-10">
               <div style="width: 50%;">
                    <p>Mission</p>
                    <textarea name="mission" id="mission" cols="15" rows="10" placeholder="Mission" class="text-box"><?php echo $row['mission']; ?></textarea>
               </div>
                <div style="width: 50%;">  
                    <p>Vision</p>
                    <textarea name="vision" id="" cols="15" rows="10" placeholder="Vision" class="text-box"><?php echo $row['vision']; ?></textarea>
                </div>
            </div>
            
            
            <input type="submit" value="Update" name="submit" class="input-btn" style="display: block; margin:auto;">
        </form>
    </div>
</body>
</html>