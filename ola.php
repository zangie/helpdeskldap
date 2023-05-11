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
$username = $_SESSION['username'];
$password=$_SESSION['password'];
if (!isset($_SESSION["username"]))
{
    header('location:login.php');
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "root", "arstl1719", "atest");
		 $sql = 'SELECT * FROM tickets left join status on FKStatus=StatusID left join replies on TicketID=FKTicketID order by CreationDate desc';
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
						$status = $row['StatusID'];
						
						if ($status == 0){
								$now = time(); // or your date as well
								$creationdate = strtotime($row['CreationDate']);
								$datediff = $now - $creationdate;
								$dt=round($datediff / (60 * 60 * 24));
								if ($dt>2){
$mysqli->query("UPDATE tickets SET FKStatus=1 ,WasLate=1 where TicketID = ".$row['TicketID']);

//printf("Affected rows (UPDATE): %d\n", $mysqli->affected_rows);
								//echo $dt=round($datediff / (60 * 60 * 24));
							
										}
				
						
					}
					}
					}
}


				$οmysqli = new mysqli("localhost", "root", "arstl1719", "atest");
		 $οsql = 'SELECT * FROM othertickets left join status on OFKStatus=StatusID 
		 left join otherreplies on OTicketID=OFKTicketID order by OCreationDate desc';
                    if($result = mysqli_query($link, $οsql)){
                        if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
						$status = $row['StatusID'];
						
						if ($status == 0){
								$now = time(); // or your date as well
								$creationdate = strtotime($row['OCreationDate']);
								$datediff = $now - $creationdate;
								$dt=round($datediff / (60 * 60 * 24));
								if ($dt>2){
$οmysqli->query("UPDATE othertickets SET OFKStatus=1 ,OWasLate=1 where OTicketID = ".$row['OTicketID']);

//printf("Affected rows (UPDATE): %d\n", $οmysqli->affected_rows);
								//echo $dt=round($datediff / (60 * 60 * 24));
							
										}
				
						
					}
					}
					}
}
				
//KILL SESSION META ΑΠΟ 10 ΛΕΠΤΑ
// inactive in seconds
/* $inactive = 600;
if( !isset($_SESSION['timeout']) )
$_SESSION['timeout'] = time() + $inactive; 

$session_life = time() - $_SESSION['timeout'];

if($session_life > $inactive)
{  session_destroy(); header("Location:login.php");     }

$_SESSION['timeout']=time(); */
///////////////

//echo $password;
	   
	

 /*  $sql = 'SELECT * FROM tickets left join users on FKUserID=UserID 
 left join status on FKStatus=StatusID left join replies on TicketID=FKTicketID order by CreationDate desc';
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
						$status = $row['FKStatus'];
						$usertype = $row['Usertype'];
						if ($status == 0){
									
								$now = time(); // or your date as well
								$creationdate = strtotime($row['CreationDate']);
								$datediff = $now - $creationdate;
								$dt=round($datediff / (60 * 60 * 24));
								if ($dt>2){

								//echo $dt=round($datediff / (60 * 60 * 24));
								$sql = 'UPDATE tickets SET FKStatus=2 where TicketID = "'.$row[TicketID].'"';
								//echo $sql;}
								
										}
						//	if	($usertype == 'admin'){
				     //echo "<style>#anathesi {display:none}";  }  
					}
					}
					}
} */
	?>
	<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
 <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ΔΙΑΧΕΙΡΙΣΗ| HELP DESK | ΔΙΕΥΘΥΝΣΗΣ ΗΛΕΚΤΡΟΝΙΚΗΣ ΔΙΑΚΥΒΕΡΝΗΣΗΣ </title>


  

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
  <script src="//cdn.datatables.net/plug-ins/1.11.4/i18n/el.json"></script>
		

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     <!--    <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Αρχική</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Επικοινωνία</a>
      </li>-->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
   

      <!-- Messages Dropdown Menu -->
     <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
        <!--    <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
        <!--  </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
        <!--    <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
        <!--  </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
          <!--  <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
        <!--  </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
     Notifications Dropdown Menu -->
    <!--  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"> Ειδοποιήσεις</span>
          <div class="dropdown-divider"></div>

         <strong> Θέμα:</strong>
			
		
      
			 <strong>Περιγραφή: </strong>
			
  
         
        
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Όλες οι ανακοινώσεις</a>
        </div>
      </li>
      <!--  <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="https://www.moh.gov.gr/" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="Υπουργείο Υγείας" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Υπουργείο Υγείας</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!--  <div class="image">
          // <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        // </div>
        // <div class="info">
          // <a href="#" class="d-block">Alexander Pierce</a>
        // </div>-->
		 <div class="info">
         <p style="color:white;"> Καλώς ήρθες <?php echo $username ?>
		  </div>
      </div>

      <!-- SidebarSearch Form -->
  

      <!-- Sidebar Menu -->
     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="admin.php" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
ΔΙΑΧΕΙΡΙΣΗ
         
              </p>
            </a>
           
          </li>
		     <li class="nav-item">
            <a href="users.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Χρήστες

                <span class="right badge badge-danger">Προσοχή TEST</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="searchinad.php" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
             <p>
               Αναφορά Βλάβης (χρηστών στο AD)

              
              </p>
            </a>
          </li>
		   <li class="nav-item">
            <a href="insert-ticket-outad.php" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                Αναφορά Βλάβης (εκτός AD)

               
              </p>
            </a>
          </li>
		  

		  
		    	  <li class="nav-item">
            <a href="reports.php" class="nav-link">
              
              <p><i class="nav-icon fas fa-chart-pie"></i>

                Στατιστικά

             
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="logout.php" class="nav-link">
              
              <p><i class="fas fa-sign-out-alt"></i>

                Έξοδος

             
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ΔΙΑΧΕΙΡΙΣΗ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Αρχική</a></li>
              <li class="breadcrumb-item active"> Όλα τα tickets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">



       
            <!-- /.card -->
          </div>
		  
		  
		         <div class="col-lg-12">



            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Όλα τα tickets </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                	<?Php 
			
$sql='select TicketNumber from tickets
union 
select OTicketNumber from othertickets ';

				if ($result=mysqli_query($link,$sql))
							{
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
  ?>
<div  id="render_me">
			<div class="row">
			<div class="col-lg-1 col-6"></div>
						<div class="col-lg-2 col-6">

						<div class="small-box bg-info">
						<a href="ola.php" class="small-box-footer">
						<div class="inner">
						<h3><?php echo $rowcount; ?></h3>   
						<p>Όλα</p>
						<br>
						</div>
						<div class="icon">
						<i class="fas fa-ticket"></i>						
						</div>
						Δείτε περισσότερα<i class="fas fa-arrow-circle-right"></i></a>
						</div>
						</div>
						<?php // Free result set
										mysqli_free_result($result);
										}
									//	mysqli_close($con);
					?>
	<?Php 
			
$sql='select * from ((select TicketNumber , FKStatus as FKStatus from tickets) union (select OTicketNumber, OFKStatus as FKStatus from othertickets)) ola where FKStatus="2" or FKStatus="0" or FKStatus="1";
';

				if ($result=mysqli_query($link,$sql))
							{
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
  ?>	
						<div class="col-lg-2 col-6">

						<div class="small-box bg-success">
					<a href="opentickets.php" class="small-box-footer">
						<div class="inner">
						<h3><?php echo $rowcount; ?></h3>
						<p>Ανοιχτά</p>
						<br>
						</div>
						<div class="icon">
						<i class="ion ion-stats-bars"></i>
						</div>
						Δείτε περισσότερα<i class="fas fa-arrow-circle-right"></i></a>
						</div>
						</div>
						<?php // Free result set
										mysqli_free_result($result);
										}
										//mysqli_close($con);
					?>

<?Php 
			
$sql='select * from ((select TicketNumber , FKStatus as FKStatus from tickets) 
union (select OTicketNumber, OFKStatus as FKStatus from othertickets)) ola 
where FKStatus="5" or  FKStatus="3" or  FKStatus="4"';

				if ($result=mysqli_query($link,$sql))
							{
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
  ?>

						<div class="col-lg-2 col-6">

						<div class="small-box bg-warning">
						<a href="otherstatus.php" class="small-box-footer">
						<div class="inner">
						<h3><?php echo $rowcount; ?></h3>
						<p>Έχουν απαντηθεί/Σε εξέλιξη/Χρειάζεται επίλυση από τρίτο μέρος</p>
						</div>
						<div class="icon">
						<i class="ion ion-person-add"></i>
						</div>
						Δείτε περισσότερα<i class="fas fa-arrow-circle-right"></i></a>
						</div>
						</div>
						<?php // Free result set
										mysqli_free_result($result);
										}
										//mysqli_close($con);
					?>


<?Php 
			
$sql='select * from ((select TicketNumber , FKStatus as FKStatus from tickets) union (select OTicketNumber, OFKStatus as FKStatus from othertickets)) ola   where FKStatus="6"';

				if ($result=mysqli_query($link,$sql))
							{
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
  ?>
						<div class="col-lg-2 col-6">

						<div class="small-box bg-danger">
						<a href="closed.php" class="small-box-footer">
						<div class="inner">
						<h3><?php echo $rowcount; ?></h3>
						<p>Κλειστά</p>
						<br>
						</div>
						<div class="icon">
						<i class="ion ion-pie-graph"></i>
						</div>
						Δείτε περισσότερα<i class="fas fa-arrow-circle-right"></i></a>
						</div>
						</div> 

<?php // Free result set
										mysqli_free_result($result);
										}
										//mysqli_close($con);
					?>



<?Php 
			
$sql='select * from ((select TicketID , FKStatus as FKStatus from tickets) union (select OTicketID, OFKStatus as FKStatus from othertickets)) ola  where FKStatus="7"';

				if ($result=mysqli_query($link,$sql))
							{
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
  ?>
						<div class="col-lg-2 col-6">

						<div class="small-box bg-dark ">
						<a href="rejected.php" class="small-box-footer">
						<div class="inner">
						<h3><?php echo $rowcount; ?></h3>
						<p>Έχουν απορριφθεί</p>
						<br>
						</div>
						<div class="icon">
						<i class="ion ion-pie-graph"></i>
						</div>
						Δείτε περισσότερα<i class="fas fa-arrow-circle-right"></i></a>
						</div>
						</div> 

<?php // Free result set
										mysqli_free_result($result);
										}
									//	mysqli_close($con);
					?>
					<div class="col-lg-1 col-6"></div>

					</div>
					
					
				<ul>
				  </ul>
                </p>
</div>
                <hr>
   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Όλα τα tickets </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			
				 <div class="table-responsive" >
				 <form method="POST" action="" name="filtra"> 
				  
   <!-- Custom Filter -->
   <table class="table table-bordered table-hover" id="filt">
     <tr>
       <td>
	   <?php $searchbyanything = (isset($_POST['searchByAnything'])) ? htmlentities($_POST['searchByAnything']) : ''; ?>
	   
       <input type='text' id='searchByAnything' name='searchByAnything' placeholder='Θέμα ή πρόβλημα...' value="">
       </td>
	    <td>
    	<label>Από:  </label><input type="date" id="min" name="from" >
		</td>
		<td>		
		<label>Μέχρι:</label><input type="date" id="max" name="to" >
       </td>
       <td>
        <select name='searchByPriority'>
           <option value=''>-- Επιλογή Προτεραιότητας--</option>
           <option value='Χαμηλή'>Χαμηλή</option>
           <option value='Φυσιολογική'>Φυσιολογική</option>
		   <option value='Υψηλή'>Υψηλή</option>
		</select>
       </td>
	   <td>
		<select name='searchByCategory'>
        <!--    <option value=''>-- Επιλογή Κατηγορίας--</option>
           <option value='support'>Support</option>
           <option value='damage'>Βλάβη σε υλικό</option>
		   <option value='update'>Update λογισμικού</option>
		   <option value='other'>Άλλο</option> -->
		    <option selected disabled>Επιλογή Κατηγορίας</option>
				  <option>Δίκτυο</option>
                  <option>Domain</option>
                  <option>Εκτυπώσεις</option>
				  <option>Κοινόχρηστος Φάκελος</option>
				  <option>Τηλεδιάσκεψη</option>
				  <option>Λογισμικό</option>
				  <option>Mail</option>
				  <option>Η/Υ Hardware</option>
				  <option>Τηλεφωνία</option>
				  <option>Άλλο</option>
         </select>
	   </td>
	   <td>
	    <select id='searchByStatus' name='searchByStatus'>
           <option value=''>-- Επιλογή Κατάστασης--</option>
           <option value='Νέο'>Νέο</option>
           <option value='Έχει απαντηθεί'>Έχει απαντηθεί</option>
		   <option value='Αναμονή Απάντησης'>Αναμονή Απάντησης</option>
		   <option value='Σε εξέλιξη'>Σε εξέλιξη - Έχει επιλυθεί μερικώς</option>
		   <option value='Χρειάζεται επίλυση από τρίτο μέρος'>Χρειάζεται επίλυση από τρίτο μέρος</option>
		   <option value='Κλειστό'>Έχει ολοκληρωθεί</option>
		   <option value='Έχει απορριφθεί'>Έχει απορριφθεί</option>
		     <option value='Έγινε επίσκεψη'>Έγινε επίσκεψη</option>
         </select>
	   </td>
	   <td>
	   <input type="submit" name="searchticket" value="Αναζήτηση" class="btn btn-block btn-info btn-sm"><br/>
	   <button onclick="clearFilters()">Καθαρισμός Φίλτρων</button>
	   </td>
	     </form>
	   
     </tr>
   </table>
 

<?Php


/*    $sql = "select TicketNumber, Subject, Problem , CreationDate, 
 (SELECT StatusText from Status where StatusID=FKStatus) status,Category , Priority
 from tickets where Category = '".$_POST['searchByCategory']."' or Problem like '%".$_POST['searchByName']."%' 
 or Subject like '%".$_POST['searchByName']. "%'"
 ."or CreationDate between '".$from. "' and '".$to. "'";
 */

				if (isset ($_POST['searchticket'])) {

  $sql = "select * from((select TicketNumber as TicketNumber, Subject as Subject, Problem as Problem, CreationDate as CreationDate, StatusText as status, Priority as Priority, 
  Category as Category, DisplayName as DisplayName, (SELECT Usertype from users where WhoOpenedIt=UserID) Usertype, 
  TDescription as Description, Office as Office, (SELECT DisplayName from users where WhoOpenedIt=UserID) WhoOpenedIt 
  from tickets left join users on FKUserID=UserID left join status on FKStatus=StatusID) 
  UNION 
  (select OTicketNumber as TicketNumber, OSubject as Subject, OProblem as Problem, OCreationDate as CreationDate,
  StatusText as status, OPriority as Priority,
  OCategory as Category, ODisplayName as DisplayName,
  (SELECT Usertype from users where OWhoOpenedIt=UserID) Usertype, (SELECT OnomaDiefth from diefthinseismakedonias where DMID=ODescription) Description, 
  OOffice as Office, (SELECT DisplayName from users where OWhoOpenedIt=UserID) WhoOpenedIt from othertickets left join users on OFKUserID=UserID left join status on OFKStatus=StatusID)) ola";
 $conditions = array();
  	if (!empty($_POST['searchByAnything']))  {	
  $conditions[] = "Subject or Problem  Like '%".$_POST['searchByAnything']."%'";	
	}
		if (!empty($_POST['searchByCategory'])) {
   $conditions[] = "Category = '".$_POST['searchByCategory']."'";
}

		if ((!empty($_POST['from']))&&(!empty($_POST['to']))) {
	//		   $conditions[] = "CreationDate between '".$_POST['from']."' and  '".$_POST['to']."'";
  $conditions[] = "CreationDate between '".$_POST['from']." 00:00:00' and  '".$_POST['to']." 23:59:59'";
}
		if (!empty($_POST['searchByPriority'])) {
   $conditions[] = "Priority = '".$_POST['searchByPriority']."'";
}

		if (!empty($_POST['searchByStatus'])) {
   $conditions[] = " status  = '".$_POST['searchByStatus']."'";
}
if( count($conditions)){
    $sql.= " WHERE ";
    $sql.=implode(" AND ",$conditions);
}
/* 
  	if (!empty($_POST['searchByAnything']))  {	
$searchByAnything=" Problem = '{$_POST['searchByAnything']}' or Subject = '{$_POST['searchByAnything']}' ";
		
	}
	if (!empty($_POST['searchByCategory'])) {
$searchByCategory=" AND Category = '{$_POST['searchByCategory']}' ";
	
} */
 //echo $sql;

?>
 <div class="table-responsive" >

                    <table id="searched" class="table table-bordered table-hover">
  <thead>  
                        <tr>
					<th>TicketNo</th>
					<th hidden></th>
					<th>Δημιουργία</th>
					<th>Ονοματεπώνυμο<br>Τηλέφωνο</th>
					<th>Τοποθεσία</th>
					<th>Θέμα <br>Περιγραφή </th>
					<th>Κατηγορία</th>					
					<th>Κατάσταση</th>				
					<th>Ανοίχτηκε από/Κατηγορία Χρήστη</th>
					<th hidden></th>
					<th >Ανάθεση σε χρήστη: </th>
					
					</tr></thead>  
        <tbody>
					
			  <?php
                   if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
						

                                while($row = mysqli_fetch_array($result)){
						
                     $_GET['TicketNumber'];
									if (($row['TicketNumber'][0])==="a"){
										
									echo '<td><a href=ticket-reply.php?'. $row["TicketNumber"].' class="ticketnumber" 
	 id="ticketnumber_' . $row["TicketID"] . '" data-type="text" data-pk = "' . $row["TicketID"] . 
									'" data-url="process.php" data-name="ticketnumber">' . $row["TicketNumber"] . '</a></td>';
									}else 	echo '<td><a href=oticket-reply.php?'. $row["TicketNumber"].' class="ticketnumber" 
	 id="ticketnumber_' . $row["TicketID"] . '" data-type="text" data-pk = "' . $row["TicketID"] . 
									'" data-url="process.php" data-name="ticketnumber">' . $row["TicketNumber"] . '</a></td>';
										echo "<td hidden> ". $row['CreationDate'] . "</td>";
								echo "<td> ".date("d/m/Y H:i:s" , strtotime($row['CreationDate'])) . "</td>";
									echo "<td> ". $row['DisplayName']."<br>".$row['Phone'] . "</td>";
									echo "<td> ". $row['Description'] ." - ".$row['Office'] . "</td>";
									echo "<td>". $row['Subject'] ."-<br><strong>". $row['Problem']. "</strong></td>";
										echo "<td> ". $row['Category'] . "</td>";
								
								
								
								if ($row['status']== 'Αναμονή απάντησης' && $row['ReplyID']==null){
									
								$now = time(); // or your date as well
								$creationdate = strtotime($row['CreationDate']);
								$datediff = $now - $creationdate;

								$dt=round($datediff / (60 * 60 * 24));
									
								echo "<td><p class='blink'>". $row['status'] . "</p>Ημέρες καθυστέρησης: " . $dt . "</td></br> ";
							
								}
									elseif ($row['status']== 'Νέο' ){
										echo "<td><p class='blinknew'>". $row['status']. "</td> ";	
									}
									elseif ($row['status']== 'Σε εξέλιξη' ){
										echo "<td><p class='blinkinprogress'>". $row['status']. "</td> ";	
									}
										elseif ($row['status']== 'Έγινε επίσκεψη' ){
										echo "<td><p class='blinkvisited'>". $row['status']. "</td> ";	
									}
								else echo "<td>". $row['status'] . "</td>";
								
								
								
									//echo "<td> ". $row['Reply'] . "</td>";
								//	echo "<td> ". $row['status'] . "</td>";
								
								
									
									echo "<td> ". $row['WhoOpenedIt']."-".$row['Usertype'] . "</td>";
									echo "<td hidden> ".$row['statusid']. "</td>";
						echo "<td>";?>
		<input hidden value="<?php  $_GET['TicketNumber']=$row['TicketNumber']?>">
	<?php
		"<ul name='assigntouser' >
				
                <li>".assign() ."</li>			
                </ul> </td>";
									echo " </tr>";
                                      
				}				 
				 }else echo "Δεν βρέθηκε κάτι....";
				 ?>  </tbody>  
                    </table>	</div> <div class="table-responsive" hidden><?php
				}}
   
   
?>					
<table id="ola"class="table table-bordered table-hover">

                        <thead>  
                            <tr>
					<th>TicketNo</th>
						<th hidden></th>
					<th>Δημιουργία</th>
					<th>Ονοματεπώνυμο<br>Τηλέφωνο</th>
					<th>Τοποθεσία</th>
					<th>Θέμα <br>Περιγραφή </th>
					<th>Κατηγορία</th>					
					<th>Κατάσταση</th>				
					<th>Ανοίχτηκε από/Κατηγορία Χρήστη</th>
					<th hidden></th>
					<th >Ανάθεση σε χρήστη: </th>
					
				
                     
						</tr></thead>  
        <tbody>
				 
		
			  <?php
			        $sql = "select * from ((select TicketNumber, Subject, Problem ,
		CreationDate as CreationDate, (SELECT StatusText from Status where StatusID=FKStatus) status,(SELECT StatusID from Status where StatusID=FKStatus) statusid,
		Category , DisplayName, (SELECT Usertype from users where WhoOpenedIt=UserID) Usertype,
		TDescription as Description, Phone, Office, (SELECT DisplayName from users where WhoOpenedIt=UserID) WhoOpenedIt 
		from tickets left join users on FKUserID=UserID order by statusid asc)
		UNION
		(select OTicketNumber, OSubject, OProblem , OCreationDate as CreationDate, 
 (SELECT StatusText from Status where StatusID=OFKStatus) status,(SELECT StatusID from Status where StatusID=OFKStatus) statusid,
 OCategory , ODisplayName,(SELECT Usertype from users where OWhoOpenedIt=UserID) Usertype, 
 (SELECT OnomaDiefth from diefthinseismakedonias where DMID=ODescription) Description, OPhone, OOffice,   (SELECT DisplayName from users where OWhoOpenedIt=UserID) OWhoOpenedIt 
 from othertickets order by statusid asc)) ola order by statusid asc";
 if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
									$_GET['TicketNumber'];
									if (($row['TicketNumber'][0])==="a"){
										
									echo '<td><a href=ticket-reply.php?'. $row["TicketNumber"].' class="ticketnumber" 
	 id="ticketnumber_' . $row["TicketID"] . '" data-type="text" data-pk = "' . $row["TicketID"] . 
									'" data-url="process.php" data-name="ticketnumber">' . $row["TicketNumber"] . '</a></td>';
									}else 	echo '<td><a href=oticket-reply.php?'. $row["TicketNumber"].' class="ticketnumber" 
	 id="ticketnumber_' . $row["TicketID"] . '" data-type="text" data-pk = "' . $row["TicketID"] . 
									'" data-url="process.php" data-name="ticketnumber">' . $row["TicketNumber"] . '</a></td>';
									echo "<td hidden> ".$row['CreationDate']. "</td>";
									echo "<td > ".date("d/m/Y H:i:s" , strtotime($row['CreationDate'])) . "</td>";
									echo "<td> ". $row['DisplayName']."<br>".$row['Phone'] . "</td>";
									echo "<td> ". $row['Description'] ." - ".$row['Office'] . "</td>";
								echo "<td>". $row['Subject'] ."-<br><strong>". $row['Problem']. "</strong></td>";
										echo "<td> ". $row['Category'] . "</td>";
								
								
								
								if ($row['status']== 'Αναμονή απάντησης' && $row['ReplyID']==null){
									
								$now = time(); // or your date as well
								$creationdate = strtotime($row['CreationDate']);
								$datediff = $now - $creationdate;

								$dt=round($datediff / (60 * 60 * 24));
									
								echo "<td><p class='blink'>". $row['status'] . "</p>Ημέρες καθυστέρησης: " . $dt . "</td></br> ";
							
								}
									elseif ($row['status']== 'Νέο' ){
										echo "<td><p class='blinknew'>". $row['status']. "</td> ";	
									}
										elseif ($row['status']== 'Σε εξέλιξη' ){
										echo "<td><p class='blinkinprogress'>". $row['status']. "</td> ";	
									}
										elseif ($row['status']== 'Έγινε επίσκεψη' ){
										echo "<td><p class='blinkvisited'>". $row['status']. "</td> ";	
									}
								else echo "<td>". $row['status'] . "</td>";
								
								
								
									//echo "<td> ". $row['Reply'] . "</td>";
								//	echo "<td> ". $row['status'] . "</td>";
								
								
									
									echo "<td> ". $row['WhoOpenedIt']."-".$row['Usertype'] . "</td>";
									echo "<td hidden> ".$row['statusid']. "</td>";
								//	echo "<td > ".$_GET['TicketNumber']=$row['TicketNumber'].		 "</td>";
								//$ticketnumber=$_GET['TicketNumber'];
		//echo "<td>".substr($row['TicketNumber'], 0, 1)."</td>";

		echo "<td>";?>
		<input hidden value="<?php  $_GET['TicketNumber']=$row['TicketNumber']?>">
	<?php
		"<ul name='assigntouser' >
				
                <li>".assign() ."</li>			
                </ul> </td>";
									echo " </tr>";
									
                                      
                                }
                            
                            // Free result set
                            mysqli_free_result($result);
                        }
						
					}
                        ?>
					
	 <?php
    function assign(){
   
     $connect = new PDO("mysql:host=localhost;dbname=atest", "root", "arstl1719");
	 
	 
   // $assignstaff = '';
    
    $query = "select * from (
	(SELECT ticketid as id, ticketnumber as TicketNumber, DisplayName as DisplayName 
	FROM assign left join tickets on fkticketid=TicketID left join users on afkuserid=userid)
	UNION (SELECT OTicketID as id, Oticketnumber as TicketNumber, DisplayName as DisplayName 
	FROM assignforothertickets left join othertickets on ofkticketid=oTicketID 
	left join users on oafkuserid=userid)) as ola where TicketNumber='".	$_GET['TicketNumber']."'";
//echo $query;
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    
    foreach($result as $row){
       $assignstaff .= '<li class="user-footer" value="'.$row['DisplayName'].'">'.$row['DisplayName'].'</li>';
	

    }echo $assignstaff;
	}
?>	
			
   </tbody>  		 
                    </table>	
					
			
				
				
				
					
 </div>
   <!-- Table -->
   
</div>	 
			                
                 
      
           
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          
            <!-- /.card -->
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
		  
		         <div class="col-lg-12">


           
          <!-- /.col -->
   
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.1
    </div>
    <strong>Copyright &copy; 2022-2023 <a href="https://www.moh.gov.gr/">Υπουργείο Υγείας</a>.</strong> 
	HELP DESK

ΔΙΕΥΘΥΝΣΗΣ ΗΛΕΚΤΡΟΝΙΚΗΣ ΔΙΑΚΥΒΕΡΝΗΣΗΣ
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

  <script src="js/Chart.min.js"></script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
$(document).ready(function() {
    var doc = new jsPDF();
    $('#cmd').click(function () {
        doc.fromHTML($('#render_me').html(), 15, 15, {
            'width': 170,
        }, function () {
            doc.save('sample-file.pdf')
        });
    });
});
</script>							
									
									  
									
									 
									  

  
<script type="text/javascript">
      var ctx = document.getElementById("chartpriority").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels:<?php echo json_encode($priority); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($totalp); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
	<script type="text/javascript">
      var ctx = document.getElementById("chartcategory").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels:<?php echo json_encode($category); ?>,
                        datasets: [{
                            backgroundColor: [
                                "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e",
								"#a8a60c",
								"#f54b42"
								
                            ],
                            data:<?php echo json_encode($totalc); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
	<script type="text/javascript">
      var ctx = document.getElementById("chartstatus").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels:<?php echo json_encode($statustext); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($totals); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
	<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  })
</script>

 <style>
        .blink {
            animation: blinker 1.5s linear infinite;
            color: red;
            font-family: sans-serif;
        }
        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
		
		  .blinknew {
            animation: blinker 1.5s linear infinite;
            color: green;
			  font-weight: bold;
            font-family: sans-serif;
        }
        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
		
		  .blinkinprogress {
       
               color: #ffc107!important;
			  font-weight: bold;
            font-family: sans-serif;
        }
		
		  .blinkvisited {
    
			color: #FF0BAC!important;
			  font-weight: bold;
            font-family: sans-serif;
        }
     
     
    </style>

<script>
function clearFilters(){


     document.getElementById("category").value = "";
     document.getElementById("priority").value = "";
	 document.getElementById("subject").value = "";
	 document.getElementById("description").value = "";

 /*    jQuery('#searchByAnything').val('all');
    jQuery('#from').val('all');
	jQuery('#to').val('all');
	jQuery('#searchByCategory').val('all');
	jQuery('#searchByPriority').val('all');
	jQuery('#searchByStatus').val('all'); */
}
</script>

<script>
$(document).ready(function () {
   $('#ola').DataTable({
		  dom: 'Bfrtip',
    buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5 ]
                }
            },
			  'colvis'
        
        ],
			
       order: [[9, 'asc'], [1, 'desc']],
 "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/el.json"
        }
    });

});

</script>





<script>
$(document).ready(function () {
   $('#searched').DataTable({
		  dom: 'Bfrtip',
      buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5 ]
                }
            },
			  'colvis'
        
        ],
			
		    "responsive": true,
          order: [[9, 'asc'], [1, 'desc']],
 "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/el.json"
        }
    });

});

</script>


</body>
</html>



