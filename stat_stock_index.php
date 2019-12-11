<!DOCTYPE html>
<html>
<head>
<title>Stat</title>
<link rel="stylesheet" href="style.css">
</head>
<body >

<?Php
require "config.php";// Database connection

if($stmt = $connection->query("SELECT nom,quantite  FROM prod")){

$php_data_array = Array(); // create PHP array
while ($row = $stmt->fetch_row()) {
   $php_data_array[] = $row; // Adding to array
   }
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 


// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_div"></div>
<br><br>
</body>
<script type="text/javascript" src="js/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() 

      {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'nom');
        data.addColumn('number', 'quantite');
		for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'Statistique de stock des Produits',
                       width:600,
                       height:500,
                      backgroundColor: 'transparent',
                     };

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);

       
      }

</script>
</html>







