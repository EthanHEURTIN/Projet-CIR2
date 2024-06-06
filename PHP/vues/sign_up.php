<?php
  session_start();
  if (isset($_POST['email']) && isset($_POST['password'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
      require_once('../database.php');
      $data = null;
      $email = $_POST['email'];
      $password = $_POST['password'];
      $db = dbConnect();
      if (!$db) {
        header('HTTP/1.1 503 Service Unavailable');
        exit;
      }
      $checkEmail = getUserEmail($db, $email);
      if ($checkEmail) {
        $error_connexion = 1;
      } else {
        if (insertUser($db, $email, $password, 15, 200)) {
          $_SESSION['email'] = $email;
          header('Location: confirmed_sign_up.php');
        } else {
          echo '<script>alert("Erreur lors de l\'inscription");</script>';
        }
      }
    } else {
      $error_connexion = 0;
    }
  }
?>
<html>
  <head>
    <title>ProfilesYourDiving.fr</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="sign_up.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <?php require("../components/header.php")?>
  <body>
  <div class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Registration</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Register you to acceed to the features of the site !</p>
            <?php
            if($error_connexion == 1){
              echo '<p class="mt-1 max-w-2xl text-sm text-red-500">Registration error, this email is already used</p>';
            }
            else if($error_connexion == 0){
              echo '<p class="mt-1 max-w-2xl text-sm text-red-500">Please fill in your email and your password.</p>';
            }
          ?>
        </div>
        <form id="sign_up" method="POST">
            <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Email address</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                    <input type="text" id="email" name="email" placeholder="Email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Password</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                    <input type="password" id="password" name="password" placeholder="Mot de passe" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </dd>
                </div>
            </dl>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="bg-blue-500 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium" onclick="confirmInscription()">Confirmer l'inscription</button>
            </div>
            </div>
        </form>
    </div>
    
  </body>
  <?php require("../components/footer.php")?>
</html>