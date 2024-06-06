<?php 
session_start();
?>
<html>
  <head>
    <title>ProfilesYourDiving.fr</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="../../JS/ajax.js" defer></script>
    <script src="../../JS/new_profile.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <style>
        .scrollable-div {
            max-width: 500px; /* Largeur maximale */
            max-height: 300px; /* Hauteur maximale */
            overflow: auto; /* Activer le scroll */
            padding: 10px; /* Espacement interne */
        }
    </style>
  <body class="bg-gray-100">
    <?php require_once("../components/header.php");?>
    <div class="flex flex-col">
      <div class="relative bg-indigo-800 h-dvh w-1/2 mx-auto my-12 shadow-2xl sm:rounded-3xl md:pt-24 lg:flex lg:pt-0 basis-4/5">
        <div id="box" class="divide-y-3 divide-white mx-auto pb-12 text-center lg:mx-0 lg:flex-auto">
          <h3 class="text-4xl font-bold tracking-tight text-white py-5">Generate a new profile</h2>
          <div class="bg-white h-1 w-2/3 mx-auto"></div>
          <form action="profile.php" method="POST">
            <div class="mx-auto">
              <div class="flex flex-row justify-center">
                <p class="my-8 mx-8 text-lg text-left leading-8 text-white">Depth : 
                  <select name="depth" id="depth" onchange="getMN90ByDepth()" class="px-3 py-2 bg-white text-black border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                  </select>
                </p>
                <p class="my-8 mx-8 text-lg text-left leading-8 text-white">Duration : 
                  <select name="duration" id="duration" class="px-3 py-2 bg-white text-black border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                  </select>
                </p>
                <div id="form" class="my-auto mx-8">
                <!-- After Depth select : js Add a form for submit the profil -->
                </div>
              </div>
              <!-- Table mn90 show depending on the depth selected -->
              <div class="scrollable-div mx-auto">
                <div class="">
                  <table class="m-auto border bg-white border-radius-4 border-2 border-slate-600 text-center">
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
          </form>
        </div>
      </div>
      <div class="relative mb-0 bottom-0 inset-x-0 mt-4 basis-1/5">
          <?php require_once("../components/footer.php");?>
      <div>
    </div>
  </body>
</html>