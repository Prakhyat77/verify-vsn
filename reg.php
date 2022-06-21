<?php
    session_start();
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
        include 'dbcon/conn.php';
        if(isset($_POST['admin_reg_btn']))
        {
            $username = mysqli_real_escape_string($con,$_POST['username']);
            $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);

            $pass = password_hash($password, PASSWORD_BCRYPT);

            $admin_reg_query = "INSERT INTO admin(username,admin_email,passwords) VALUES('$username','$admin_email','$pass')";
            $admin_reg_query_result = mysqli_query($con,$admin_reg_query);
            // header('Location : admin.php');
        }
    ?>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <h1>Admin Registeration</h1>
        <input type="text" name="username" placeholder="username">
        <br>
        <input type="email" name="admin_email" placeholder="email">
        <br>
        <input type="password" name="password" placeholder="password">
        <br>
        <input type="submit" name="admin_reg_btn" >
    </form>
</body>
</html>