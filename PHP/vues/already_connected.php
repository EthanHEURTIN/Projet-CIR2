<?php session_start();?>
<html>
  <head>
    <title>ProfilesPlongée.fr</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <?php require("../components/header.php")?>
  <body>
    <div class="bg-gray-50">
      <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Vous êtes déjà connectés</h3>
            <p class="mt-1 max-w">Vous êtes connectés. Vous pouvez maintenant naviguer sur le site, créer de nouveaux profiles et consulter votre profile d'utilisateur.</p>
            <a href="new_profile.php" class="bg-blue-500 text-white my-5 rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium">Go to App</a>
            <a href="user_profile.php" class="bg-blue-500 text-white my-5 rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium">Go to Profile</a>
            </div></div></div></div>
  </body>
  <?php require("../components/footer.php")?>
</html>