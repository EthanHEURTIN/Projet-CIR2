<html>
  <head>
    <title>ProfilesPlongée.fr</title>
    <script src="../../JS/ajax.js" defer></script>
    <script src="../../JS/new_profile.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <?php require_once("../components/header.php");?>
  <body>
    <div>
        <div class="mx-auto max-w-7xl py-24 sm:px-6 lg:px-8">
          <div class="relative isolate overflow-hidden bg-blue-100 px-6 pt-8 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
            <div class="divide-y-4 divide-gray-500 mx-auto text-center lg:mx-0 lg:flex-auto">
              <h2 class="text-3xl font-bold tracking-tight text-gray-700 sm:text-4xl py-8">Generate a new profile</h2>
              <div class="grid grid-cols-3 grid-rows-3 gap-4">
                <p class="mt-6 text-lg text-left leading-8 text-gray-600 grid-cols-1 grid-rows-1">Depth : 
                  <select id="depth" onchange="getMN90ByDepth()" class="px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                    <!-- Add depth depending on the depth disponible in db -->
                  </select>
                </p>

                <!-- Table mn90 show depending on the depth selected -->
                <div class="grid-cols-2 grid-rows-1 col-span-2 row-span-3  grid-cols-subgrid col-start-2 items-center">
                  <div class="px-2 py-2">
                    <table class="m-auto border-double border-4 border-sky-500 text-center">
                        <thead>
                        <tr>
                            <th class="border border-slate-600 px-3 py-2">Depth</th>
                            <th class="border border-slate-600 px-3 py-2">Time</th>
                            <th class="border border-slate-600 px-3 py-2">15</th>
                            <th class="border border-slate-600 px-3 py-2">12</th>
                            <th class="border border-slate-600 px-3 py-2">9</th>
                            <th class="border border-slate-600 px-3 py-2">6</th>
                            <th class="border border-slate-600 px-3 py-2">3</th>
                            <th class="border border-slate-600 px-3 py-2">TDR</th>
                            <th class="border border-slate-600 px-3 py-2">GPS</th>
                        </tr>
                        </thead>
                        <tbody id="table_info">
                        </tbody>
                    </table>
                  </div>
                </div>

                <p class="text-lg text-left leading-8 text-gray-600 grid-cols-1">Duration : 
                  <select id="duration" class="px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                    <!-- Add Time depending on the depth selected -->
                  </select>
                </p>

              </div>
              <div class="flex items-center justify-center pb-4 py-4">
                <a href="profile.php">
                <button type="button" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
  <?php require_once("../components/footer.php");?>
</html>