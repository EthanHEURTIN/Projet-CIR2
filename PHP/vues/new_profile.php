<?php 
session_start();
?>
<html>
  <head>
    <title>ProfilesYourDiving.fr</title>
    <script src="../../JS/ajax.js" defer></script>
    <script src="../../JS/new_profile.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <style>
        .scrollable-div {
            max-width: 600px; /* Largeur maximale */
            max-height: 300px; /* Hauteur maximale */
            overflow: auto; /* Activer le scroll */
            border: 1px solid #ccc; /* Bordure pour visualiser la div */
            padding: 10px; /* Espacement interne */
        }
    </style>
  <?php require_once("../components/header.php");?>
  <body>
    <div>
      <div class="mx-auto max-w-7xl py-1 sm:px-6 lg:px-8">
        <div class="relative isolate overflow-hidden bg-indigo-800 px-6 pt-8 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
          <div id="box" class="divide-y-4 divide-gray-500 mx-auto text-center lg:mx-0 lg:flex-auto">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl py-5">Generate a new profile</h2>
            <form action="profile.php" method="POST">
            <div class="grid grid-cols-3 grid-rows-3 py-5 gap-4">
              <div class="flex flex-row">
                <p class="mt-6 mx-4 text-lg text-left leading-8 text-white grid-cols-1 grid-rows-1">Depth : 
                  <select name="depth" id="depth" onchange="getMN90ByDepth()" class="px-3 py-2 bg-white text-black border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                  </select>
                </p>
                <p class="mt-6 mx-4 text-lg text-left leading-8 text-white grid-cols-1 grid-rows-2">Duration : 
                  <select name="duration" id="duration" class="px-3 py-2 bg-white text-black border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                  </select>
                </p>
              </div>
              <!-- Table mn90 show depending on the depth selected -->
              <div class="scrollable-div grid-rows-1 col-span-2 row-span-3 grid-cols-subgrid col-start-2 items-center">
                <div class="px-2 pr-0 py-6">
                  <table class="m-auto border-double border-4 border-sky-500 text-center">
                      <thead>
                      <tr>
                          <th class="border border-slate-600 px-2 py-2">Depth</th>
                          <th class="border border-slate-600 px-2 py-2">Time</th>
                          <th class="border border-slate-600 px-2 py-2">15</th>
                          <th class="border border-slate-600 px-2 py-2">12</th>
                          <th class="border border-slate-600 px-2 py-2">9</th>
                          <th class="border border-slate-600 px-2 py-2">6</th>
                          <th class="border border-slate-600 px-2 py-2">3</th>
                          <th class="border border-slate-600 px-2 py-2">TDR</th>
                          <th class="border border-slate-600 px-2 py-2">GPS</th>
                      </tr>
                      </thead>
                      <tbody id="table_info">
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div id="form">
              <!-- After Depth select : js Add a form for submit the profil -->
            </div>
            </form>
          </div>
        </div>
      </div>
      <?php require_once("../components/footer.php");?>
    </div>
  </body>
</html>