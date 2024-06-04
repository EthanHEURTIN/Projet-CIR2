<html>
  <head>
    <title>My First Web Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="sign_up.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <header>
    <nav class="bg-blue-200">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          </div>
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
              <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <a href="#" class="bg-blue-500 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium">Diving Profiles</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <body>
  <div class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Inscription</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Inscrivez-vous pour acc&#xE9;der aux profils de plong&#xE9;e et à votre historique !</p>
        </div>
        <form id="sign_up" action="confirmed_sign_up.php" method="POST">
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
                <button type="submit" class="bg-blue-500 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium" onclick="confirmInscription()">Confirmer l'inscription</button>
            </div>
            </div>
        </form>
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