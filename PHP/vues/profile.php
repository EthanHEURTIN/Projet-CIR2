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
  <body>
    <div id="depth" value="<?php echo $_POST['depth']?>"></div>
    <div id="duration" value="<?php echo $_POST['duration']?>"></div>
    <div class="px-2 py-2">
        <table class="m-auto border-double border-4 border-sky-500 text-center">
            <thead>
            <tr class="bg-blue-400">
                <th class="border border-slate-600 px-3 py-2">tX</th>
                <th class="border border-slate-600 px-3 py-2">Depth (m)</th>
                <th class="border border-slate-600 px-3 py-2">Time (min)</th>
                <th class="border border-slate-600 px-3 py-2">Pressure (bar)</th>
                <th class="border border-slate-600 px-3 py-2">Consumption (l)</th>
                <th class="border border-slate-600 px-3 py-2">Bar left (bar)</th>
                <th class="border border-slate-600 px-3 py-2">Air volume (l)</th>
            </tr>
            </thead>
            <tbody id="table">
            </tbody>
        </table>
    </div>
    
    <canvas id="myChart"></canvas>

  </body>
  <?php require_once("../components/footer.php");?>
</html>