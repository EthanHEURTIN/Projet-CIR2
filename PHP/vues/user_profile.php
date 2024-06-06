<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>ProfilesYourDiving.fr</title>
        <!-- <link rel="stylesheet" type="text/css" href="style.css">
        <script src="script.js"></script> -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>


        <script src="../../JS/ajaxRequest.js" defer></script>
        <script src="../../JS/user_profile.js" defer></script>

        <script src="https://cdn.tailwindcss.com"></script>
      </head>
    <body>
    <?php require_once("../components/header.php");?>
      <div class="flex flex-col h-screen">
        <div class="flex justify-evenly basis-1/5" id="buttonsUserProfile">
            <button type="button" id="defaultSettings" class="bg-blue-700 text-white rounded-md my-auto px-5 py-3 text-sm font-medium hover:bg-blue-500 rounded-md px-3 py-2 text-sm font-medium">Default settings</button>
            <button type="button" id="divingProfiles" class="bg-blue-200 text-blue-700 rounded-md my-auto px-5 py-3 text-sm font-medium hover:bg-blue-100 rounded-md px-3 py-2 text-sm font-medium">My diving profiles</button>
        </div>
        <div id="defaultSettingsDiv" class="basis-3/5" style="display: none;">
          <div class="mx-auto max-w-7xl pb-12 sm:px-6 sm:py-30 lg:px-8">
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

        <div id="divingProfilesDiv" class="basis-3/5" style="display: block;">
            <div class="mx-auto max-w-7xl pb-12 sm:px-6 sm:py-30 lg:px-8">
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
        </div>
        <div class="w-full bottom-0">
              <?php require_once("../components/footer.php");?>
            </div>
      </div>
    </body>
</html>