<?php

  session_start();
    if(isset($_SESSION['username'])){
      ?>
      <script>
        location.replace("admin/index.php");
    </script>
     <?php   
    }
    include 'dbcon/conn.php';
    $success = "";
    $success_message = "";
    if(isset($_POST['submit-btn'])){
      $name=$_POST['sender'];
      $email = $_POST['email'];
      $message = $_POST['message'];
      $contact_date = date("Y-m-d");

      $contact_query = "INSERT INTO contact(name,email,message,contact_date) VALUES('$name','$email','$message','$contact_date')";
      $in_contact = mysqli_query($con,$contact_query);
      $current_contact_id = mysqli_insert_id($con);
                if(!empty($current_contact_id)){
                  $success = 1;
                  $success_message = "Message is sent successfully";
                }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verify VSN</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" type="text/css" href="public/css/main.css" /> -->
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="public/css/contact.css" />
    <!--===============================================================================================-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body >
    <!-- Navdrawer -->
    <div id="fscr">
        <i onclick="closet()" class="ri-close-line" style="text-decoration: none"></i>
        <a onclick="closet()" href="index.php">Verify VSN</a>
        <a onclick="closet()" href="about.php">About us</a>
        <a onclick="closet()" href="contact.php">Contact Us</a>
    </div>

    <!-- Banner -->
    <section class="nav">
        <div>
            <a href="index.php" class="logo">
                <img src="public/images/logo.jpeg" alt="Logo">
            </a>
        </div>
        <div class="toggle">
            <a onclick="opent()" href="#">
                <i class="ri-menu-line"></i>
            </a>
        </div>
    </section>
<section id="contact">
  <div class="contact-box">
    <div class="contact-links">
      <h2>CONTACT</h2>
      <div class="links">
      <div class="link">
          <a href="https://api.whatsapp.com/send?phone=917024093220&text=Got%20reference%20from%20your%20Verify%20VSN%20Website.%20I%20have%20some%20query%20regarding%20Product%20Verification%20"><img src="data:image/png;base64,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" alt="Whatsapp"></a>
        </div>
      </div>
    </div>
    <div class="contact-form-wrapper">
    <?php
   

    if(!empty($success_message)){
                    ?>
                    <img src="public/images/check.png" style="max-width: 100%;  
height: auto;  " alt="Success">
                    <h4  style="color:green"> <?php echo $success_message ?> </h4>
                    <br>
                    <br>
                    <?php
                       }
                     

                    ?>
      <form autocomplete=off action="" method="post">
        <div class="form-item">
          <input type="text" name="sender" required>
          <label>Name:</label>
        </div>
        <div class="form-item">
          <input type="email" name="email" required>
          <label>Email:</label>
        </div>
        <div class="form-item">
          <textarea class="" name="message" required></textarea>
          <label>Message:</label>
        </div>
        <input type="submit" name="submit-btn" class="submit-btn" value="Send">
        <!-- <button class="submit-btn">Send</button>   -->
      </form>
   
    </div>
  </div>
</section>
 <!-- footer -->

 <section class="footer">
        <p class="text">Design & Developed By <a href="https://www.vuiron.com/" style="text-decoration: none; color: rgb(235, 163, 30);">Vuiron</a></p>
        <ul>
            <p class="text">Follow us on:</p>
            <li><a href="#"><i class="ri-facebook-fill"></i></a></li>
            <li><a href="#"><i class="ri-youtube-fill"></i></a></li>
            <li><a href="#"><i class="ri-instagram-fill"></i></a></li>
        </ul>
    </section>
    <script>
        function closet() {
            document.querySelector("#fscr").style.left = "-110%";
        }

        function opent() {
            document.querySelector("#fscr").style.left = "0%";
        }
    </script>
    </body>

    </html>
