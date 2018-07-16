<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bichito de urls</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color:#E6E6FA">

	<?php
	include ("sub-categories.php");
	include ("categories.php");
	?>

<!--===============================================================================================-->
  <div class="limiter" >
		<div class="container-table100">
			<div class="wrap-table100">

  <div class="table100 ver3 m-b-110">

    <div class="table100-head">
      <table>
        <thead>
          <tr class="row100 head">
            <th class="cell100 column1">URL</th>
            <th class="cell100 column2">STATUS</th>
            <th class="cell100 column3">TIMESTAMP</th>
          </tr>
        </thead>
      </table>
    </div>

    <div class="table100-body js-pscroll">
      <table>
        <tbody>

<?php
 $counter=0;
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
foreach ($categories_airtable as $url){
 $counter++;
  $url_content = file_get_contents($url);
  $no_results   = "No se han encontrado resultados";

  ?>
  <tr class="row100 body">
    			<td class="cell100 column1" >
  <?php
echo $url;
?>
</td>
<td class="cell100 column1" >
<?php
  if (strpos($url_content, $no_results) === FALSE) {
		echo "<p style = 'color: #75B72D'> OK </p>";
    } else {
      echo "<p style = 'color: #f35252'> CATEGORÍA SIN STOCK </p>";
    }
?>
</td>
<td class="cell100 column1" style="width:33% !important">
<?php
echo date ("D/M/Y H:m:s");
?>
</td>
<?php
}//fin bucle
?>
</tr>
<tr class="row100 body">
				<td class="cell100 column1">
				</td>
				<td class="cell100 column1">
				</td>
				<td class="cell100 column1">
Checked urls: <?php echo $counter ?>
	</td>
</tr>
</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
<!--===========================================================================================================================================-->
<div class="limiter" >
	<div class="container-table100">
		<div class="wrap-table100">

<div class="table100 ver3 m-b-110">

	<div class="table100-head">
		<table>
			<thead>
				<tr class="row100 head">
					<th class="cell100 column1">URL</th>
					<th class="cell100 column2">STATUS</th>
					<th class="cell100 column2">VISIBILITY</th>
					<th class="cell100 column3">TIMESTAMP</th>
				</tr>
			</thead>
		</table>
	</div>

	<div class="table100-body js-pscroll">
		<table>
			<tbody>

<?php
$counter=0;
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
foreach ($sub_categories_airtable as $category_url_status){
$counter++;
$url_content = file_get_contents($category_url_status["url"]);
$no_results   = "No se han encontrado resultados";
?>
<tr class="row100 body">
				<td class="cell100 column1">
<?php
echo $category_url_status["url"];
?>
</td>
<td class="cell100 column1" >
<?php
if (strpos($url_content, $no_results) === FALSE) {
		echo "<p style = 'color: #75B72D'> OK </p>";
	} else {
		echo "<p style = 'color: #f35252'> CATEGORÍA SIN STOCK </p>";
	}
?>
</td>
<td class="cell100 column1">
<?php
if ($category_url_status["url_status"]=="checked")
{
echo "<p style = 'color: #f3d252'> URL OCULTA </p>";
} else {
echo "";
}

?>
</td>
<td class="cell100 column1">
<?php
echo date ("D/M/Y H:m:s");
?>
</td>
<?php
}//fin bucle
?>
</tr>
<tr class="row100 body">
			<td class="cell100 column1">
			</td>
			<td class="cell100 column1">
			</td>
			<td class="cell100 column1">
			</td>
			<td class="cell100 column1">
Checked urls: <?php echo $counter ?>
</td>
</tr>
</tbody>
</table>
</div>

</div>
</div>
</div>
</div>


<!--===========================================================================================================================================-->



</body>
</html>
