<?php require '../dbcon.php'; ?>
<?php 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(isset($_GET['action'])){
            if($_GET['action'] == 'review-delete'){
                $query = "DELETE FROM reviews WHERE review_id=$id";
                $_GET = array();
                if(mysqli_query($con, $query)){
                    echo "<script>alert('Successfully deleted review'); window.location.href='review.php';</script>";
                } else {
                    echo "<script>alert('Failed to delete review'); window.location.href='review.php';</script>";
                }
            } else if($_GET['action'] == 'customer-delete'){
                $query = "DELETE FROM customers WHERE cID=$id";
                $_GET = array();
                if(mysqli_query($con, $query)){
                    echo "<script>alert('Successfully deleted customer'); window.location.href='review.php';</script>";
                } else {
                    echo "<script>alert('Failed to delete customer'); window.location.href='review.php';</script>";
                }
            }
        }
    } else if(isset($_POST['add-customer'])){
        $name = $_POST['cName'];
        $email = $_POST['cEmail'];
        $query = "INSERT INTO customers VALUES (null, '$name', '$email');";
        $_POST = array();
        if(mysqli_query($con, $query)){
            echo "<script>alert('Successfully added customer'); window.location.href='review.php';</script>";
        } else {
            echo "<script>alert('Failed to add customer'); window.location.href='review.php';</script>";
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
    <title>Reviews | 1ne Admin</title>
</head>
<body>
<?php 
    include 'admin-header.php.';
?>
    <div class="flex flex-main-spacearound" style="margin-top: 150px; width: 90%; margin: 25px auto;">
        <div class="container shadow" style="width: 50%; text-align: left;">
            <p>Client Reviews</p>
            <br>
            <table class="table" style="width: 100%;">
                <thead>
                    <th>Name</th>
                    <th>Rating</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT reviews.review_id, customers.cName, reviews.rating, reviews.r_msg, reviews.r_date FROM reviews JOIN customers ON reviews.cID = customers.cID";
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_assoc($result)){
                            echo "
                            <tr>
                            <td>".$row['cName']."</td>
                            <td>".$row['rating']."</td>
                            <td style='font-size: 12px; width: 400px;'>".$row['r_msg']."</td>
                            <td>".$row['r_date']."</td>
                            <td><a href='review.php?id=".$row['review_id']."&action=review-delete' class='input-btn' style='text-decoration: none; background-color: red;'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="flex flex-col flex-gap-20" style="width: 45%;">
            <div class="container shadow" style="width: 100%; text-align: left;">
                <div class="flex flex-main-spacebetween flex-cross-center">
                    <p>Add Clients</p>
                </div>
                <div id="add-customer" style="margin: 10px 0px;">
                    <form action="review.php" method="POST">
                        <input type="text" name="cName" id="" placeholder="Full Name" required class="text-box">
                        <input type="email" name="cEmail" id="" placeholder="Email Address" required class="text-box">
                        <input type="submit" value="Add Customer" class="input-btn" name="add-customer">
                    </form>
                </div>
                
            </div>
            <div class="container shadow" style="width: 100%; text-align: left;">
                <p>Clients allowed for review</p>
                <table class="table" style="margin-top: 10px; width: 100%;">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM customers";
                            $result = mysqli_query($con, $query);
                            while($row = mysqli_fetch_assoc($result)){
                                echo "
                                <tr>
                                <td>".$row['cID']."</td>
                                <td>".$row['cName']."</td>
                                <td>".$row['cEmail']."</td>
                                <td><a href='review.php?id=".$row['cID']."&action=customer-delete' class='input-btn' style='text-decoration: none; background-color: red;'><i class='fa-solid fa-trash'></i></a></td>
                                </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table> 
            </div>
        </div>
        
    </div>
</body>
</html>