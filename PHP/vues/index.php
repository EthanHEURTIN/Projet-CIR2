<?php 
session_start();
?>
<html>
  <head>
    <title>ProfilesYourDiving.fr</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <?php require_once("../components/header.php"); ?>
  <body class="bg-gray-100">
    <div class="flex flex-col space-y-24">
      <div>
        <div class="container mx-auto">
          <h1 class="text-4xl text-center mt-10">Welcome to ProfilesYourDiving.fr</h1>
          <h3 class="text-xl text-center mt-5 text-indigo-800">Generate millions of diving profiles for your next diving projects.</h3>
          <p class="text-center my-16 mb-8">Click on the button under to create your first diving profile, thanks to our application you can find from your default settings in your user profile, capacity and pressure of your oxygen tank, if you can realize your diving by entering the depth and duration of it.</p>
          <p class="text-center my-8">Enter the depth and the duration of your diving project and the table aside will fill up with the MN90 table informations related to your input parameters, if the line is <span class="text-green-500">GREEN</span> it means you can do it with your equipment, otherwise, if the line is <span class="text-red-500">RED</span> it means you can't do it, then you should find an equipment with a better capacity or pressure and modifiy your default settings in your user profile.</p>
        </div>
        <div class="text-right pr-96">
          <a href="<?php if(isset($_SESSION["email"])){echo"new_profile.php";}else{echo"login.php";}?>">
            <button type="button" class="rounded-md bg-indigo-800 my-3 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Generate new profile</button>
          </a>
        </div>
      </div>
      <div class="relative mb-0 bottom-0 inset-x-0 mt-4 basis-1/5">
          <?php require_once("../components/footer.php");?>
      <div>
    </div>
  </body>
</html>