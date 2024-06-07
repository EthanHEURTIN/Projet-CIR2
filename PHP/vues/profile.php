<?php 
session_start();
?>
<html>
  <head>
    <title>ProfilesYourDiving.fr</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <script src="../../JS/ajax.js" defer></script>
    <script src="../../JS/profiles.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <?php require_once("../components/header.php");?>
  <body class="bg-gray-100">
    <div id="depth" value="<?php echo $_POST['depth']?>"></div>
      <div id="duration" value="<?php echo $_POST['duration']?>"></div>
        <div class="px-2 py-16">
          <table class="m-auto text-center">
            <thead>
              <tr class="bg-blue-400">
                <th class="border border-slate-600 px-3 py-2">tX</th>
                <th class="border border-slate-600 px-3 py-2">Depth (m)</th>
                <th class="border border-slate-600 px-3 py-2">Time</th>
                <th class="border border-slate-600 px-3 py-2">Pressure (bar)</th>
                <th class="border border-slate-600 px-3 py-2">Consumption (L)</th>
                <th class="border border-slate-600 px-3 py-2">Bar left (bar)</th>
                <th class="border border-slate-600 px-3 py-2">Air volume (L)</th>
              </tr>
            </thead>
            <tbody id="table">
            </tbody>
          </table>
        </div>
        <div class="flex justify-center">
          <div id="consumption" class="bg-blue-600 text-white mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold sm:mt-0 sm:w-auto"></div>
        </div>
        <canvas id="profile" class="px-10 py-16"></canvas>
      </div>
    </div>
  </body>
  <?php require_once("../components/footer.php");?>
</html>