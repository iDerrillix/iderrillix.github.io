<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../utilities.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container center-div center-text shadow" style="width: 40%;">
        <form action="login.php" method="POST">
            <img src="../img/marwinlogowhiters.png" alt="" style="width: 120px;">
            <h3>Administrator Login</h3>
            <p>Enter Your Credentials</p>
            <br>
            <?php 
                if(isset($_GET['status']) == 'fail'){
                    echo "<p style='color:red;'>Wrong Email or Password</p>";
                }
            ?>
            <input type="text" name="username" id="" placeholder="Username" class="text-box">
            <input type="password" name="password" id="" placeholder="Password" class="text-box">
            <input type="submit" name="login" value="Login" class="input-btn" style="width: 100%">
        </form>
    </div>
    
</body>
</html>