<?php 
session_start();
session_destroy();
unset($_SESSION['email']);
 ?>
<html>
  <head>
    <title>ProfilesYourDiving.fr</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <?php 
  require("components/header.php");
  ?>
  <body class="bg-gray-100">
    <div class="flex flex-col space-y-32">
      <div class="mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white mt-32 overflow-hidden shadow-xl sm:rounded-lg">
          <div class="text-center px-4 py-5 sm:px-6">
            <h3 class="text-lg py-6 font-medium leading-6 text-gray-900">You are disconnected</h3>
            <div class="bg-gray-200 h-1 w-2/3 mx-auto"></div>
            <p class="my-12 mx-8">You are now disconnected, to access your profiles or our functionality again, you can reconnect or recreate an account.</p>
            <div class="my-8">
              <a href="login.php" class="bg-indigo-800 text-white rounded-md mr-8 px-3 py-2 text-sm font-medium hover:bg-indigo-500 rounded-md px-3 py-2 text-sm font-medium">Login</a>
              <a href="sign_up.php" class="bg-indigo-800 text-white rounded-md ml-8 px-3 py-2 text-sm font-medium hover:bg-indigo-500 rounded-md px-3 py-2 text-sm font-medium">Register</a>
            </div>
          </div>
        </div>
      </div>
      <div class="relative mb-0 bottom-0 inset-x-0 mt-4">
        <?php require("components/footer.php")?>
      </div>
    </div>
  </body>
</html>