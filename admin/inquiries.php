<?php
    require '../dbcon.php';
    if(isset($_GET['id']) && isset($_GET['action'])){
        $id = $_GET['id'];
        $action = $_GET['action'];
        if($_GET['action'] == 'respond'){
            $query = "UPDATE contact_form SET status='Responded' WHERE contact_id=$id;";
            if(mysqli_query($con, $query)){
                echo "<script>alert('Success'); window.location.href='inquiries.php';</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='inquiries.php';</script>";
            }
        } else if($_GET['action'] == 'remove'){
            $query = "DELETE FROM contact_form WHERE contact_id=$id";
            if(mysqli_query($con, $query)){
                echo "<script>alert('Successfully deleted inquiry'); window.location.href='inquiries.php';</script>";
            } else {
                echo "<script>alert('Failed to delete inquiry'); window.location.href='inquiries.php';</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include 'admin-header.php.';
    ?>
    <div class="container shadow" style="margin: auto; margin-top: 25px; width: 90%; text-align: left; height: 35vh;">
        <p>Customer Inquiries</p>
        <div style="height: 90%; overflow-y: auto; overflow-x: hidden;">
        <table class="table" w>
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Contact No</th>
                <th>Email Address</th>
                <th>Type</th>
                <th>Message</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM contact_form WHERE status='Pending' ORDER BY timestamp;";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                        <tr>
                            <td>".$row['contact_id']."</td>
                            <td style='width: 200px;'>".$row['name']."</td>
                            <td>".$row['contact_no']."</td>
                            <td>".$row['email_add']."</td>
                            <td>".$row['type']."</td>
                            <td style='font-size: 12px; width: 400px;'>".$row['msg']."</td>
                            <td>".$row['timestamp']."</td>
                            <td>".$row['status']."</td>
                            <td style='width: 200px;'><a href='inquiries.php?id=".$row['contact_id']."&action=respond' class='input-btn' style='text-decoration: none; background-color: lightgreen;'><i class='fa-solid fa-check'></i></a> <a href='inquiries.php?id=".$row['contact_id']."&action=remove' class='input-btn' style='text-decoration: none; background-color: red;'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
        </div>
        
    </div>
    <div class="container shadow" style="margin: auto; margin-top: 25px; width: 90%; text-align: left; height: 35vh;">
        <p>Customer Inquiries</p>
        <div style="height: 90%; overflow-y: auto; overflow-x: hidden;">
        <table class="table" style="width: 100%; overflow-y: auto; 
            ">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Contact No</th>
                <th>Email Address</th>
                <th>Type</th>
                <th>Message</th>
                <th>Date</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM contact_form WHERE status='Responded' ORDER BY timestamp;";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                        <tr>
                            <td>".$row['contact_id']."</td>
                            <td style='width: 200px;'>".$row['name']."</td>
                            <td>".$row['contact_no']."</td>
                            <td>".$row['email_add']."</td>
                            <td>".$row['type']."</td>
                            <td style='font-size: 12px; width: 400px;'>".$row['msg']."</td>
                            <td>".$row['timestamp']."</td>
                            <td>".$row['status']."</td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
        </div>
        
    </div>

</body>
</html>