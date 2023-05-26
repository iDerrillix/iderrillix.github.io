
<?php
        require '../dbcon.php';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
             if(isset($_GET['action']) && $_GET['action'] == 'delete'){
                $query = "DELETE FROM services WHERE service_ID=$id;";
                $result = mysqli_query($con, $query);
                if($result){
                    echo "<script>alert('Success'); window.location.href='services.php';</script>";
                } else {
                    echo "<script>alert('Failed'); window.location.href='services.php';</script>";
                }
            }
            
        } else if(isset($_POST['add-service'])){
            if(isset($_FILES['sevice_imgPath']) && isset($_POST['service_name'])){
                $name = $_POST['service_name'];
                $file = $_FILES['sevice_imgPath'];
                $fileName = $_FILES['sevice_imgPath']['name'];
                $fileTmpName = $_FILES['sevice_imgPath']['tmp_name'];
                $fileDestination = '../img/'.$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $query = "INSERT INTO services VALUES (null, '$name', '$fileName');";
                $result = mysqli_query($con, $query);
                if($result){
                    echo "<script>alert('Success'); window.location.href='services.php';</script>";
                } else {
                    echo "<script>alert('Failed'); window.location.href='services.php';</script>";
                }
                
            } else {
                echo "<script>alert('Failed'); window.location.href='services.php';</script>";
            }
        } else if(isset($_POST['modify_service'])){
            $id = $_POST['service_ID'];
            $name = $_POST['service_name'];
            if(!isset($_FILES['sevice_imgPath']) || $_FILES['sevice_imgPath']['error'] == UPLOAD_ERR_NO_FILE) {
                $query = "UPDATE services SET service_name='$name' WHERE service_ID=$id;";
            } else {
                $file = $_FILES['sevice_imgPath'];
                $fileName = $_FILES['sevice_imgPath']['name'];
                $fileTmpName = $_FILES['sevice_imgPath']['tmp_name'];
                $fileDestination = '../img/'.$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $query = "UPDATE services SET service_name='$name', sevice_imgPath='$fileName' WHERE service_ID=$id;";
            }
            $result = mysqli_query($con, $query);
            if($result){
                echo "<script>alert('Success'); window.location.href='services.php';</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='services.php';</script>";
            }
        }
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
<?php 
    include 'admin-header.php.';
?>
    <div class="container shadow" style="margin: auto; margin-top: 50px; width: 60%; text-align: left;">
        <h3>Manage Services</h3>
        <button class="input-btn" style="margin: 10px 0;" onclick="document.querySelector('#add-service').style.display = 'block';">Add Service</button>
        <div id="add-service" style="display: none; margin-bottom: 20px;">
        <p>Add Service</p>
            <form action="services.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="service_name" id="" class="text-box" placeholder="Service Name" required>
                <p>Service Image</p>
                <input type="file" name="sevice_imgPath" id="" class="text-box" required>
                <input type="submit" value="Add" class="input-btn" name="add-service" style="float: right;">
            </form>
            <br>
        </div>
        
        <div id="modify-service" style="display: none; margin-bottom: 20px;">
            <p>Update Service</p>
            <hr>
            <br>
            <form action="services.php" method="POST" enctype="multipart/form-data">
                <?php 
                if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'modify'){
                    echo "<script>document.querySelector('#modify-service').style.display = 'block';</script>";
                    echo "<input type='hidden' name='service_ID' value='".$_GET['id']."'>";
                    $query = "SELECT * FROM services WHERE service_ID=$id;";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo "<input type='text' name='service_name' id='' class='text-box' placeholder='Service Name' required value='".$row['service_name']."'>";
                }
            ?>
                
                <p>Service Image</p>
                <input type="file" name="sevice_imgPath" id="" class="text-box">
                <input type="submit" value="Update" class="input-btn" name="modify_service" style="float: right;">
            </form>
        </div>
        <br>
        <br>
        <table class="table" style="width: 100%;">
            <thead>
                <th>Service ID</th>
                <th>Service Name</th>
                <th>Service Image</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM services;";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                            <tr>
                                <td>".$row['service_ID']."</td>
                                <td>".$row['service_name']."</td>
                                <td><img src='../img/".$row['sevice_imgPath']."' style='width: 120px;'></td>
                                <td><a href='services.php?id=".$row['service_ID']."&action=modify' class='input-btn' style='text-decoration: none; background-color: orange;'><i class='fa-solid fa-pen-to-square'></i></a> <a href='services.php?id=".$row['service_ID']."&action=delete' class='input-btn' style='text-decoration: none; background-color: red;'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>
                        ";
                    }
                ?>
                
                
            </tbody>
        </table>
    </div>
</body>
</html>