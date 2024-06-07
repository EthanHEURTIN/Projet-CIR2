<?php 
session_start();
?>
<html>
  <head>
    <title>ProfilesYourDiving.fr</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <?php require("../components/header.php")?>
  <body class="bg-gray-100">
    <div class="flex flex-col space-y-32">
      <div class="mx-auto mt-32 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="text-center px-4 py-5 sm:px-6">
            <h3 class="text-lg py-6 font-medium leading-6 text-gray-900">Registration confirmed</h3>
            <div class="bg-gray-200 h-1 w-2/3 mx-auto"></div>
            <p class="my-8 mx-6">Your registration has been saved. You can now navigate through the website, create new profiles and view your user profile.</p>
            <div class="my-8">
              <a href="new_profile.php" class="bg-indigo-800 text-white my-12 rounded-md px-3 py-2 text-sm font-medium hover:bg-indigo-500 rounded-md px-3 py-2 text-sm font-medium">Go to App</a>
            </div>
          </div>
        </div>
      </div>
      <div class="relative mb-0 bottom-0 inset-x-0 mt-4">
        <?php require("../components/footer.php")?>
      </div>
    </div>
  </body>
</html>