<?php
    require '../dbcon.php';
    if(isset($_GET['id']) && isset($_GET['action'])){
        $id = $_GET['id'];
        $action = $_GET['action'];
        if($_GET['action'] == 'resolve'){
            $query = "UPDATE feedback set f_status='Resolved' WHERE feedback_id=$id;";
            if(mysqli_query($con, $query)){
                echo "<script>alert('Success'); window.location.href='feedbacks.php';</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='feedbacks.php';</script>";
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
</head>
<body>
    <?php 
        include 'admin-header.php';
    ?>

    <div class="container shadow" style="margin: auto; margin-top: 25px; width: 90%; text-align: left; height: 35vh;">
        <p>Customer Feedbacks</p>
        <br>
        <div style="height: 90%; overflow-y: auto; overflow-x: hidden;">
        <table class="table" style="width: 100%; overflow-y: auto; 
            ">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Message</th>
                <th>Sent At</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM feedback WHERE f_status='Unresolved';";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                        <tr>
                            <td>".$row['feedback_id']."</td>
                            <td>".$row['f_name']."</td>
                            <td>".$row['f_email']."</td>
                            <td>".$row['f_message']."</td>
                            <td>".$row['f_timestamp']."</td>
                            <td>".$row['f_status']."</td>
                            <td><a href='feedbacks.php?id=".$row['feedback_id']."&action=resolve' class='input-btn' style='text-decoration: none; background-color: lightgreen;'><i class='fa-solid fa-check'></i></a></td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
        </div>
        
    </div>
    <div class="container shadow" style="margin: auto; margin-top: 50px; width: 90%; text-align: left; height: 35vh;">
        <p>Resolved Feedbacks</p>
        <br>
        <br>
        <div style="height: 90%; overflow-y: auto; overflow-x: hidden;">
        <table class="table" style="width: 100%; overflow-y: auto; 
            ">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Message</th>
                <th>Sent At</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM feedback WHERE f_status='Resolved';";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                        <tr>
                            <td>".$row['feedback_id']."</td>
                            <td>".$row['f_name']."</td>
                            <td>".$row['f_email']."</td>
                            <td>".$row['f_message']."</td>
                            <td>".$row['f_timestamp']."</td>
                            <td>".$row['f_status']."</td>
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