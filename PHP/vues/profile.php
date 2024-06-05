<?php session_start();?>
<html>
  <head>
    <title>ProfilesPlongée.fr</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js" defer></script>
    <script src="../../JS/ajax.js" defer></script>
    <script src="../../JS/profiles.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <?php require_once("../components/header.php");?>
  <body>
    <div id="depth" value="<?php$_POST['depth']?>">
    <div id="depth" value="<?php$_POST['duration']?>">
    <div class="px-2 py-2">
        <table class="m-auto border-double border-4 border-sky-500 text-center">
            <thead>
            <tr>
                <th class="border border-slate-600 px-3 py-2">tX</th>
                <th class="border border-slate-600 px-3 py-2">Depth</th>
                <th class="border border-slate-600 px-3 py-2">Time</th>
                <th class="border border-slate-600 px-3 py-2">Pressure</th>
                <th class="border border-slate-600 px-3 py-2">Consumption</th>
                <th class="border border-slate-600 px-3 py-2">Bar left</th>
                <th class="border border-slate-600 px-3 py-2">Air volume</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="border border-slate-600 px-3 py-2">t0</td>
                <td class="border border-slate-600 px-3 py-2">...</td>
                <td class="border border-slate-600 px-3 py-2">...</td>
                <td class="border border-slate-600 px-3 py-2">...</td>
                <td class="border border-slate-600 px-3 py-2">...</td>
                <td class="border border-slate-600 px-3 py-2">...</td>
                <td class="border border-slate-600 px-3 py-2">...</td>
            </tr>
            </tbody>
        </table>
    </div>
    
    <div id="myPlot" class="m-auto" style="width:100%;max-width:700px"></div>

  </body>
  <?php require_once("../components/footer.php");?>
</html>