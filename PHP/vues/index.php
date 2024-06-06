<?php 
session_start();
?>
<html>
  <head>
    <title>ProfilesYourDiving.fr</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <?php require_once("../components/header.php"); ?>
  <body>
  <div class="container mx-auto">
    <h1 class="text-4xl text-center mt-10">Welcome to ProfilesYourDiving.fr</h1>
    <h3 class="text-xl text-center mt-5 text-indigo-800">Generate millions of diving profiles for your next diving projects.</h3>
    <p class="text-center my-16">Click on the button under to create your first diving profile, thanks to our application you can find from your default paramaters in your profile, capacity and pressure of your oxygen tank, if you can realize your diving by entering the depth and duration of it.</p>
  </div>
  <div class="text-right pr-96">
    <a href="<?php 
    if(isset($_SESSION["email"])){
      echo"new_profile.php";
    }
    else{
      echo"authentification.php";
    }
    ?>
    ">
    <button type="button" class="rounded-md bg-indigo-600 my-3 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Generate new profile</button>
    </a>
  </div>
  </body>
  <?php require_once("../components/footer.php"); ?>
</html>