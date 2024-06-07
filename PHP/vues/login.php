<?php
session_start();
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
      $_SESSION['email'] = $email;
      $_SESSION['id'] = getUserId($db, $email);
      echo '<script>window.location.href = "login_confirmation.php";</script>';
    }
    else{
      $error_connexion = 1;
    }
  }
  else{
    $error_connexion = 0;
  }
}
?>
<!DOCTYPE html>
  <head>
    <title>ProfilesYourDiving.fr</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="sign_up.js" defer></script>
    <script src="ajax.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <?php require("../components/header.php")?>
  <body class="bg-gray-100">
    <div class="flex flex-col space-y-32">
      <div class="pt-24 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white px-12 overflow-hidden shadow-xl sm:rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Login</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Connect to acceed to your diving profiles.</p>
            <?php
            if($error_connexion == 1){
              echo '<p class="mt-1 max-w-2xl text-sm text-red-500">Login error, verify your email and your password.</p>';
            }
            else if($error_connexion == 0){
              echo '<p class="mt-1 max-w-2xl text-sm text-red-500">Please fill in your email and your password.</p>';
            }
            ?>
          </div>
          <form method="post">
          <div class="border-t border-gray-200">
            <dl>
              <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Email address</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                  <input type="text" id="email" name="email" placeholder="Email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </dd>
              </div>
              <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Password</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                  <input type="password" id="password" name="password" placeholder="Password" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </dd>
              </div>
            </dl>
            <div class="px-4 py-6 text-center sm:px-6">
              <button type="submit" class="bg-indigo-800 text-white rounded-md mr-4 px-3 py-2 text-sm font-medium hover:bg-indigo-500 rounded-md px-3 py-2 text-sm font-medium">Login</button>
              </form>
              <a href="sign_up.php" class="bg-indigo-800 text-white my-5 ml-4 rounded-md px-3 py-2 text-sm font-medium hover:bg-indigo-500 rounded-md px-3 py-2 text-sm font-medium">Sign up</a>
            </div>
          </div>
        </div>
      </div>
      <div class="relative mb-0 bottom-0 inset-x-0 basis-1/5">
        <?php require("../components/footer.php")?>
      </div>
    </div>
  </body>
</html>