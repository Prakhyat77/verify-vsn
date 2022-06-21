<?php
    session_start();
    include 'includes/header.php';  
    if(isset($_SESSION['username'])){
        ?>
      <script>
        location.replace("admin/index.php");
    </script>
     <?php 
    }
?>
 <script src="https://cdn.tailwindcss.com"></script>
    <section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="public/images/about.jpg">
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Welcome to Vibrant Sports Nutrition</h1>
      <p class="mb-8 leading-relaxed">
      Welcome to Vibrant Sports Nutrition Pvt Ltd, your number one source for all kind of nutritional supplements. We're dedicated to giving you the result oriented products with cutting edge revolutionary scientifically researched and genuine products.
Over a dacade, VSN has come a long way from its beginnings in Pune When VSN first started out, we are providing the best quality of nutritional supplements through our trusted dealer network in pan India to ensure a healthy mankind. 
We now serve customers all over India and abroad. 

We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.

  </p>
    </div>
  </div>
</section>
<?php 
    include 'includes/footer.php'
?>