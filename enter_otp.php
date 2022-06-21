<?php
    include 'includes/header.php'
?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="public/images/img-01.png" alt="IMG" />
                </div>

                <form class="login100-form validate-form">
                    <span class="login100-form-title"> Enter OTP </span>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="number" name="otp" placeholder="Enter OTP" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                <i class="fa fa-key" aria-hidden="true"></i>
              </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">Enter OTP</button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1"> Change </span>
                        <a class="txt2" href="#"> Email Id or Mobile Number </a>
                    </div>

                    <!-- <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                Create your Account
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
              </a>
                    </div> -->
                </form>
            </div>
        </div>
    </div>


<?php 
    include 'includes/footer.php'
?>