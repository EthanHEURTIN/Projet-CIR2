<header>
    <nav class="bg-blue-200">
      <div class="mx-auto max-w-7xl py-2 px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          </div>
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
              <a href="../vues/index.php"><img class="h-20 w-auto" src="../../img/Logo_Plongee.png" alt="ourLogo"></a>
              <h3>ProfilPlong&#xE9;e</h3>
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <?php 
            if(isset($_SESSION['email'])){
              echo '<p class="text-gray-500 text-sm font-medium px-3 py-2 text-sm font-medium">Connected as '.$_SESSION['email'].'</p>';
              echo '<a href="../vues/disconnect.php" class="bg-blue-500 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium">Disconnect</a>';
              echo '<a href="../vues/user_profile.php" class="bg-blue-500 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium">Diving Profiles</a>';
            }
            else{
              echo '<a href="../vues/authentification.php" class="bg-blue-500 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium">Login</a>';
            }
            ?>
          </div>
        </div>
      </div>
    </nav>
  </header>