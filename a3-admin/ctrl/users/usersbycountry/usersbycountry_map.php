<?php

$csql = "SELECT COUNT(id), country_code FROM users GROUP BY country_code ORDER BY COUNT(id) DESC";
$cresult = $conn->query($csql);
if($cresult->num_rows >0){
    echo '<script> const js_usersbycountry = [';
    echo '["Country", "Popularity"],';
    while ($crow = $cresult->fetch_assoc()) {
        if ( isset($crow['country_code']) || $crow['country_code'] != '' ){
            echo '["'.$crow['country_code'].'","'.$crow["COUNT(id)"].'"],';
        }
        
    }
    echo '["",""],';
    echo ']; </script>';
}
?>

    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable(js_usersbycountry);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>

<div id="regions_div" style="width: 900px; height: 500px;"></div>