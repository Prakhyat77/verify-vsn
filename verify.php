<?php
    session_start();
    include 'includes/header.php';  
    include 'send_auth.php';
    if(isset($_SESSION['username'])){
        header("Location: admin/index.php" );
    }
    if(!isset($_SESSION['ver'])){
        ?>
        <script>
        location.replace("index.php");
    </script>
    <?php
    }
    $suc=0;
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
    if(isset($_POST['verify_btn']))
    {
        
        if(isset($_SESSION['ver']))
        {
            $verify=$_SESSION['ver'];
        // }
        $vsn=$_POST['vsn'];
        $verify_query = "SELECT * FROM verify WHERE vsn='$vsn'";
        $verify_data= mysqli_query($con,$verify_query);
        $verify_fetch_data = mysqli_fetch_array($verify_data);
        $mfg_date_query = "SELECT EXTRACT( YEAR_MONTH FROM mfg ) FROM verify WHERE vsn = '$vsn'";
        $mfg_date= mysqli_query($con,$mfg_date_query);
        $mfg_date_fetch_data = mysqli_fetch_array($mfg_date);
        $mfg_date_array = str_split($mfg_date_fetch_data[0]);
        $mfg_final = $mfg_date_array[0]."".$mfg_date_array[1]."".$mfg_date_array[2]."".$mfg_date_array[3]."-".$mfg_date_array[4]."".$mfg_date_array[5];
        if($verify_fetch_data>0){
            $_SESSION['vsn'] = $verify_fetch_data[1];
            if($verify_fetch_data[8]){
                //Second time authenticated same
                if($verify_fetch_data[8]==$verify){
                    $regex = preg_match('[@]',$_SESSION['ver']);
                    if($regex){
                        
                        $email_auth_status = sendauthemail($_SESSION['ver'],$verify_fetch_data[5],$verify_fetch_data[6],$verify_fetch_data[3],$mfg_final,$verify_fetch_data[1],$verify_fetch_data[7]);
                   
                        if($email_auth_status==1){
                            $suc=1;
                        }
                    }else{
                
                        $sms_auth_status = sendauthsms($_SESSION['ver'],$verify_fetch_data[5],$verify_fetch_data[6],$verify_fetch_data[3]);
                    
                        if($sms_auth_status==1){
                            $suc=1;     
                        }
                    }
                    unset($_SESSION['ver']);
                    ?>
                    <?php
                        if(!empty($suc==1)){
                    ?>
                        <div class="limiter">
                    <div class="container-login100">
                        <div class="wrap-login100">
                            <div class="login200-pic js-tilt" data-tilt>
                                <img src="public/images/check.png" alt="IMG" />
                            </div>
            
                            <form class="login100-form validate-form">
                            <span class="login100-form-title"> Product Is Authentic </span>
                                <div class="login400-pic js-tilt" data-tilt>
                                    <img src="public/images/authentic.png" alt="IMG" />
                                    <br>
                                    <br>
                                    <br>
                                </div>
                                <span class="login100-form-title">Product Name:  
                                    <?php
                                        echo $verify_fetch_data[6]
                                    ?> 
                                </span>
                                <span class="login100-form-title">Company Name: 
                                    <?php
                                        echo $verify_fetch_data[5]
                                    ?> 
                                </span>
                                <span class="login100-form-title">Verify Date: 
                                    <?php
                                        echo $verify_fetch_data[7]
                                    ?> 
                                </span>
                                <span class="login100-form-title">Batch No.: 
                                    <?php
                                        echo $verify_fetch_data[3]
                                    ?> 
                                </span>
                                <span class="login100-form-title">MFG Date: 
                                    <?php
                                        echo $mfg_final;
                                    ?> 
                                </span>
                                <div class="text-center p-t-136">
                        <a class="txt2" href="auth_receipt.php">
                Download PDF
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
              </a>
                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                        <?php
                    }
                    ?>        
    <?php
              }
              //Already Verified Product By Other Person
                else{
                    $suc=2;
                    unset($_SESSION['ver']);
                    ?>
                    <?php
                        if(!empty($suc==2)){
                            ?>
                    <div class="limiter">
                    <div class="container-login100">
                        <div class="wrap-login100">
                            <div class="login200-pic js-tilt" data-tilt>
                                <img src="public/images/close.png" alt="IMG" />
                            </div>
            
                            <form class="login100-form validate-form">
                            <span class="login100-form-title"> OOPs Product Is Already Verified </span>
                            <div class="login300-pic js-tilt" data-tilt>
                                <img src="public/images/alr.png" alt="IMG" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                            <?php  }
                            ?>
                        
                    
    <?php

                }
            }
            //First time Authenticated
            else{
                $verify_date = date("Y-m-d");
                $up_verify_query ="UPDATE verify SET date='$verify_date',verify_details='$verify' WHERE id =$verify_fetch_data[0] ";
                $up_verify_result = mysqli_query($con,$up_verify_query);
                // echo $up_verify_query;
                $regex = preg_match('[@]',$_SESSION['ver']);
                    if($regex){
                     
                        $email_auth_status = sendauthemail($_SESSION['ver'],$verify_fetch_data[5],$verify_fetch_data[6],$verify_fetch_data[3],$mfg_final,$verify_fetch_data[1],$verify_date);
                   
                        if($email_auth_status==1){
                            $suc=3;
                        }
                    }else{
                
                        $sms_auth_status = sendauthsms($_SESSION['ver'],$verify_fetch_data[5],$verify_fetch_data[6],$verify_fetch_data[3]);
                    
                        if($sms_auth_status==1){
                            $suc=3;     
                        }
                    }
                    unset($_SESSION['ver']);
                ?>
                <?php 
                        if(!empty($suc==3)){
                            ?>
                            <div class="limiter">
                    <div class="container-login100">
                        <div class="wrap-login100">
                            <div class="login200-pic js-tilt" data-tilt>
                                <img src="public/images/check.png" alt="IMG" />
                            </div>
            
                            <form class="login100-form validate-form">
                            <span class="login100-form-heading"> Product Is Authentic </span>
                            <div class="login400-pic js-tilt" data-tilt>
                                    <img src="public/images/authentic.png" alt="IMG" />
                                    <br>
                                    <br>
                                    <br>
                                </div>
                                <span class="login100-form-title">Product Name:  
                                    <?php
                                        echo $verify_fetch_data[6]
                                    ?> 
                                </span>
                                <span class="login100-form-title">Company Name: 
                                    <?php
                                        echo $verify_fetch_data[5]
                                    ?> 
                                </span>
                                <span class="login100-form-title">Verify Date: 
                                    <?php
                                        echo $verify_date
                                    ?> 
                                </span>
                                <span class="login100-form-title">Batch No.: 
                                    <?php
                                        echo $verify_fetch_data[3]
                                    ?> 
                                </span>
                                <span class="login100-form-title">MFG Date: 
                                    <?php
                                        echo $mfg_final;
                                    ?> 
                                </span>
                                <div class="text-center p-t-136">
                        <a class="txt2" href="auth_receipt.php">
                Download PDF
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
              </a>
                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                            <?php  }
                            ?>
                    
    <?php

            }
        }
        else{
            $_SESSION['verify_err'] = "Wrong VSN Code";
        }
        }
        // else{
        //     $_SESSION['verify_err'] = "Wrong VSN Code";
        // }

    }
    ?>
    
<?php
if($suc==0){
?>

  <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="public/images/img-02.png" alt="IMG" />
                </div>

                <form autocomplete=off
                 class="login100-form validate-form" action="" method="post">
                    <span class="login100-form-title"> Enter VSN Code </span>
                    <?php
    
    if(isset($_SESSION['verify_err']))
    {
        echo "<span style='color:red'>".$_SESSION['verify_err']."</span>";
        unset($_SESSION['verify_err']);
    }
    ?>
    <br>
    <br>
                    <div class="wrap-input100 validate-input" data-validate="Valid VSN Code is required: 3C74112">
                        <input class="input100" type="text" name="vsn" placeholder="VSN Code" required/>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                <i class="fa fa-qrcode" aria-hidden="true"></i>
              </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="verify_btn">Verify VSN Code</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php
}
?>
  
    <?php 
    include 'includes/footer.php'
?>