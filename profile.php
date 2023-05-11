<?php
session_start();
	error_reporting(0);
require_once "functions.php";

//KILL SESSION META ΑΠΟ 10 ΛΕΠΤΑ
// inactive in seconds
$inactive = 600;
if( !isset($_SESSION['timeout']) )
$_SESSION['timeout'] = time() + $inactive; 

$session_life = time() - $_SESSION['timeout'];

if($session_life > $inactive)
{  session_destroy(); header("Location:login.php");     }

$_SESSION['timeout']=time();
///////////////
if ((!isset($_SESSION["username"])))
{
    header('location:login.php');
}
$username = $_SESSION['username'];

$mail = $_SESSION['mail'];
$displayname = $_SESSION['displayname'];
//echo $mail;

 $pcaddress = gethostbyaddr($_SERVER['REMOTE_ADDR']) ;

//echo '<script>alert("Παρακαλούμε επιβεβαιώστε τα στοιχεία επικοινωνία σας")</script>';

	?>
	<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ΠΡΟΦΙΛ ΧΡΗΣΤΗ | HELP DESK | ΔΙΕΥΘΥΝΣΗΣ ΗΛΕΚΤΡΟΝΙΚΗΣ ΔΙΑΚΥΒΕΡΝΗΣΗΣ </title>

  <!-- Google Font: Source Sans Pro -->
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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
          <!--  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>-->
      </li>
      <li class="nav-item d-none d-sm-inline-block">
       <!-- <a href="../../index3.html" class="nav-link">Αρχική</a>-->
      </li>
      <li class="nav-item d-none d-sm-inline-block">
         <!--   <a href="#" class="nav-link">Επικοινωνία</a>-->
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
        <!--  <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
       <!--   <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
              <!--  <div class="media">
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
             <!--   <div class="media">
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
      </li>-->
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
        // </div>-->
      
       
		  <div class="info">
         <p style="color:white;"> Καλώς ήρθες <?php echo $username ?>
		  </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
     <!--   <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>-->
      </div>

      <!-- Sidebar Menu -->
     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="profile.php" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Προφίλ Χρήστη
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="add-ticket.php" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Αναφορά βλάβης

                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
		  <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                Αίτημα Εξοπλισμού

                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>-->
		  
		  
		  
		  
		  <li class="nav-item">
            <a href="logout.php" class="nav-link">
              
              <p><i class="icon-signout"></i>

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
            <h1> Προφίλ </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Αρχική</a></li>
              <li class="breadcrumb-item active"> Προφίλ Χρήστη</li>
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



            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Τα στοιχεία μου</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <div class="row">
			  <div class="col-sm-4">
                <strong><i class="fas fa-user"></i> Όνομα </strong>

                <p class="text-muted">
			
               <?php  echo  $displayname ;?>	
                </p></div>

          
				<div class="col-sm-4">
                <strong><i class="fas fa-desktop"></i> Σύνδεση από :</strong>

                <p class="text-muted"><?php echo  $pcaddress. '<br>'?></p>
				
				</div>
				
				</div>

                <hr>

                <strong><i class="fas fa-vacard-o"></i> Στοιχεία</strong>

                <p class="text-muted">
				
				
				
				
				
				
				<div class="row">
				<?php
				  require_once "config.php";
                    
                    // Attempt select query execution

                    $sql = 'SELECT * FROM users where Username = "' . $username . '"';
 'and DisplayName = ' . $displayname . '"';
                    if($result = mysqli_query($link, $sql)){
								
                        if(mysqli_num_rows($result) > 0){
						
							
						
                                while($row = mysqli_fetch_array($result)){
                                    
	echo ' <div class="col-sm-2"><span class="tag tag-danger"><i class="fas fa-envelope-open"></i> Mail: </span> </br><b>'. $row['Mail'] . "</b></div>";
	echo ' <div class="col-sm-2"><span class="tag tag-primary"><i class="fas fa-phone"></i> Τηλέφωνο:</span> </br><b>'. $row['Phone'] . "</b></div>"; 
	echo ' <div class="col-sm-3"><span class="tag tag-success"><i class="fas fa-sitemap"></i> Διεύθυνση: </span> </br><b>' . $row['Description'] . "</b></div>";
	echo ' <div class="col-sm-3"><span class="tag tag-info"><i class="fas fa-desktop"></i> Τμήμα: </span></br><b>'. $row['Department'] . "</b></div>";
	echo ' <div class="col-sm-1"><span class="tag tag-warning"><i class="fas fa-door-open"></i> Γραφείο: </span></br><b>' . $row['Office'] . "</b></div>"; 
								}
						}
					
									
									}?>
                            
								 
							  
                          
                  
			
            
				  
				  </div>
                </p>

<!-- Edit Modal HTML -->

<!------------------------------------------------>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Σημείωση</strong>
	<?Php 
			 $sql = 'SELECT * FROM users where Validated="1" and Username = "' . $username . '"';
 'and DisplayName = ' . $displayname . '"';
                    if($result = mysqli_query($link, $sql)){
								
                        if(mysqli_num_rows($result) > 0){
							    while($row = mysqli_fetch_array($result)){
							echo "<br>Τα στοιχεία σας είναι επικαιροποιημένα!";
							}
								  
                            // Free result set
                            mysqli_free_result($result);
                        } else echo "<br>Τα στοιχεία σας δεν είναι επικαιροποιημένα!";
					}
						?>
                <p class="text-muted"></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
		  
		  
		         <div class="col-lg-12">



            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Τα ticket μου</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               	<?Php 
			
$sql='select TicketID from tickets inner join users on FKUserID=UserID where  Username = "' . $username . '"';

				if ($result=mysqli_query($link,$sql))
							{
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
  ?>
                
			<div class="row">
						<!--<div class="col-lg-3 col-6">

						<div class="small-box bg-info">
						<div class="inner">
						<h3><?php echo $rowcount; ?></h3>   
						<p>Όλα</p>
						</div>
						<div class="icon">
						<i class="fas fa-ticket"></i>						
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
						</div>
						<?php // Free result set
										mysqli_free_result($result);
										}
										//mysqli_close($con);
					?>
	<?Php 
			
$sql='select TicketID from tickets inner join users on FKUserID=UserID where FKStatus="0" and    Username = "' . $username . '"';

				if ($result=mysqli_query($link,$sql))
							{
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
  ?>
						<div class="col-lg-3 col-6">

						<div class="small-box bg-success">
						<div class="inner">
						<h3><?php echo $rowcount; ?></h3>
						<p>Ανοιχτά</p>
						</div>
						<div class="icon">
						<i class="ion ion-stats-bars"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
						</div>
						<?php // Free result set
										mysqli_free_result($result);
										}
										//mysqli_close($con);
					?>

<?Php 
			
$sql='select TicketID from tickets inner join users on FKUserID=UserID where FKStatus="1" and   Username = "' . $username . '"';

				if ($result=mysqli_query($link,$sql))
							{
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
  ?>

						<div class="col-lg-3 col-6">

						<div class="small-box bg-warning">
						<div class="inner">
						<h3><?php echo $rowcount; ?></h3>
						<p>Έχουν απαντηθεί</p>
						</div>
						<div class="icon">
						<i class="ion ion-person-add"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
						</div>
						<?php // Free result set
										mysqli_free_result($result);
										}
										//mysqli_close($con);
					?>


<?Php 
			
$sql='select TicketID from tickets inner join users on FKUserID=UserID where FKStatus="5" and    Username = "' . $username . '"';

				if ($result=mysqli_query($link,$sql))
							{
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
  ?>
						<div class="col-lg-3 col-6">

						<div class="small-box bg-danger">
						<div class="inner">
						<h3><?php echo $rowcount; ?></h3>
						<p>Κλειστά</p>
						</div>
						<div class="icon">
						<i class="ion ion-pie-graph"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
						</div> 

<?php // Free result set
										mysqli_free_result($result);
										}
									//	mysqli_close($con);
					?>

					</div>
               
                
				<ul>
				  </ul>
                </p>

                <hr>
 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Τα αιτήματα μου</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>TicketNo</th>
                    <th>Θέμα</th>
					
					<th>Περιγραφή</th>
                    <!-- <th>Απάντηση</th>-->
                    <th>Κατάσταση</th>
					
                    <th>Δημιουργήθηκε</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
				  <?php 				  
				   $sql = 'SELECT * FROM tickets join users on FKUserID=UserID  left join status on FKStatus=StatusID  where  Username = "' . $username . '"';
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
										
						
                                while($row = mysqli_fetch_array($result)){
									$_GET['TicketNumber'];
								
									echo "<td> <a href=ticketdetails.php?". $row['TicketNumber'] .">". $row['TicketNumber'] . "</a></td>";
									
								//	echo "<a href='".$link_address."'>Link</a>";
									echo "<td> ". $row['Subject'] . "</td>";
									//echo "<td> ". $row['Category'] . "</td>";
									echo "<td> ". $row['Problem'] . "</td>";
									//echo "<td> ". $row['Reply'] . "</td>";
									echo "<td> ". $row['StatusText'] . "</td>";
								//	echo "<td> ". $row['Priority'] . "</td>";
									echo "<td> ". $row['CreationDate'] . "</td> </tr>";
                                      
                                }
                            
								 
							  
                            // Free result set
                            mysqli_free_result($result);
                        }
					}
				  ?>
                  
                 
      
                  </tfoot>
                </table>
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



            <!-- About Me Box -->
            <!--<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Τα αιτήματα εξοπλισμού μου</h3>
              </div>
              <!-- /.card-header -->
            <!--   <div class="card-body">
                <strong><i class="fas fa-user"></i> Όνομα </strong>

                <p class="text-muted">
			
               <?php  echo  $_SESSION['displayname'];?>	
                </p>

                <hr>

                <strong><i class="fas fa-desktop"></i> Σύνδεση από :</strong>

                <p class="text-muted"><?php echo $_SESSION['pcaddress']. '<br>'?></p>

                <hr>

                <strong><i class="fas fa-vacard-o"></i> Στοιχεία</strong>

                <p class="text-muted">
				<ul>
                  <li><span class="tag tag-danger"><i class="fas fa-envelope-open"></i> Mail: </span> <?php  echo  $_SESSION['mail'] . '<br>';?>		</li>
                  <li><span class="tag tag-success"><i class="fas fa-sitemap"></i> Διεύθυνση: </span> <?php echo  $_SESSION['description']. '<br>';?> </li>
                  <li><span class="tag tag-info"><i class="fas fa-desktop"></i> Τμήμα: </span>   <?php echo  $_SESSION['department']. '<br>';?>      </li>
                  <li><span class="tag tag-warning"><i class="fas fa-building"></i> Γραφείο: </span> <?php echo  $_SESSION['physicaldeliveryofficename']. '<br>';?>   </li>
                  <li><span class="tag tag-primary"><i class="fas fa-phone"></i> Τηλέφωνο:</span> <?php echo  $_SESSION['telephonenumber']. '<br>'; ?>   </li>
				  </ul>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div> -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

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

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
</head>
		
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	$('#editEmployeeModal').modal('show')

</script>	

<script type="application/javascript">

Morris.Donut({
  element: 'new',
   data: [{
      label: "Ποσοστό",
      value: 65,
	  color: "#14A76C"
   },{
      label: "Ποσοστό",
      value: 25,
	   color: "#d6dadc"
   }]
});
  
Morris.Donut({
  element: 'replied',
  data: <?php echo json_encode($json_datareplied)?>
   
  });

</script>

<?php  ?>
									  
<script>
//datatable tickets paging ordering etc
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>



