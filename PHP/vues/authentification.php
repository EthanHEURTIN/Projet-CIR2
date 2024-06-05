<?php
if(isset($_POST['email']) && isset($_POST['password'])){
  if(!empty($_POST['email']) && !empty($_POST['password'])){
    require_once('../database.php');
    $data = null;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $db = dbConnect();
    if (!$db)
    {
      header('HTTP/1.1 503 Service Unavailable');
      exit;
    }
    if(canConnect($db, $email, $password)){
      session_start();
      $_SESSION['email'] = $email;
      echo '<script>window.location.href = "confirmed_authentification.php";</script>';
    }
    else{
      echo '<script>alert("Email ou mot de passe incorrect");</script>';
    }
  }
  else{
    echo '<script>alert("Veuillez remplir tous les champs");</script>';
  }
}
?>
<!DOCTYPE html>
  <head>
    <title>ProfilesPlongée.fr</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="sign_up.js" defer></script>
    <script src="ajax.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <?php require("../components/header.php")?>
  <body>
  <div class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Connexion</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">Connectez-vous pour acc&#xE9;der aux profils de plong&#xE9;e.</p>
        </div>
        <form method="post">
        <div class="border-t border-gray-200">
          <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Email</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                <input type="text" id="email" name="email" placeholder="Email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
              </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Mot de passe</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                <input type="password" id="password" name="password" placeholder="Mot de passe" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
              </dd>
            </div>
          </dl>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="bg-blue-500 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium">Connexion</button>
            </form>
            <a href="/PHP/vues/sign_up.php" class="bg-blue-500 text-white my-5 rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium">Inscription</a>
          </div>
        </div>
    </div>
    
  </body>
  <footer>
    <div class="bg-gray-50 mt-6 border-t border-gray-100 px-4 py-2">
      <dl class="divide-y-4 divide-gray-200">
        <div class="text-center px-4 py-3">
          <dt class="text-gray-900 text-lg">Profil Plong&#xE9;e -<span class="text-gray-700 text-lg"> Sans Copyright</span></dt>
        </div>
        <div>
          <div class="text-center px-4 py-2">
            <dt class="text-gray-900">Valentin DRONNE -<span class="text-gray-700"> valentin@profilplongee.com</span></dt>
          </div>
          <div class="text-center px-4 py-2">
            <dt class="text-gray-900">Robin DELAUNAY -<span class="text-gray-700"> robin@profilplongee.com</span></dt>
          </div>
          <div class="text-center px-4 py-2">
            <dt class="text-gray-900">Ethan HEURTIN -<span class="text-gray-700"> ethan@profilplongee.com</span></dt>
          </div>
        </div>
      </dl>
    </div>
  </footer>
</html>