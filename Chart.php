<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
 
<body>
<?php

$conn = mysqli_connect ("localhost", "root", "", "ita00");


$array = array();
$array2 = array();

$sql = "SELECT Monat, Geld FROM chart";
$result = $conn-> query($sql);

while ($row = mysqli_fetch_assoc($result))
{
    $array[] = $row['Geld'];
    $array2[] = $row ['Monat'];
}

    $json_data = json_encode($array);
    $json_data2 = json_encode($array2);
?>

<div class="Chart"><canvas id="myChart" ></canvas></div>
 
  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
<script>
 
const ctx = document.getElementById('myChart');
var data = <?php echo $json_data ?>
var data = <?php echo $json_data2 ?>
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: [1, 2, 3, 4],
      datasets: [{
        label: 'Datensatz Numer 1',
        fill:true,
        data: data,
        backgroundColor: 'rgba(65,105,255,0.4)',
        borderColor:'rgba(65,105,255,1)'
      }]
    }
  });
</script>
 
</body>
</html>