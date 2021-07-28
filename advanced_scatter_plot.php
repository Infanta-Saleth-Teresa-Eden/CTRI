<?php 
header('Content-Type: text/html; charset=iso-8859-15');
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "Password@123please";
$dbname = "IC_CTRIdb_08Nov2020_0940hrs.sqlite";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
print "Connected successfully<br><br>";

// Selecting DD/MM/YYYY from database.
$data_query = mysqli_query($conn, "SELECT registered_on FROM dates");

// Creating an array to store only the YYYY.
$array_regdate_value_2 = array();

while ($row_data_query = mysqli_fetch_array($data_query)) {
  $regdate_value_1 = explode("/", $row_data_query['registered_on'], 3);
	$regdate_value_2 = $regdate_value_1[2];

  // Extracting YYYY and pasting it to variable.
	$regdate_value_2 = substr($regdate_value_2,0,4);

  // Inserted php variables into the array.
	$array_regdate_value_2[] = $regdate_value_2;
}

// Split Key => Value pairs separately.... where Array (Index_of_array => YYYY)
// Separating and storing YYYY into a variable (array).
	$data_values_regdate = array_values($array_regdate_value_2);

// Counting the frequency of YYYY and storing them as an associative array...
	$associative_array_regdate = array_count_values($data_values_regdate);

// Sorting the associative array in ascending order based on Key's value [YYYY]...
	ksort($associative_array_regdate);

	// Printing the Key => Value pairs for YYYY => Frequency
	/*
	echo "Printing the Key => Value pairs for YYYY => Frequency <br/><br/>";
	print_r($associative_array_regdate);
	echo "<br/><br/>";
	 */

// Splitting the Key => Value pairs for YYYY => Frequency
	$data_keys_regdate_YYYY = array_keys($associative_array_regdate);
	$data_values_regdate_Frequency = array_values($associative_array_regdate);

// Creating data to draw chart for No. of trials registered in each year
	$data_points = array(
    array("label" => $data_keys_regdate_YYYY[0], "y" => $data_values_regdate_Frequency[0]),
		array("label" => $data_keys_regdate_YYYY[1], "y" => $data_values_regdate_Frequency[1]),
		array("label" => $data_keys_regdate_YYYY[2], "y" => $data_values_regdate_Frequency[2]),
		array("label" => $data_keys_regdate_YYYY[3], "y" => $data_values_regdate_Frequency[3]),
		array("label" => $data_keys_regdate_YYYY[4], "y" => $data_values_regdate_Frequency[4]),
		array("label" => $data_keys_regdate_YYYY[5], "y" => $data_values_regdate_Frequency[5]),
		array("label" => $data_keys_regdate_YYYY[6], "y" => $data_values_regdate_Frequency[6]),
		array("label" => $data_keys_regdate_YYYY[7], "y" => $data_values_regdate_Frequency[7]),
		array("label" => $data_keys_regdate_YYYY[8], "y" => $data_values_regdate_Frequency[8]),
		array("label" => $data_keys_regdate_YYYY[9], "y" => $data_values_regdate_Frequency[9]),
		array("label" => $data_keys_regdate_YYYY[10], "y" => $data_values_regdate_Frequency[10]),
		array("label" => $data_keys_regdate_YYYY[11], "y" => $data_values_regdate_Frequency[11]),
		array("label" => $data_keys_regdate_YYYY[12], "y" => $data_values_regdate_Frequency[12]),
		array("label" => $data_keys_regdate_YYYY[13], "y" => $data_values_regdate_Frequency[13])
	);
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js">
		</script>

		<script>
      window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
          animationEnabled: true,
          exportEnabled: true,
          theme: "light2",
          title: {
					text: "Number of Clinical Trials registered in each year"
          },
          axisX: {
            title: "Year",
            titleFontColor: "black",
					  lineColor: "black",
					  labelFontColor: "black",
					  tickColor: "black"
          },
          axisY: {
            title: "No. of registered Clinical Trials",
					  titleFontColor: "black",
					  lineColor: "black",
					  labelFontColor: "black",
					  tickColor: "black"
          },
          data: [{
            type: "scatter",
					  markerType: "circle",
					  markerSize: 9,
					  toolTipContent: "Year: {label} <br>No. of trials: {y}",
            dataPoints: <?php echo json_encode($data_points, JSON_NUMERIC_CHECK);
            ?>
          }]
          });
                 chart.render();
        }
    </script>
  </head>
  
  <body>
    <div id="chartContainer" style="height:60%; width:100%"></div>
  </body>
</html>
