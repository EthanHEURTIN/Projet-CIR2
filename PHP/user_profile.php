<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Profil utilisateur</title>
        <!-- <link rel="stylesheet" type="text/css" href="style.css">
        <script src="script.js"></script> -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>


        <script src="../JS/ajaxRequest.js" defer></script>
        <script src="../JS/user_profile.js" defer></script>

        <script src="https://cdn.tailwindcss.com"></script>
      </head>
      <header>
        <nav class="bg-blue-200">
          <div class="mx-auto max-w-7xl py-2 px-1 sm:px-6 lg:px-10">
            <div class="relative flex h-16 items-center justify-between">
              <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
              </div>
              <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                  <a href="../index.html"><img class="h-20 w-auto" src="../img/Logo_Plongee.png" alt="Your Company"></a>
                  <h3>ProfilPlong&#xE9;e</h3>
                </div>
              </div>
              <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <a href="user_profile.html" class="bg-blue-500 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-blue-700 rounded-md px-3 py-2 text-sm font-medium">Diving Profiles</a>
              </div>
            </div>
          </div>
        </nav>
      </header>

    <body>
        <br><br><br>
        <div class="flex justify-evenly" id="buttonsUserProfile">
            <button type="button" id="defaultSettings" class="bg-blue-700 text-white rounded-md px-5 py-3 text-sm font-medium hover:bg-blue-500 rounded-md px-3 py-2 text-sm font-medium">Default settings</button>
            <button type="button" id="divingProfiles" class="bg-blue-200 text-blue-700 rounded-md px-5 py-3 text-sm font-medium hover:bg-blue-100 rounded-md px-3 py-2 text-sm font-medium">My diving profiles</button>
        </div>
        <div id="defaultSettingsDiv" style="display: none;">
          <div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-30 lg:px-8">
            <div class="relative isolate overflow-hidden bg-blue-100 px-6 pt-8 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
              <div class="divide-y-4 divide-gray-500 mx-auto text-center lg:mx-0 lg:flex-auto lg:py-4">
                <div>
                  <form>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Capacity Oxygen Tank (L) : <input type="number" id="capacityTankInput" class="px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required/></p>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Pressure Oxygen tank (bars) : <input type="number" id="pressureTankInput" class="px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required/></p>
                    <div class="mt-10 flex items-center justify-center gap-x-6 pb-4">
                      <button type="click" id="buttonSubmitUserSettings" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Save my preferences</a>
                    </div>
                    <div id="msgConfirm" class="text-green-600 mt-6" style="display: none;">Preferences saved !</div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="divingProfilesDiv" style="display: block;">
            <div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-30 lg:px-8">
                <div style="overflow-x: hidden;overflow-y: auto;height: 300px;" class="divide-y-4 divide-gray-400 isolate bg-blue-100 shadow-2xl sm:rounded-3xl lg:px-24">
                    <div class="mx-auto text-center py-4">
                        <span class="mt-6 px-5 text-lg leading-8 text-gray-600">Duration : 2h</span>
                        <span class="mt-6 px-5 text-lg leading-8 text-gray-600">Depth : 5m</span>
                        <button type="button" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Select Profile</button>
                    </div>
                    <div class="mx-auto text-center py-4">
                        <span class="mt-6 px-5 text-lg leading-8 text-gray-600">Duration : 2h</span>
                        <span class="mt-6 px-5 text-lg leading-8 text-gray-600">Depth : 5m</span>
                        <button type="button" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Select Profile</button>
                    </div>
                    <div class="mx-auto text-center py-4">
                        <span class="mt-6 px-5 text-lg leading-8 text-gray-600">Duration : 2h</span>
                        <span class="mt-6 px-5 text-lg leading-8 text-gray-600">Depth : 5m</span>
                        <button type="button" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Select Profile</button>
                    </div>
                    <div class="mx-auto text-center py-4">
                        <span class="mt-6 px-5 text-lg leading-8 text-gray-600">Duration : 2h</span>
                        <span class="mt-6 px-5 text-lg leading-8 text-gray-600">Depth : 5m</span>
                        <button type="button" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Select Profile</button>
                    </div>
                    <div class="mx-auto text-center py-4">
                        <span class="mt-6 px-5 text-lg leading-8 text-gray-600">Duration : 2h</span>
                        <span class="mt-6 px-5 text-lg leading-8 text-gray-600">Depth : 5m</span>
                        <button type="button" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Select Profile</button>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="new_profile.html">
                <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Generate new profile</button>
                </a>
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