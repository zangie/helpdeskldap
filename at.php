<?php
//	error_reporting(1);
session_start();
date_default_timezone_set('Europe/Athens');
error_reporting (E_ALL ^ E_NOTICE);	
 $username=$_SESSION['username'];
 $tdescription=$_SESSION['description'];
 $tdepartment=$_SESSION['department'];
 if (!isset($_SESSION["username"]))
{
    header('location:login.php');
}
//  echo  $mail=$_SESSION['mail'] . '<br>';
  // echo  $username=$_SESSION['username'] . '<br>';
/*echo  $_SESSION['samaccountname']. '<br>';
echo  $_SESSION['description']. '<br>';
echo  $_SESSION['department']. '<br>';
echo  $_SESSION['physicaldeliveryofficename']. '<br>';
echo  $_SESSION['telephonenumber']. '<br>';
echo  $_SESSION['dn']. '<br>';
echo  $_SESSION['pcaddress']. '<br>';
 */


//KILL SESSION META ΑΠΟ 10 ΛΕΠΤΑ
// inactive in seconds
/* $inactive = 600;
if( !isset($_SESSION['timeout']) )
$_SESSION['timeout'] = time() + $inactive; 

$session_life = time() - $_SESSION['timeout'];

if($session_life > $inactive)
{  session_destroy(); header("Location:login.php");     }

$_SESSION['timeout']=time(); */
/////////////// // Process the subject and problem fields

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
  // Get the values from the form

  
$displayname = $_SESSION['displayname'];
$tdescription = $_SESSION['description'];
$tdepartment = $_SESSION['department'];
$ticketnumber = uniqid("a");
$subject=  $_POST['subject'];

$creationdate = date("Y-m-d H:i:s");

$problem=  $_POST['problem'];
  
  // Check if an attachment was uploaded
  if (isset($_FILES["attachment"]) && $_FILES["attachment"]["error"] == 0) {
    // Get the file information
    $file_name = $_FILES["attachment"]["name"];
    $file_size = $_FILES["attachment"]["size"];
    $file_tmp = $_FILES["attachment"]["tmp_name"];
    $file_type = $_FILES["attachment"]["type"];
    
    // Check if the file is a PDF or DOC and is less than 5 MB
    if (($file_type == "application/pdf" || $file_type == "application/msword" || $file_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" 
	|| $file_type == "image/png"  || $file_type == "image/jpg"  || $file_type == "image/jpeg") && $file_size <= 5000000) {
      // Check if the file already exists
      $file_path = "attachments/" . $file_name;
      $i = 0;
      while (file_exists($file_path)) {
        $i++;
        $file_path = "attachments/" . $i . "-" . $file_name;
      }
      
      // Move the file to a permanent location
      move_uploaded_file($file_tmp, $file_path);
    } else {
      // Display an error message
   echo "<script type='text/javascript'>alert('Ο τύπος αρχείων που μπορείτε να αποστείλετε είναι jpg, png, pdf, doc και λιγότερο απο 5 ΜΒ ')</script>";
	 header( "refresh:0;url=add-ticket.php" );
      exit;
    }
  } else {
    // Set the file path to an empty string
    $file_path = "";
  }
   require_once "config.php";
  // Insert the data into the table
 $sql = "INSERT INTO tickets (TicketNumber, FKUserID, TDescription, TDepartment, Subject, CreationDate,   WhoOpenedIt , Attachments, Problem)
	 VALUES (('$ticketnumber') , ((select UserID from users where Username = '$username')), ('$tdescription'),('$tdepartment'),('$subject'), 
	 ('$creationdate'),   ((select UserID from users where Username = '$username')),('$file_path'), 
	 ('$problem'))";
  if ($link->query($sql) === TRUE) {
	 echo "<script type='text/javascript'>alert('Το αίτημα σας υποβλήθηκε με επιτυχία!')</script>" ;
	 header( "refresh:0;url=profile.php" );
  } else {
    echo "Error: " . $sql . "<br>" . $link->error;
  }
  
  // Close the connection
  $link->close();
}

  




  //////////////////////////



    


	
        

	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>ΔΗΜΙΟΥΡΓΙΑ ΝΕΟΥ ΑΙΤΗΜΑΤΟΣ | HELP DESK | ΔΙΕΥΘΥΝΣΗΣ ΗΛΕΚΤΡΟΝΙΚΗΣ ΔΙΑΚΥΒΕΡΝΗΣΗΣ </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
        // </div>
        // <div class="info">
          // <a href="#" class="d-block">Alexander Pierce</a>
        // </div>-->
		
		  <div class="info">
         <p style="color:white;"> Καλώς ήρθες <?php echo $username ?>
		  </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
       <!-- <div class="input-group" data-widget="sidebar-search">
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
            <h1>Νέο Αίτημα</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="profile.php">Αρχική</a></li>
              <li class="breadcrumb-item active">Νέο Αίτημα</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Αναφορά Βλάβης</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
			<form method="post" enctype="multipart/form-data">

		
			 
              <div class="form-group">
                <label for="subject">Θέμα</label>
                <input type="text" name="subject" required class="form-control" maxlength="150">
              </div>
              <div class="form-group">
                <label for="problem">Περιγραφή</label>
                <textarea name="problem" class="form-control" required rows="4"  maxlength="255"></textarea>
              </div>
			  
			 <div class="form-group">
				<span class="file-name">Εισαγωγή αρχείου.. <i>png, jpg, jpeg, doc, docx, pdf<5MB</i></span>
				<label for="file-upload"><input type="file" name="attachment" id="attachment"></label>
			</div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
		    <div class="row">
        <div class="col-12">
		
    
   <button  class="btn btn-secondary" onclick="document.getElementById('myInput').value = ''">
    Καθαρισμός
  </button>
          <input type="submit"  value="Αποστολή Αναφοράς"   name="submituser" class="btn btn-success float-right">
		  	  </form>
        </div>
      </div>
        </div>
      
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

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
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript" language="javascript">
function ClearFields() {

    // document.getElementById("category").value = "";
     //document.getElementById("priority").value = "";
	 document.getElementById("subject").value = "";
	 document.getElementById("problem").value = "";
}
</script>





</body>
</html>
