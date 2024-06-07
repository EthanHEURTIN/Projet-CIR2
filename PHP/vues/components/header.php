<header>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <nav class="bg-indigo-800">
      <div class="mx-auto max-w-7xl py-2 px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-32 items-center justify-between">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          </div>
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
              <a href="../vues/index.php"><img class="h-20 w-auto" src="../../img/Logo_Plongee.png" alt="ourLogo"></a>
              <h3 class="text-2xl text-white" style="font-family: 'Rubik Mono One', monospace; font-weight: 400; font-style: normal;">ProfilesYourDiving.fr</h3>
              <?php if(isset($_SESSION['email'])){
                echo '<p class="text-white text-sm font-medium pl-8 py-2 text-sm font-medium">Connected as '.$_SESSION['email'].'</p>';
              }?>
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <?php 
            if(isset($_SESSION['email'])){
              echo '<a href="../new_profile.php" class="bg-white text-indigo-800 mx-12 rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-200 hover:text-white rounded-md px-3 py-2 text-sm font-medium">New Profile</a>';
              echo '<a href="../disconnect.php" class="bg-white text-indigo-800 mx-2 rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-200 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Disconnect</a>';
              echo '<a href="../user_profile.php" class="bg-white text-indigo-800 mx-2 rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-200 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Diving Profiles</a>';
            }
            else{
              echo '<a href="../login.php" class="bg-white text-indigo-800 mx-12 rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-200 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Login</a>';
            }
            ?>
          </div>
        </div>
      </div>
    </nav>
  </header>