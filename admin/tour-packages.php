
<?php
        require '../dbcon.php';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
             if(isset($_GET['action']) && $_GET['action'] == 'delete'){
                $query = "DELETE FROM packages WHERE pID=$id;";
                $result = mysqli_query($con, $query);
                if($result){
                    echo "<script>alert('Success'); window.location.href='tour-packages.php';</script>";
                } else {
                    echo "<script>alert('Failed'); window.location.href='tour-packages.php';</script>";
                }
            }
            
        } else if(isset($_POST['add-package'])){
            if(isset($_FILES['pImgPath']) && isset($_POST['p_name'])){
                $name = str_replace("'", "\'", $_POST['p_name']);
                $file = $_FILES['pImgPath'];
                $desc = str_replace("'", "\'", $_POST['p_desc']);
                $featured = $_POST['featured'];
                $fileName = $_FILES['pImgPath']['name'];
                $fileTmpName = $_FILES['pImgPath']['tmp_name'];
                $fileDestination = '../img/'.$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $query = "INSERT INTO packages VALUES (null, '$name', '$desc', $featured,'$fileName');";
                $result = mysqli_query($con, $query);
                if($result){
                    echo "<script>alert('Success'); window.location.href='tour-packages.php';</script>";
                } else {
                    echo "<script>alert('Failed'); window.location.href='tour-packages.php';</script>";
                }
                
            } else {
                echo "<script>alert('Failed'); window.location.href='tour-packages.php';</script>";
            }
        } else if(isset($_POST['modify_package'])){
            $id = $_POST['pID'];
            $name = str_replace("'", "\'", $_POST['p_name']);
            $file = $_FILES['pImgPath'];
            $desc = str_replace("'", "\'", $_POST['p_desc']);
            $featured = $_POST['featured'];
            if(!isset($_FILES['pImgPath']) || $_FILES['pImgPath']['error'] == UPLOAD_ERR_NO_FILE) {
                $query = "UPDATE packages SET p_name='$name', p_desc='$desc', featured=$featured WHERE pID=$id;";
            } else {
                $fileName = $_FILES['pImgPath']['name'];
                $fileTmpName = $_FILES['pImgPath']['tmp_name'];
                $fileDestination = '../img/'.$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $query = "UPDATE packages SET p_name='$name', p_desc='$desc', pImgPath='$fileName', featured=$featured WHERE pID=$id;";
            }
            $result = mysqli_query($con, $query);
            if($result){
                echo "<script>alert('Success'); window.location.href='tour-packages.php';</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='tour-packages.php';</script>";
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
    <title>Tour Packages | 1ne Admin</title>
</head>
<body>
<?php 
    include 'admin-header.php.';
?>
    <div class="container shadow" style="margin: auto; margin-top: 25px; width: 60%; text-align: left;">
        <div id="add-service" style="margin-bottom: 20px;">
        <p>Add Tour Package</p>
            <form action="tour-packages.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="p_name" id="" class="text-box" placeholder="Tour Package Name" required>
                <p>Tour Package Image</p>
                <input type="file" name="pImgPath" id="" class="text-box" required>
                <p>Featured</p>
                <input type="radio" name="featured" id="yes" value="1">
                <label for="yes">Yes</label>
                <input type="radio" name="featured" id="no" value="0" checked>
                <label for="no">No</label>
                <textarea name="p_desc" id="" cols="30" rows="5" class="text-box" maxlength="155" placeholder="Tour Package Description" style="resize: none;"></textarea>
                <input type="submit" value="Add" class="input-btn" name="add-package" style="float: right;">
            </form>
            <br>
        </div>
    </div>
    <div class="container shadow" style="margin: auto; margin-top: 25px; width: 60%; text-align: left; display: none; margin-bottom: 20px;" id="modify-service">
        <p>Update Tour Package</p>
        <br>
        <form action="tour-packages.php" method="POST" enctype="multipart/form-data">
            <?php 
            if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'modify'){
                echo "<script>document.querySelector('#modify-service').style.display = 'block';</script>";
                echo "<input type='hidden' name='pID' value='".$_GET['id']."'>";
                $query = "SELECT * FROM packages WHERE pID=$id;";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
            }
        ?>
            <input type='text' name='p_name' id='' class='text-box' placeholder='Tour Package Name' required value='<?php echo $row['p_name']; ?>'>
            <p>Tour Package Image</p>
            <input type="file" name="pImgPath" id="" class="text-box">
            <p>Featured</p>
            <?php 
                if($row['featured'] == 1){
                    echo "<input type='radio' name='featured' id='yes' value='1' checked>
                    <label for='yes'>Yes</label>
                    <input type='radio' name='featured' id='no' value='0'>
                    <label for='no'>No</label>";
                } else{
                    echo "<input type='radio' name='featured' id='yes' value='1'>
                    <label for='yes'>Yes</label>
                    <input type='radio' name='featured' id='no' value='0' checked>
                    <label for='no'>No</label>";
                }
            ?>
            
            <textarea name="p_desc" id="" cols="30" rows="5" class="text-box" maxlength="155" placeholder="Tour Package Description" style="resize: none;"><?php echo $row['p_desc'];?></textarea>
            <input type="submit" value="Update" class="input-btn" name="modify_package">
        </form>
    </div>
    <div class="container shadow" style="margin: auto; margin-top: 15px; width: 60%; text-align: left;">
        <table class="table" style="width: 100%;">
            <thead>
                <th>Tour ID</th>
                <th>Tour Package Name</th>
                <th>Tour Package Image</th>
                <th>Tour Package Description</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM packages;";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                            <tr>
                                <td>".$row['pID']."</td>
                                <td>".$row['p_name']."</td>
                                <td><img src='../img/".$row['pImgPath']."' style='width: 120px;'></td>
                                <td style='font-size: 12px;'>".$row['p_desc']."</td>
                                <td style='width: 180px;'><a href='tour-packages.php?id=".$row['pID']."&action=modify' class='input-btn' style='text-decoration: none; background-color: orange;'><i class='fa-solid fa-pen-to-square'></i></a> <a href='tour-packages.php?id=".$row['pID']."&action=delete' class='input-btn' style='text-decoration: none; background-color: red;'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>
                        ";
                    }
                ?>
                
                
            </tbody>
        </table>
    </div>

</body>
</html>