<?php
    session_start();
    
    if(isset($_SESSION['username'])){
        header("Location: admin/index.php" );
    }

    include 'includes/header.php';
    include 'dbcon/conn.php';

    include 'send_otp.php';
    $success="";
    $success_message="";
    $error_message="";
    $err_message="";

    if(!empty($_POST['email']) and !empty($_POST['mobile'])){
        $otp=rand(111111,999999);
        $ver_details = $_POST['mobile'];
        if(strlen($ver_details)==10){
            $sms_status = sendsmsOTP($_POST['mobile'],$otp);
            if ($sms_status == 1){
                $create_at = date("Y-m-d H:i:s");
                $in_otp_query = "INSERT INTO otp_expiry(otp,is_expired,create_at,verify_details) VALUES ('$otp','0','$create_at','$ver_details')";
                $in_otp_result = mysqli_query($con,$in_otp_query);
                $current_id = mysqli_insert_id($con);
                if(!empty($current_id)){
                    $success=1;
                    $success_message="OTP is send in ".$ver_details;
                }
                }
                else{
                    $err_message="Something Went Wrong Try after some time";
                }    
        }else{
            $err_message="Please Enter Valid Mobile Number";
        }
    }

    //email
    else if(!empty($_POST['email'])){
        $otp=rand(111111,999999);
        $ver_details = $_POST['email'];
        $mail_status = sendemailOTP($_POST['email'],$otp);
        if ($mail_status == 1){
            $create_at = date("Y-m-d H:i:s");
            $in_otp_query = "INSERT INTO otp_expiry(otp,is_expired,create_at,verify_details) VALUES ('$otp','0','$create_at','$ver_details')";
            $in_otp_result = mysqli_query($con,$in_otp_query);
            $current_id = mysqli_insert_id($con);
            if(!empty($current_id)){
                $success=1;
                $success_message="OTP is send in ".$ver_details;
            }
        }
        else{
            $err_message=$mail_status;
        }
    }
    //mobile
    else if(!empty($_POST['mobile'])){
        $otp=rand(111111,999999);
        $ver_details = $_POST['mobile'];
        if(strlen($ver_details)==10){
            $sms_status = sendsmsOTP($_POST['mobile'],$otp);
            if ($sms_status == 1){
                $create_at = date("Y-m-d H:i:s");
                $in_otp_query = "INSERT INTO otp_expiry(otp,is_expired,create_at,verify_details) VALUES ('$otp','0','$create_at','$ver_details')";
                $in_otp_result = mysqli_query($con,$in_otp_query);
                $current_id = mysqli_insert_id($con);
                if(!empty($current_id)){
                    $success=1;
                    $success_message="OTP is send in ".$ver_details;
                }
                }
                else{
                    $err_message=$sms_status;
                }    
        }else{
            $err_message="Please Enter Valid Mobile Number";
        }
        
    }

    //Submit OTP
    if(isset($_POST['submit_otp'])){
        $enter_otp =  $_POST["otp"];
        $search_otp_query = "SELECT * FROM otp_expiry WHERE otp=$enter_otp AND is_expired=0 AND  NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)";
        $search_otp_result = mysqli_query($con,$search_otp_query);
        $count = mysqli_num_rows($search_otp_result);
        // echo $search_otp_query;
        if($count){
            foreach($search_otp_result as $search_otp_email){
                $verify_details = $search_otp_email['verify_details'];
            }
            $up_otp_query = "UPDATE otp_expiry SET is_expired = 1 WHERE otp='".$_POST["otp"]."'";
            $up_otp_result = mysqli_query($con,$up_otp_query);
            // $success = 2;
            $_SESSION['ver'] = $verify_details;
            if($verify_details){
                ?>
              
                <script>
                                    location.replace("verify.php");
                                </script>
           <?php }
            
        }else{
            $success = 1;
            $error_message = "Invalid OTP";
        }

    }
?>

<!-- Box Container -->
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                <!-- <span class="login100-form-title">
              Product Verification in few clicks
            </span> -->
                    <!-- <img src="public/images/img-01.png" alt="IMG" /> -->
                    <img src="public/images/img-02.png" alt="IMG" />
                </div>

                <form  autocomplete=off class="login100-form validate-form" action="" method="post">
                    <?php
                        if(!empty($success==1)){
                    ?>
                    <span class="login100-form-title"> Enter OTP </span>
                    <?php
                        if(!empty($error_message)){
                    ?>
                    <span  style="color:red"> <?php echo $error_message ?> </span>
                    <br>
                    <br>
                    <?php }
                        if(!empty($success_message)){
                    ?>
                    <span  style="color:green"> <?php echo $success_message ?> </span>
                    <br>
                    <br>
                    <?php   }
                    ?>

                        <div class="wrap-input100 validate-input" data-validate="OTP is required">
                            <input class="input100" type="number" name="otp" required placeholder="Enter OTP" />
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="submit_otp">Enter OTP</button>
                        </div>

                        <div class="text-center p-t-12">
                            <span class="txt1"> Change </span>
                            <a class="txt2" href=""><button onclick="window.history.back();">Email Id or Mobile Number</button> </a>
                        </div>


                    
                    <!-- <h1>Verify VSN Code</h1> -->
                    <?php       
                        }
                        else{
                            ?> 
                            <span class="login100-form-heading">
              Product Authentication
            </span>
                            <span class="login100-form-title">
              Enter Email Id or Mobile Number
            </span>
            <?php
                        if(!empty($err_message)){
                    ?>
                    <span  style="color:red"> <?php echo $err_message ?> </span> 
                    <br>
                    <br>
                    <?php }
                       ?>
                    <div class="wrap-input100 validate-input" data-validate="Valid mobile is required: 7748066840">
                        <input class="input100" type="tel" name="mobile" placeholder="Mobile Number" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                <i class="fa fa-phone" aria-hidden="true"></i>
              </span>
                    </div>
                    
                    <div class="text-center p-t-12">
                        <span class="txt1"> or </span>
                    </div>
                    <br>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email Id" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="send_otp">Send OTP</button>
                    </div>

                    <div class="modal-busy" id="loader" style="display: none">
    <div class="center-busy" id="test-git">
        <img alt="" src="public/images/loader.gif" />
    </div>
</div>
                    <?php
                        }
                    ?>
                    
                </form>
            </div>
        </div>
    </div>


<?php 
    include 'includes/footer.php'
?>