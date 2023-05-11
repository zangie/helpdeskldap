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
$mysqli->query("UPDATE tickets SET FKStatus=2 ,WasLate=1 where TicketID = ".$row['TicketID']);

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
$οmysqli->query("UPDATE othertickets SET OFKStatus=2 ,OWasLate=1 where OTicketID = ".$row['OTicketID']);

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
  <title>ΠΡΟΦΙΛ ΧΡΉΣΤΗ | HELP DESK | ΔΙΕΥΘΥΝΣΗΣ ΗΛΕΚΤΡΟΝΙΚΗΣ ΔΙΑΚΥΒΕΡΝΗΣΗΣ </title>

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
		

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>
		

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
      <!-- Notifications Dropdown Menu -->
    <!--  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
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
            <h1>ΣΤΑΤΙΣΤΙΚΑ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Αρχική</a></li>
              <li class="breadcrumb-item active"> ΣΤΑΤΙΣΤΙΚΑ</li>
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
			
$sql='select * from ((select TicketNumber , FKStatus as FKStatus from tickets) union (select OTicketNumber, OFKStatus as FKStatus from othertickets)) ola  where FKStatus="7"';

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
		<?Php 
			
$sql='select sum(Tickets)as Tickets from ((select count(TicketNumber) as Tickets , WasLate as WasLate 
from tickets where WasLate=1 group by WasLate ) union (select count(OTicketNumber) as Tickets, OWasLate as WasLate from othertickets where OWasLate=1 group by WasLate)) waslate';

				if ($result=mysqli_query($link,$sql))
							{
  // Return the number of rows in result set
  while($row = mysqli_fetch_array($result)){
  
  ?>	
						<div class="col-lg-2 col-6">

						<div class="small-box bg-danger disabled color-palette">

						<div class="inner">
						<h3 style="text-align:center"><?php echo $row['Tickets']; ?></h3>
						<p>Αριθμός καθυστερημένων</p>
						<br>	<br>
						</div>
						<div class="icon">
						<i class="ion ion-stats-bars"></i>
						</div>
					
						</div>
						</div>
						<?php // Free result set
  }
										mysqli_free_result($result);
										}
										//mysqli_close($con);
					?>

					</div>
					
					<div class="row">
					
					    <div style="width:30%;hieght:20%;text-align:center">
						<h3>Προτεραιότητα</h3>
								  <canvas  id="chartpriority" ></canvas> 
</div>
<?php
							$con  = mysqli_connect("localhost","root","arstl1719","atest");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="Select sum(totalp) as totalp, Priority from( 
		 ( select count(Priority) as totalp, Priority as Priority from tickets group by Priority)
		 union (select count(OPriority) as totalp, OPriority as Priority from othertickets group by OPriority)) t 
		 group by Priority";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $totalp[]  = $row['totalp'];
            $priority[] = $row['Priority'];
        }
 
 
 }				?>

					    <div style="width:30%;hieght:20%;text-align:center">
						<h3>Κατηγορία</h3>
								  <canvas  id="chartcategory" ></canvas> 
</div>
<?php
							$con  = mysqli_connect("localhost","root","arstl1719","atest");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="Select sum(totalc) as totalc, Category from( 
		 ( select count(Category) as totalc, Category as Category from tickets group by Category)
		 union 
		 ( select count(OCategory) as totalc, OCategory as Category from othertickets group by Category)) t 
		 group by Category;";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $totalc[]  = $row['totalc'];
            $category[] = $row['Category'];
        }
 
 
 }
 
								?>

 <div style="width:30%;hieght:20%;text-align:center">
						<h3>Κατάσταση</h3>
								  <canvas  id="chartstatus" ></canvas> 
</div>
							
 
									<?php
							$con  = mysqli_connect("localhost","root","arstl1719","atest");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="select sum(totals) as totals, statustext from (
		 (select count(fkstatus) as totals, statustext as statustext from tickets join status on fkstatus=statusid group by fkstatus , statustext)
		 UNION 
		 (select count(ofkstatus) as totals, statustext as statustext from othertickets join status on ofkstatus=statusid group by ofkstatus , statustext)) t 
		 group by statustext;";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $totals[]  = $row['totals'];
            $statustext[] = $row['statustext'];
        }
 
 
 }				?>
 
  <div style="width:30%;hieght:20%;text-align:center">
  <h3>Αριθμός Tickets που ανοίχτηκαν ΑΝΑ Τύπο Χρήστη</h3>
 <canvas  id="chartjs_bar"></canvas> 
</div>
	<?php
							$con  = mysqli_connect("localhost","root","arstl1719","atest");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT sum(TicketID) as TicketPerUsertype, UserType FROM
		 ((select count(TicketNumber) as TicketID , UserType
		 from tickets left join Users on WhoOpenedIt=UserID group by UserType ) 
		 UNION (select count(OTicketNumber) as TicketID , UserType 
		 from othertickets left join Users on OWhoOpenedIt=UserID group by UserType )) 
		 anaomadaxriston group by Usertype;";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $usertype[]  = $row['UserType']  ;
            $ticketsperusertype[] = $row['TicketPerUsertype'];
        }
 
 
 }
 
 
			?>
			
			
			
			 <div style="width:30%;hieght:20%;text-align:center">
  <h3>Αριθμός Tickets που ανοίχτηκαν ΑΝΑ Μήνα</h3>
 <canvas  id="anamina"></canvas> 
</div>
	<?php
							$con  = mysqli_connect("localhost","root","arstl1719","atest");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="select sum(Tickets) as Tickets, Month from (
  (SELECT MONTH(CreationDate) as Month , COUNT(CreationDate) as Tickets
FROM tickets
WHERE CreationDate >= NOW() - INTERVAL 1 YEAR
GROUP BY MONTH(CreationDate))
                union 
  (SELECT MONTH(OCreationDate) as Month , COUNT(OCreationDate) as Tickets 
FROM othertickets
WHERE OCreationDate >= NOW() - INTERVAL 1 YEAR
GROUP BY MONTH(OCreationDate))) ticketspermonth group by Month";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
   $ticketspermonth[] = $row['Tickets'];
            //$month[]  = date("F", strtotime("y-".$row['Month']."-01"));
          $dateObj   = DateTime::createFromFormat('!m', $row['Month']);
$month[] = $dateObj->format('F');
        }
 
 
 }
 
 
			?>
 	
			 <div style="width:30%;hieght:20%;text-align:center">
  <h3>Αριθμός Tickets που ανοίχτηκαν ΑΝΑ Μέρα (για τον τρέχοντα μήνα)</h3>
 <canvas  id="anamera"></canvas> 
</div>
	<?php
							$con  = mysqli_connect("localhost","root","arstl1719","atest");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
	 
$currentMonth = date("m");
$currentYear = date("Y");


// Create an array to hold the ticket counts for each day of the month
$ticketCounts = array();

// Loop through each day of the month and get the ticket count for that day
for ($day = 1; $day <= 31; $day++) {
  $sql = "select sum(Tickets) as Tickets from   (
  (SELECT COUNT(*) AS Tickets FROM tickets 
  WHERE DAY(creationdate) = $day AND MONTH(creationdate) = $currentMonth 
  AND YEAR(creationdate) = $currentYear)
  union 
  (SELECT COUNT(*) AS Tickets FROM othertickets 
  WHERE DAY(ocreationdate) = $day AND MONTH(ocreationdate) = $currentMonth 
  AND YEAR(ocreationdate) = $currentYear)) anamina
  ";
  
  
  $result = $link->query($sql);
  $row = $result->fetch_assoc();
  $ticketCounts[$day] = $row['Tickets'];
}
 }

// Close the database connection

?>




 
					</div>
				<ul>
				  </ul>
                </p>
</div>
                <hr>
   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Στατιστικά</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			
				 <div class="table-responsive" >
		<div class="row">
		
		<div class="col-lg-6">
		<h2 style="text-align:center">Αριθμός Tickets ΑΝΑ Διεύθυνση</h2>
		<table id="perdescription"class="table table-bordered table-hover">
	
                        <thead>  
                            <tr>
								<th>Αριθμός Ticket</th>
					
					<th>Διεύθυνση</th>
					
					
				
                     
						</tr></thead>  
        <tbody>
				 
		
			  <?php
			        $sql = "SELECT *
FROM (
  SELECT COUNT(TicketID) AS TicketID, TDescription AS Description 
  FROM tickets
  LEFT JOIN users ON UserID = FKUserID
  GROUP BY TDescription
  UNION
  SELECT COUNT(OTicketID) AS TicketID, 
         (SELECT OnomaDiefth FROM diefthinseismakedonias WHERE DMID = ODescription) AS Description
  FROM othertickets
  GROUP BY Description
) perdescription ";
 if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
								
				echo "<tr><td><a href='ticketsperdep.php?dept=" . $row['Description']  . "'>" . $row["TicketID"] . "</a></td>";
						
		//	echo '<td>'. $row["TicketID"] . '</a></td>';
			echo "<td> ". $row['Description'] . "</td>";
			echo " </tr>";						
                                      
                                }                            
                            // Free result set
                            mysqli_free_result($result);
                        }
						
					}
                        ?>
					

			
   </tbody>  		 
                    </table>	
		
		
		</div>
		
		<div class="col-lg-6">
		<h2 style="text-align:center">Αριθμός Tickets ΑΝΑ Κατηγορία</h2>
		<table id="percategory"class="table table-bordered table-hover">
	
                        <thead>  
                            <tr>
					<th>Αριθμός Ticket</th>
					<th>Κατηγορία</th>
					
					
				
                     
						</tr></thead>  
        <tbody>
				 
		
			  <?php
			        $sql = "Select sum(totalcategory) as totalcategory, Category from( 
		 ( select count(Category) as totalcategory, Category as Category from tickets group by Category)
		 union 
		 ( select count(OCategory) as totalcategory, OCategory as Category from othertickets group by Category)) t 
		 group by Category;";
 if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
								
										
			echo '<tr><td>'. $row["totalcategory"] . '</a></td>';
			echo "<td> ". $row['Category'] . "</td>";
			echo " </tr>";						
                                      
                                }                            
                            // Free result set
                            mysqli_free_result($result);
                        }
						
					}
                        ?>
					

			
   </tbody>  		 
                    </table>	
		
		
		</div>
		
		<div class="col-lg-6">
		<h2 style="text-align:center">Αριθμός Tickets ΑΝΑ Ανάθεση</h2>
		<table id="perassign"class="table table-bordered table-hover">
	
                        <thead>  
                            <tr>
					<th>Αριθμός Ticket</th>
					<th>Ανάθεση</th>
					
					
				
                     
						</tr></thead>  
        <tbody>
				 
		
			  <?php
			        $sql = "Select sum(TicketID) as TicketID, Displayname as DisplayName from  ((select count(FKTicketID)as TicketID, DisplayName as DisplayName 
					from assign left join users on UserID=AFKUserID group by DisplayName)
					UNION 
					(select count(OFKTicketID)as TicketID, DisplayName as DisplayName 
					from assignforothertickets left join users on OAFKUserID=UserID group by DisplayName)) perassign group by DisplayName";
 if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
								
										
			echo '<tr><td>'. $row["TicketID"] . '</a></td>';
			echo "<td> ". $row['DisplayName'] . "</td>";
			echo " </tr>";						
                                      
                                }                            
                            // Free result set
                            mysqli_free_result($result);
                        }
						
					}
                        ?>
					

			
   </tbody>  		 
                    </table>	
		
		
		</div>
		
			<div class="col-lg-6">
		<h2 style="text-align:center">Κλείσιμο ticket ανά Χρήστη</h2>
		<table id="perclosure"class="table table-bordered table-hover">
	
                        <thead>  
                            <tr>
					<th>Αριθμός Ticket</th>
					<th>Χρήστης</th>
					
					
				
                     
						</tr></thead>  
        <tbody>
				 
		
			  <?php
			        $sql = "Select sum(TicketID) as TicketID, Displayname as DisplayName from ((select count(FKTicketID)as TicketID, DisplayName as DisplayName
					from replies left join users on UserID=FKAdminID where PrefilledText='Το αίτημα σας έχει ολοκληρωθεί. (Closed)' group by DisplayName)
					UNION 
					(select count(OFKTicketID)as TicketID, DisplayName as DisplayName 
					from otherreplies left join users on OFKAdminID=UserID where OPrefilledText='Το αίτημα σας έχει ολοκληρωθεί. (Closed)' group by DisplayName)) perclosure group by DisplayName";
 if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
								
										
			echo '<tr><td>'. $row["TicketID"] . '</a></td>';
			echo "<td> ". $row['DisplayName'] . "</td>";
			echo " </tr>";						
                                      
                                }                            
                            // Free result set
                            mysqli_free_result($result);
                        }
						
					}
                        ?>
					

			
   </tbody>  		 
                    </table>	
		
		
		</div>
   
				</div>	 
			                
                 
      
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/locale/el.js"></script>


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
                    type: 'doughnut',
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
								"#f54b42",
								"#343a40"
								
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
                               "#343a40",
                                "#dc3545",
                                "#28a745",
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
   $('#perdescription').DataTable({
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
                    columns: [ 0, 1]
                }
            },
			  'colvis'
        
        ],
			
       order: [ [1, 'asc']],
 "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/el.json"
        }
    });

});


</script>

<script>
$(document).ready(function () {
    $('#perassign').DataTable({
		    "responsive": true,
        order: [[1, 'asc']],
		 pageLength : 8,
		"language": {
            "lengthMenu": "Αποτελέσματα _MENU_ ανά σελίδα",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
			"Search": "Αναζήτηση"
			
        }
    });

});

</script>

<script>
$(document).ready(function () {
    $('#perclosure').DataTable({
		    "responsive": true,
        order: [[1, 'asc']],
		 pageLength : 8,
		"language": {
            "lengthMenu": "Αποτελέσματα _MENU_ ανά σελίδα",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
			"Search": "Αναζήτηση"
			
        }
    });

});

</script>


<script>
$(document).ready(function () {
    $('#percategory').DataTable({
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
                    columns: [ 0, 1]
                }
            },
			  'colvis'
        
        ],
			
       order: [ [1, 'asc']],
 "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/el.json"
        }
    });

});

</script>

<script>
$(document).ready(function () {
    $('#ektosupourgeiou').DataTable({
		    "responsive": true,
        order: [[3, 'desc']],
		"language": {
            "lengthMenu": "Αποτελέσματα _MENU_ ανά σελίδα",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
			"Search": "Αναζήτηση"
			
        }
    });

});

</script>

<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($usertype); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750"
                              
                            ],
                            data:<?php echo json_encode($ticketsperusertype); ?>,
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
      var ctx = document.getElementById("anamina").getContext('2d');
                var myChart = new Chart(ctx, {
					
                    type: 'pie',
					
                    data: {
                        labels:<?php echo json_encode($month); ?>,
                        datasets: [{
                            backgroundColor: [
								"#5969ff",
                                "#ff407b",
								"#ffc107",
								"#28a745",
								"#6c757d",
								"#20c997",								
								"#ffc107",
								"#6610f2",
								"#007bff",
								"#dc3545",
								"#fd7e14",
								"#007bff",
                        
                            ],
                            data:<?php echo json_encode($ticketspermonth); ?>,
							  locale: 'el-GR' // Set the chart locale to Greek language
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
    // Get the ticket counts from PHP and store them in a JavaScript variable
var ticketCounts = <?php echo json_encode($ticketCounts); ?>;

// Extract the ticket counts and day numbers into separate arrays for charting
var countData = [];
var dayLabels = [];

for (var day = 1; day <= 31; day++) {
  countData.push(ticketCounts[day] || 0);
  dayLabels.push(day);
}


// Create the chart using Chart.js
var ctx = document.getElementById('anamera').getContext('2d');
var chart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: dayLabels,
    datasets: [{
      label: 'Πλήθος Αιτημάτων ανά Μέρα',
      data: countData,
     backgroundColor: [
                               "#5969ff",
                                "#ff407b"
                        
                            ],
      borderColor: 'rgba(255, 99, 132, 1)',
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
    </script>
</body>
</html>



