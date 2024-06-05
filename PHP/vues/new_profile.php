<?php session_start();?>
<html>
  <head>
    <title>ProfilesPlongée.fr</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <? require_once("../components/header.php");?>
  <body>
    <div>
        <div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-32 lg:px-8">
          <div class="relative isolate overflow-hidden bg-blue-100 px-6 pt-8 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
            <div class="divide-y-4 divide-gray-500 mx-auto text-center lg:mx-0 lg:flex-auto lg:py-4">
              <h2 class="text-3xl font-bold tracking-tight text-gray-700 sm:text-4xl py-8">Generate a new profile</h2>
              <div>
                <p class="mt-6 text-lg text-left leading-8 text-gray-600">Depth : 
                  <select name="cars" id="cars" class="px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                    <option value="3">3m</option>
                    <option value="4">4m</option>
                    <option value="5">5m</option>
                    <option value="6">6m</option>
                  </select>
                </p>
                <p class="mt-6 text-lg text-left leading-8 text-gray-600">Duration : 
                  <select name="cars" id="cars" class="px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">

                  </select>
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6 pb-4">
                  <a href="profile.html">
                  <button type="button" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
  <? require_once("../components/footer.php");?>
</html>