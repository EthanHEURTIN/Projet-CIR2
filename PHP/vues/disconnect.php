<?php 
session_start();
session_destroy();
unset($refresh);
 ?>
<html>
  <head>
    <title>ProfilesYourDiving.fr</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <?php 
  require("../components/header.php");
  if(isset($refresh)){
    echo("<meta http-equiv='refresh' content='1'>");
    $refresh = 0;
  }
  ?>
  <body>
    <div class="bg-gray-50">
      <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">You are disconnected</h3>
            <p class="mt-1 max-w">You are now disconnected, to access your profiles or our functionality again, you can reconnect or recreate an account.</p>
            <a href="authentification.php" class="bg-blue-500 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium">Login</a>
            <a href="sign_up.php" class="bg-blue-500 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium">Register</a>
            </div></div></div></div>
  </body>
  <?php 
  require("../components/footer.php");

  ?>
  
</html>