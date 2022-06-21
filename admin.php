<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: admin/index.php" );
    }
    include 'dbcon/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify VSN Admin Login</title>
    <link rel="icon" type="image/png" href="public/images/icons/favicon.ico" />
    <?php include 'links.php'; ?>
</head>
<body>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">


                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <span class="anchor" id="formLogin"></span>


                        <!-- form user info -->
                        <div class="card card-outline-secondary">
                            <div class="card-header">
                                <h3 class="mb-0">Admin Login</h3>
                            </div>
                            <div class="card-body">
                                <form autocomplete="off" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST" class="form" role="form">
                                <?php 
                    
                    if(isset($_POST['login_btn']))
                    {
                        $username = mysqli_real_escape_string($con,$_POST['username']);
                        $password = mysqli_real_escape_string($con,$_POST['password']);

                        $username_search = "SELECT * FROM admin WHERE username='$username' ";
                        $query = mysqli_query($con,$username_search);
                        $username_counts = mysqli_num_rows($query);
                        if($username_counts){
                            $username_pass = mysqli_fetch_assoc($query);

                            $db_pass = $username_pass['passwords'];

                            $pass_decode = password_verify($password,$db_pass);

                            if($pass_decode){
                                $_SESSION['username'] = $username_pass['username'];
                                ?>
                                <script>
                                    location.replace("admin/index.php");
                                </script>

                     <?php            
                     }else{
                                echo "<h5 style='color:red'>Invalid Username or Password</h5>";
                            }

                        }else{ 
                             echo '<h5 style="color:red">Invalid Username or Password</h5>';
                        }
                    }
                 ?>

                                    <div class="form-group row mt-3">
                                        <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="username"
                                                placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input class="btn btn-primary" type="submit" name="login_btn" value="Login">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /form user info -->
                    </div>
                </div>
            </div>
            <!--/card-->
        </div>
    </div>
    <!--/row-->
    </div>
    <!--/col-->
    </div>
    <!--/row-->
    </div>
    <!--/container-->


</body>

</html>