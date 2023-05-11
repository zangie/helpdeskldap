
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


// Connect to your MySQL database
// ...

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
            <h1>Tickets ΑΝΑ Διεύθυνση
</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Αρχική</a></li>
              <li class="breadcrumb-item active">Tickets ΑΝΑ Διεύθυνση</li>
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
                <h3 class="card-title"> Διεύθυνση: <?php 
				$department_name = $_GET["dept"];
				echo $_GET["dept"]?> </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <table id="perdescription"class="table table-bordered table-hover">
	
                        <thead>  
                            <tr>
								<th>Πλήθος</th>
								<th>Κατηγορία</th>
						
					
					
					
					
				
                     
						</tr></thead>  
        <tbody>
		<?php 
// Query the "tickets" table to retrieve the ticket data for the selected department
$sql = "select * from ((SELECT count(TicketID) as TicketNumber, Category  as Catecory FROM tickets WHERE TDescription = '$department_name' group by Category )
UNION
(SELECT count(OTicketID) as TicketNumber, OCategory as Catecory  FROM othertickets WHERE ODescription = '$department_name' group by OCategory )) perdescription";
$result = $link->query($sql);

if ($result->num_rows > 0) {


    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>";
echo   $row["TicketNumber"] ;
		echo "</td><td>" . $row["Catecory"] . "</td></tr>";
    }

  //  echo "</table>";
} else {
    echo "0 results";
}

// Close the MySQL connection
// ...
?>

 </tbody>  		 
                    </table>	
		
		
		</div>
		</div>
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
			
		    "responsive": true,
      
 "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/el.json"
        }
    });

});

</script>


</body>
</html>