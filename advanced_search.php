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

$_SESSION['ctri_number'] = trim($_POST['ctri_number']);
$value_ctri = $_SESSION['ctri_number'];

$_SESSION['registered_on'] = trim($_POST['registered_on']);
$value_regdate = $_SESSION['registered_on'];

$_SESSION['last_modified_on'] = trim($_POST['last_modified_on']);
$value_last_modified = $_SESSION['last_modified_on'];

$_SESSION['scientific_title'] = trim($_POST['scientific_title']);
$value_scientific_title = $_SESSION['scientific_title'];

$_SESSION['post_graduate_thesis'] = trim($_POST['post_graduate_thesis']);
$value_thesis = $_SESSION['post_graduate_thesis'];

$_SESSION['type_of_trial'] = trim($_POST['type_of_trial']);
$value_trial_type = $_SESSION['type_of_trial'];

$_SESSION['phase'] = trim($_POST['phase']);
$value_phase = $_SESSION['phase'];

$_SESSION['condition'] = trim($_POST['condition']);
$value_condition = $_SESSION['condition'];

$_SESSION['intervention_name'] = trim($_POST['intervention_name']);
$value_intervention_name = $_SESSION['intervention_name'];

$_SESSION['comparator_name'] = trim($_POST['comparator_name']);
$value_comparator_name = $_SESSION['comparator_name'];

if (isset($_POST["submit"])) {
?>

<!DOCTYPE html>
<html lang="en-US">
<body>
<style>
table, th, td {
border : 1px solid black;
}
</style>
<table style='width=100%'>
<thead>
<tr>
<th><b> CTRI Number </th>
<th> Date of Registration </th>
<th> Type of Trial </th>
<th> Scientific Title of Study</th>
<th> Phase of Trial </th>
<th> Health Condition / Problems Studied </th>
<th> Intervention Name </th>
<th> Comparator Name </b></th>
</tr>
</thead>

<tbody>
<?php
			$query = "SELECT brief_summary.ctri_number, dates.registered_on, study_details.type_of_trial, study_name.scientific_title, study_details.phase, health_condition.condition, intervention_comparator.intervention_name, intervention_comparator.comparator_name 
			FROM `brief_summary`
                        INNER JOIN `dates` ON brief_summary.ctri_number = dates.ctri_number
                        INNER JOIN `study_details` ON brief_summary.ctri_number = study_details.ctri_number
                        INNER JOIN `study_name` ON brief_summary.ctri_number = study_name.ctri_number
                        INNER JOIN `health_condition` ON brief_summary.ctri_number = health_condition.ctri_number
                        INNER JOIN `intervention_comparator` ON brief_summary.ctri_number = intervention_comparator.ctri_number
			WHERE LOWER(brief_summary.ctri_number) LIKE LOWER('%$value_ctri%') AND LOWER(brief_summary.ctri_number) LIKE LOWER('%%') AND dates.registered_on LIKE '%$value_regdate%' AND LOWER(study_name.scientific_title) LIKE LOWER('%$value_scientific_title%') AND LOWER(health_condition.condition) LIKE LOWER('%$value_condition%') AND study_details.type_of_trial LIKE '%$value_trial_type%' AND study_details.phase LIKE '%$value_phase%' AND LOWER(intervention_comparator.comparator_name) LIKE LOWER('%$value_comparator_name%') AND LOWER(intervention_comparator.intervention_name) LIKE LOWER('%$value_intervention_name%');";
			$query_search = mysqli_query($conn, $query);
?>

<tr>
<?php
                while ($row_retrieve = mysqli_fetch_array($query_search)) {
                  			$read_slash_ctri_number = preg_quote($value_ctri, '/');	      // Making the slashes '/' in CTRI number readable
			                  $final_ctri_number = $row_retrieve['ctri_number'];
                  
                        $cut_start = ltrim($row_retrieve['registered_on'],"' ");      // Trimming the single quote from dates
			                  $cut_end = rtrim($cut_start, " '");
			                  $final_regdate = $cut_end;
			          
                        $read_slash_regdate = preg_quote($value_regdate, '/');	      // Making the slashes '/' in dates readable
			                  $final_trial_type = $row_retrieve['type_of_trial'];
			                  $read_slash_trial_type = preg_quote($value_trial_type, '/');  // Making slashes in '/' trial types readable
			                  $final_scientific_title = $row_retrieve['scientific_title'];
			                  $final_phase = $row_retrieve['phase'];
			                  $read_slash_phase = preg_quote($value_phase, '/');            // Making slashes in '/' phase readable
                        $final_condition = $row_retrieve['condition'];
                        $final_intervention_name = $row_retrieve['intervention_name'];
                        $final_comparator_name = $row_retrieve['comparator_name'];
?>
  <td><?php
                  if ($value_ctri != null) {
                    $final_ctri_number = preg_replace("/\b([a-z]*${read_slash_ctri_number}[a-z]*)\b/i", "<mark><b>$1</b></mark>", $final_ctri_number);
                  }
                  echo $final_ctri_number; 
  ?></td>
				
<td><?php
                  if ($value_regdate != null) {
                    $cut_end = preg_replace("/\b([a-z]*${read_slash_regdate}[a-z]*)\b/i", "<mark><b>$1</b></mark>", $final_regdate);
                  }
                  echo $cut_end;
  ?> </td>

<td><?php  
                  if ($value_trial_type != null) {
                    $final_trial_type = preg_replace("/\b([a-z]*${read_slash_trial_type}[a-z]*)\b/i", "<mark><b>$1</b></mark>", $final_trial_type);
                  }
                  echo $final_trial_type;
  ?> </td>
  
<td><?php  
                  if ($value_scientific_title != null) {
                    $final_scientific_title = preg_replace("/\b([a-z]*${value_scientific_title}[a-z]*)\b/i", "<mark><b>$1</b></mark>", $final_scientific_title);
                  }
			            echo $final_scientific_title; 
   ?> </td>
  
 <td><?php               
                  if ($value_phase != null) {
                    $final_phase = preg_replace("/\b([a-z]*${read_slash_phase}[a-z]*)\b/i", "<mark><b>$1</b></mark>", $final_phase);
                  }
                  echo $final_phase; 
   ?> </td>

<td><?php               
                  if ($value_condition != null) {
                    $final_condition = preg_replace("/\b([a-z]*${value_condition}[a-z]*)\b/i", "<mark><b>$1</b></mark>", $final_condition);
                  }
                  echo $final_condition; 
  ?> </td>

<td><?php               
                  if ($value_intervention_name != null) {
                    $final_intervention_name = preg_replace("/\b([a-z]*${value_intervention_name}[a-z]*)\b/i", "<mark><b>$1</b></mark>", $final_intervention_name);
                  }
                  echo $final_intervention_name; 
  ?> </td>

<td><?php               
                  if ($value_comparator_name != null) {
                    $final_comparator_name = preg_replace("/\b([a-z]*${value_comparator_name}[a-z]*)\b/i", "<mark><b>$1</b></mark>", $final_comparator_name);
                  }
                  echo $final_comparator_name; 
  ?> </td>
  
</tr>

<?php 
                        }
			echo "<br><br>";			
?>

</tbody></table></body></html>
<?php
}
		mysqli_close($conn);
?>
