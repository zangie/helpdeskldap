<?php
session_start();
	error_reporting(1);
 date_default_timezone_set('Europe/Athens');
   require_once "adminfunction.php";
  require_once "config.php";
 // error_reporting (E_ALL ^ E_NOTICE);	
  
 //////Refresh Page after 5 sec//////
$page = $_SERVER['PHP_SELF'];
$sec = "300"; 
$displayname = $_SESSION['displayname'];
$lines = file('makedonias_diefthinseis.txt');

	?>
	<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
 <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ΔΙΑΧΕΙΡΙΣΗ | HELP DESK | ΔΙΕΥΘΥΝΣΗΣ ΗΛΕΚΤΡΟΝΙΚΗΣ ΔΙΑΚΥΒΕΡΝΗΣΗΣ </title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>
		

<body class="hold-transition sidebar-mini">
<select name="my-dropdown">
  <?php
  foreach ($lines as $line) {
    echo '<option value="' . $line . '">' . $line . '</option>';
  }
  ?>
</select>





</body>
</html>



