<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>
  

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>
	
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
    <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->
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
    <!--  <li class="nav-item dropdown">
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
         <!-- </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
         <!--   <div class="media">
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
     <!-- <li class="nav-item dropdown">
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
    <a href="https://moh.gov.gr" class="brand-link">
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
            <h1>Χρήστες</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Αρχική</a></li>
              <li class="breadcrumb-item active">Χρήστες</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Πίνακας χρηστών</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	<table id="sample_data" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Ονοματεπώνυμο</th>
									<th>Τύπος Χρήστη</th>
									<th>PCLogin</th>
									<th>Διεύθυνση</th>
									<th>Τμήμα</th>
									<th>Γραφείο</th>
									<th>Τηλέφωνο</th>
									<th>Ημ/νια Εγγραφής</th>
									<th>Validated</th>
									<th>Εγγραφή από τον ίδιο</th>
								</tr>
							</thead>
						</table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- Bootstrap 4 -->

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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Page specific script -->




<script type="text/javascript" language="javascript">

$(document).ready(function(){
	var dataTable = $('#sample_data').DataTable({
		"processing": true,
		"serverSide": true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST",
		},
		createdRow:function(row, data, rowIndex)
		{
			$.each($('td', row), function(colIndex){
			if(colIndex == 2)
				{
					$(this).attr('data-name', 'usertype');
					$(this).attr('class', 'usertype');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				}
				
				if(colIndex == 3)
				{
					$(this).attr('data-name', 'pclogin');
					$(this).attr('class', 'pclogin');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}
				if(colIndex == 4)
				{
					$(this).attr('data-name', 'description');
					$(this).attr('class', 'description');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				}
				if(colIndex == 5)
				{
					$(this).attr('data-name', 'department');
					$(this).attr('class', 'department');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				}
				if(colIndex == 6)
				{
					$(this).attr('data-name', 'office');
					$(this).attr('class', 'office');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}
				if(colIndex == 7)
				{
					$(this).attr('data-name', 'phone');
					$(this).attr('class', 'phone');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}
					if(colIndex == 8)
				{
					$(this).attr('data-name', 'registerdate');
					$(this).attr('class', 'registerdate');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}
				if(colIndex == 9)
				{
					$(this).attr('data-name', 'validated');
					$(this).attr('class', 'validated');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				}
					if(colIndex == 10)
				{
					$(this).attr('data-name', 'selfregister');
					$(this).attr('class', 'selfregister');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}
			});
		}
	});



	$('#sample_data').editable({
		container:'body',
		selector:'td.pclogin',
		url:'update.php',
		title:'PCLogin',
		type:'POST',
		validate:function(value){
			if($.trim(value) == '')
			{
				return 'This field is required';
			}
		}
	});
	
	$('#sample_data').editable({
		container:'body',
		selector:'td.office',
		url:'update.php',
		title:'office',
		type:'POST',
		validate:function(value){
			if($.trim(value) == '')
			{
				return 'This field is required';
			}
		}
	});
	
	$('#sample_data').editable({
		container:'body',
		selector:'td.phone',
		url:'update.php',
		title:'phone',
		type:'POST',
		validate:function(value){
			if($.trim(value) == '')
			{
				return 'This field is required';
			}
		}
	});
	$('#sample_data').editable({
		container:'body',
		selector:'td.usertype',
		url:'update.php',
		title:'validated',
		type:'POST',
		datatype:'json',
		source:[{value: "admin", text: "admin"}, 
		{value: "simpleuser", text: "simpleuser"}, 
		{value: "helpdeskuser", text: "helpdeskuser"}],
		validate:function(value){
			if($.trim(value) == '')
			{
				return 'This field is required';
			}
		}
	});
	
	$('#sample_data').editable({
		container:'body',
		selector:'td.validated',
		url:'update.php',
		title:'validated',
		type:'POST',
		datatype:'json',
		source:[{value: "1", text: "ΝΑΙ"}, {value: "0", text: "ΟΧΙ"}],
		validate:function(value){
			if($.trim(value) == '')
			{
				return 'This field is required';
			}
		}
	});
	

	$('#sample_data').editable({
		container:'body',
		selector:'td.description',
		url:'update.php',
		title:'description',
		type:'POST',
		datatype:'json',
		source:[{value: "ΓΡΑΦΕΙΟ ΥΠΟΥΡΓΟΥ", text: "ΓΡΑΦΕΙΟ ΥΠΟΥΡΓΟΥ"},
{value: "ΓΡΑΦΕΙΟ ΥΦΥΠΟΥΡΓΟΥ", text: "ΓΡΑΦΕΙΟ ΥΦΥΠΟΥΡΓΟΥ"},
{value: "ΓΡΑΦΕΙΟ ΑΝΑΠΛΗΡΩΤΗ ΥΠΟΥΡΓΟΥ", text: "ΓΡΑΦΕΙΟ ΑΝΑΠΛΗΡΩΤΗ ΥΠΟΥΡΓΟΥ"},
{value: "ΓΕΝΙΚΟΣ ΓΡΑΜΜΑΤΕΑΣ ΥΓΕΙΑΣ", text: "ΓΕΝΙΚΟΣ ΓΡΑΜΜΑΤΕΑΣ ΥΓΕΙΑΣ"},
{value: "ΓΕΝΙΚΟΣ ΓΡΑΜΜΑΤΕΑΣ ΔΗΜΟΣΙΑΣ ΥΓΕΙΑΣ", text: "ΓΕΝΙΚΟΣ ΓΡΑΜΜΑΤΕΑΣ ΔΗΜΟΣΙΑΣ ΥΓΕΙΑΣ"},
{value: "ΥΠΗΡΕΣΙΑΚΟΣ ΓΡΑΜΜΑΤΕΑΣ", text: "ΥΠΗΡΕΣΙΑΚΟΣ ΓΡΑΜΜΑΤΕΑΣ"},
{value: "A. ΓΕΝ. ΔΝΣΗ ΔΙΟΙΚΗΤΙΚΩΝ ΥΠΗΡΕΣΙΩΝ ΚΑΙ ΤΕΧΝΙΚΗΣ ΥΠΟΣΤΗΡΙΞΗΣ", text: "A. ΓΕΝ. ΔΝΣΗ ΔΙΟΙΚΗΤΙΚΩΝ ΥΠΗΡΕΣΙΩΝ ΚΑΙ ΤΕΧΝΙΚΗΣ ΥΠΟΣΤΗΡΙΞΗΣ"},
{value: "Α1. ΔΝΣΗ ΑΝΘΡΩΠΙΝΟΥ ΔΥΝΑΜΙΚΟΥ ΚΑΙ ΔΙΟΙΚΗΤΙΚΗΣ ΥΠΟΣΤΗΡΙΞΗΣ", text: "Α1. ΔΝΣΗ ΑΝΘΡΩΠΙΝΟΥ ΔΥΝΑΜΙΚΟΥ ΚΑΙ ΔΙΟΙΚΗΤΙΚΗΣ ΥΠΟΣΤΗΡΙΞΗΣ"},
{value: "A2. ΔΝΣΗ ΔΙΕΘΝΩΝ ΣΧΕΣΕΩΝ", text: "A2. ΔΝΣΗ ΔΙΕΘΝΩΝ ΣΧΕΣΕΩΝ"},
{value: "ΑΥΤΟΤΕΛΗΣ ΔΝΣΗ ΗΛΕΚΤΡΟΝΙΚΗΣ ΔΙΑΚΥΒΕΡΝΗΣΗΣ", text: "ΑΥΤΟΤΕΛΗΣ ΔΝΣΗ ΗΛΕΚΤΡΟΝΙΚΗΣ ΔΙΑΚΥΒΕΡΝΗΣΗΣ"},
{value: "Α4. ΔΝΣΗ ΤΕΧΝΙΚΩΝ ΥΠΗΡΕΣΙΩΝ", text: "Α4. ΔΝΣΗ ΤΕΧΝΙΚΩΝ ΥΠΗΡΕΣΙΩΝ"},
{value: "Β. ΓΕΝ. ΔΝΣΗ ΟΙΚΟΝΟΜΙΚΩΝ ΥΠΗΡΕΣΙΩΝ", text: "Β. ΓΕΝ. ΔΝΣΗ ΟΙΚΟΝΟΜΙΚΩΝ ΥΠΗΡΕΣΙΩΝ"},
{value: "Β1. ΔΝΣΗ ΠΡΟΫΠΟΛΟΓΙΣΜΟΥ ΚΑΙ ΔΗΜΟΣΙΟΝΟΜΙΚΩΝ ΑΝΑΦΟΡΩΝ", text: "Β1. ΔΝΣΗ ΠΡΟΫΠΟΛΟΓΙΣΜΟΥ ΚΑΙ ΔΗΜΟΣΙΟΝΟΜΙΚΩΝ ΑΝΑΦΟΡΩΝ"},
{value: "Β2. ΔΝΣΗ ΟΙΚΟΝΟΜΙΚΗΣ ΕΠΟΠΤΕΙΑΣ ΦΟΡΕΩΝ ΓΕΝ. ΚΥΒΕΡΝΗΣΗΣ", text: "Β2. ΔΝΣΗ ΟΙΚΟΝΟΜΙΚΗΣ ΕΠΟΠΤΕΙΑΣ ΦΟΡΕΩΝ ΓΕΝ. ΚΥΒΕΡΝΗΣΗΣ"},
{value: "Β3. ΔΝΣΗ ΟΙΚΟΝΟΜΙΚΗΣ ΔΙΑΧΕΙΡΙΣΗΣ", text: "Β3. ΔΝΣΗ ΟΙΚΟΝΟΜΙΚΗΣ ΔΙΑΧΕΙΡΙΣΗΣ"},
{value: "Γ. ΓΕΝ. ΔΝΣΗ ΥΠΗΡΕΣΙΩΝ ΥΓΕΙΑΣ", text: "Γ. ΓΕΝ. ΔΝΣΗ ΥΠΗΡΕΣΙΩΝ ΥΓΕΙΑΣ"},
{value: "Γ1. ΔΝΣΗ ΠΡΩΤΟΒΑΘΜΙΑΣ ΦΡΟΝΤΙΔΑΣ ΥΓΕΙΑΣ", text: "Γ1. ΔΝΣΗ ΠΡΩΤΟΒΑΘΜΙΑΣ ΦΡΟΝΤΙΔΑΣ ΥΓΕΙΑΣ"},
{value: "Γ2. ΔΝΣΗ ΟΡΓΑΝΩΣΗΣ ΚΑΙ ΛΕΙΤΟΥΡΓΙΑΣ ΝΟΣΗΛΕΥΤΙΚΩΝ ΜΟΝΑΔΩΝ ΚΑΙ ΕΠΟΠΤΕΥΟΜΕΝΩΝ ΦΟΡΕΩΝ", text: "Γ2. ΔΝΣΗ ΟΡΓΑΝΩΣΗΣ ΚΑΙ ΛΕΙΤΟΥΡΓΙΑΣ ΝΟΣΗΛΕΥΤΙΚΩΝ ΜΟΝΑΔΩΝ ΚΑΙ ΕΠΟΠΤΕΥΟΜΕΝΩΝ ΦΟΡΕΩΝ"},
{value: "Γ4. ΔΝΣΗ ΑΝΘΡΩΠΙΝΟΥ ΔΥΝΑΜΙΚΟΥ ΝΟΜΙΚΩΝ ΠΡΟΣΩΠΩΝ", text: "Γ4. ΔΝΣΗ ΑΝΘΡΩΠΙΝΟΥ ΔΥΝΑΜΙΚΟΥ ΝΟΜΙΚΩΝ ΠΡΟΣΩΠΩΝ"},
{value: "Γ5. ΔΝΣΗ ΙΑΤΡΩΝ, ΕΠΙΣΤΗΜΟΝΩΝ ΚΑΙ ΕΠΑΓΓΕΛΜΑΤΙΩΝ ΥΓΕΙΑΣ", text: "Γ5. ΔΝΣΗ ΙΑΤΡΩΝ, ΕΠΙΣΤΗΜΟΝΩΝ ΚΑΙ ΕΠΑΓΓΕΛΜΑΤΙΩΝ ΥΓΕΙΑΣ"},
{value: "Γ6. ΔΝΣΗ ΝΟΣΗΛΕΥΤΙΚΗΣ", text: "Γ6. ΔΝΣΗ ΝΟΣΗΛΕΥΤΙΚΗΣ"},
{value: "Δ. ΓΕΝ. ΔΝΣΗ ΔΗΜΟΣΙΑΣ ΥΓΕΙΑΣ ΚΑΙ ΠΟΙΟΤΗΤΑΣ ΖΩΗΣ", text: "Δ. ΓΕΝ. ΔΝΣΗ ΔΗΜΟΣΙΑΣ ΥΓΕΙΑΣ ΚΑΙ ΠΟΙΟΤΗΤΑΣ ΖΩΗΣ"},
{value: "Δ1. ΔΝΣΗ ΔΗΜΟΣΙΑΣ ΥΓΕΙΑΣ", text: "Δ1. ΔΝΣΗ ΔΗΜΟΣΙΑΣ ΥΓΕΙΑΣ"},
{value: "Δ2. ΔΝΣΗ ΑΝΤΙΜΕΤΩΠΙΣΗΣ ΕΞΑΡΤΗΣΕΩΝ", text: "Δ2. ΔΝΣΗ ΑΝΤΙΜΕΤΩΠΙΣΗΣ ΕΞΑΡΤΗΣΕΩΝ"},
{value: "Δ3. ΔΝΣΗ ΦΑΡΜΑΚΟΥ", text: "Δ3. ΔΝΣΗ ΦΑΡΜΑΚΟΥ"},
{value: "ΚΕΣΥ", text: "ΚΕΣΥ"},
{value: "ΕΚΕΠΥ", text: "ΕΚΕΠΥ"},
{value: "ΠΣΕΑ", text: "ΠΣΕΑ"},
{value: "ΣΕΥΥΠ", text: "ΣΕΥΥΠ"},
{value: "ΣΧ.ΔΙΕΥΘΥΝΣΗ ΣΤΡΑΤΗΓΙΚΟΥ ΣΧΕΔΙΑΣΜΟΥ", text: "ΣΧ.ΔΙΕΥΘΥΝΣΗ ΣΤΡΑΤΗΓΙΚΟΥ ΣΧΕΔΙΑΣΜΟΥ"},
{value: "ΣΧα. ΤΜΗΜΑ ΣΤΡΑΤΗΓΙΚΟΥ ΣΧΕΔΙΑΣΜΟΥ ΠΟΛΙΤΙΚΩΝ ΥΓΕΙΑΣ", text: "ΣΧα. ΤΜΗΜΑ ΣΤΡΑΤΗΓΙΚΟΥ ΣΧΕΔΙΑΣΜΟΥ ΠΟΛΙΤΙΚΩΝ ΥΓΕΙΑΣ"},
{value: "ΣΧβ. ΤΜΗΜΑ ΕΦΑΡΜΟΓΗΣ ΚΑΙ ΣΥΝΤΟΝΙΣΜΟΥ", text: "ΣΧβ. ΤΜΗΜΑ ΕΦΑΡΜΟΓΗΣ ΚΑΙ ΣΥΝΤΟΝΙΣΜΟΥ"},
{value: "ΣΧγ. ΤΜΗΜΑ ΜΕΤΡΗΣΗΣ ΚΑΙ ΑΞΙΟΛΟΓΗΣΗΣ", text: "ΣΧγ. ΤΜΗΜΑ ΜΕΤΡΗΣΗΣ ΚΑΙ ΑΞΙΟΛΟΓΗΣΗΣ"},
{value: "ΜΟΝΑΔΑ ΕΣΩΤΕΡΙΚΟΥ ΕΛΕΓΧΟΥ", text: "ΜΟΝΑΔΑ ΕΣΩΤΕΡΙΚΟΥ ΕΛΕΓΧΟΥ"},
{value: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΔΙΑΠΟΛΙΤΙΣΜΙΚΗΣ ΦΡΟΝΤΙΔΑΣ", text: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΔΙΑΠΟΛΙΤΙΣΜΙΚΗΣ ΦΡΟΝΤΙΔΑΣ"},
{value: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΠΡΟΜΗΘΕΙΩΝ", text: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΠΡΟΜΗΘΕΙΩΝ"},
{value: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΤΟΥΡΙΣΜΟΥ ΥΓΕΙΑΣ", text: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΤΟΥΡΙΣΜΟΥ ΥΓΕΙΑΣ"},
{value: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΝΟΜΟΘΕΤΙΚΗΣ ΠΡΩΤΟΒΟΥΛΙΑΣ, ΚΟΙΝΟΒΟΥΛΕΥΤΙΚΟΥ ΕΛΕΓΧΟΥ ΚΑΙ ΚΩΔΙΚΟΠΟΙΗΣΗΣ", text: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΝΟΜΟΘΕΤΙΚΗΣ ΠΡΩΤΟΒΟΥΛΙΑΣ, ΚΟΙΝΟΒΟΥΛΕΥΤΙΚΟΥ ΕΛΕΓΧΟΥ ΚΑΙ ΚΩΔΙΚΟΠΟΙΗΣΗΣ"},
{value: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΕΠΟΠΤΕΙΑΣ ΑΝΑΠΤΥΞΗΣ ΚΑΙ ΛΕΙΤΟΥΡΓΙΑΣ Ε.Ο.Π.Υ.Υ.", text: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΕΠΟΠΤΕΙΑΣ ΑΝΑΠΤΥΞΗΣ ΚΑΙ ΛΕΙΤΟΥΡΓΙΑΣ Ε.Ο.Π.Υ.Υ."},
{value: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΠΡΟΣΤΑΣΙΑΣ ΔΙΚΑΙΩΜΑΤΩΝ ΛΗΠΤΩΝ ΥΠΗΡΕΣΙΩΝ ΥΓΕΙΑΣ", text: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΠΡΟΣΤΑΣΙΑΣ ΔΙΚΑΙΩΜΑΤΩΝ ΛΗΠΤΩΝ ΥΠΗΡΕΣΙΩΝ ΥΓΕΙΑΣ"},
{value: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΟΡΓΑΝΩΣΗΣ ΚΑΙ ΛΕΙΤΟΥΡΓΙΑΣ ΥΓΕΙΟΝΟΜΙΚΩΝ ΠΕΡΙΦΕΡΕΙΩΝ", text: "ΑΥΤΟΤΕΛΕΣ ΤΜΗΜΑ ΟΡΓΑΝΩΣΗΣ ΚΑΙ ΛΕΙΤΟΥΡΓΙΑΣ ΥΓΕΙΟΝΟΜΙΚΩΝ ΠΕΡΙΦΕΡΕΙΩΝ"},
{value: "ΑΥΤΟΤΕΛΕΣ ΓΡΑΦΕΙΟ ΥΠΕΥΘΥΝΟΥ ΠΡΟΣΤΑΣΙΑΣ ΔΕΔΟΜΕΝΩΝ", text: "ΑΥΤΟΤΕΛΕΣ ΓΡΑΦΕΙΟ ΥΠΕΥΘΥΝΟΥ ΠΡΟΣΤΑΣΙΑΣ ΔΕΔΟΜΕΝΩΝ"},
{value: "ΓΡΑΦΕΙΟ ΤΥΠΟΥ ΚΑΙ ΔΗΜΟΣΙΩΝ ΣΧΕΣΕΩΝ", text: "ΓΡΑΦΕΙΟ ΤΥΠΟΥ ΚΑΙ ΔΗΜΟΣΙΩΝ ΣΧΕΣΕΩΝ"},
{value: "ΓΡΑΦΕΙΟ ΝΟΜΙΚΟΥ ΣΥΜΒΟΥΛΟΥ", text: "ΓΡΑΦΕΙΟ ΝΟΜΙΚΟΥ ΣΥΜΒΟΥΛΟΥ"},
{value: "ΑΛΛΟ", text: "ΑΛΛΟ"}

],
		validate:function(value){
			if($.trim(value) == '')
			{
				return 'This field is required';
			}
		}
	});
	
	$('#sample_data').editable({
		container:'body',
		selector:'td.department',
		url:'update.php',
		title:'Department',
		type:'POST',
		datatype:'json',
		source:[{value: "Α1α. ΤΜΗΜΑ ΔΙΑΧΕΙΡΙΣΗΣ ΚΑΙ ΑΝΑΠΤΥΞΗΣ ΑΝΘΡΩΠΙΝΟΥ ΔΥΝΑΜΙΚΟΥ", text: "Α1α. ΤΜΗΜΑ ΔΙΑΧΕΙΡΙΣΗΣ ΚΑΙ ΑΝΑΠΤΥΞΗΣ ΑΝΘΡΩΠΙΝΟΥ ΔΥΝΑΜΙΚΟΥ"},
{value: "Α1β. ΤΜΗΜΑ ΟΡΓΑΝΩΣΗΣ ΚΕΝΤΡΙΚΗΣ ΥΠΗΡΕΣΙΑΣ ΚΑΙ ΣΥΓΚΡΟΤΗΣΗΣ ΣΥΛΛΟΓΙΚΩΝ ΟΡΓΑΝΩΝ", text: "Α1β. ΤΜΗΜΑ ΟΡΓΑΝΩΣΗΣ ΚΕΝΤΡΙΚΗΣ ΥΠΗΡΕΣΙΑΣ ΚΑΙ ΣΥΓΚΡΟΤΗΣΗΣ ΣΥΛΛΟΓΙΚΩΝ ΟΡΓΑΝΩΝ"},
{value: "Α1γ. ΤΜΗΜΑ ΠΡΩΤΟΚΟΛΛΟΥ", text: "Α1γ. ΤΜΗΜΑ ΠΡΩΤΟΚΟΛΛΟΥ"},
{value: "Α1δ. ΤΜΗΜΑ ΔΙΟΙΚΗΤΙΚΗΣ ΜΕΡΙΜΝΑΣ ΚΑΙ ΔΙΑΧΕΙΡΙΣΗΣ ΥΛΙΚΟΥ", text: "Α1δ. ΤΜΗΜΑ ΔΙΟΙΚΗΤΙΚΗΣ ΜΕΡΙΜΝΑΣ ΚΑΙ ΔΙΑΧΕΙΡΙΣΗΣ ΥΛΙΚΟΥ"},
{value: "Α1ε. ΤΜΗΜΑ ΟΡΓΑΝΩΣΗΣ,ΕΚΠΑΙΔΕΥΣΗΣ ΚΑΙ ΣΤΟΧΟΘΕΣΙΑΣ ΟΡΓΑΝΙΚΩΝ ΜΟΝΑΔΩΝ ΚΕΝΤΡΙΚΗΣ ΥΠΗΡΕΣΙΑΣ", text: "Α1ε. ΤΜΗΜΑ ΟΡΓΑΝΩΣΗΣ,ΕΚΠΑΙΔΕΥΣΗΣ ΚΑΙ ΣΤΟΧΟΘΕΣΙΑΣ ΟΡΓΑΝΙΚΩΝ ΜΟΝΑΔΩΝ ΚΕΝΤΡΙΚΗΣ ΥΠΗΡΕΣΙΑΣ"},
{value: "Α2α. ΤΜΗΜΑ ΔΙΕΘΝΩΝ ΟΡΓΑΝΙΣΜΩΝ", text: "Α2α. ΤΜΗΜΑ ΔΙΕΘΝΩΝ ΟΡΓΑΝΙΣΜΩΝ"},
{value: "Α2β. ΤΜΗΜΑ ΕΥΡΩΠΑΪΚΗΣ ΕΝΩΣΗΣ", text: "Α2β. ΤΜΗΜΑ ΕΥΡΩΠΑΪΚΗΣ ΕΝΩΣΗΣ"},
{value: "Α. ΤΜΗΜΑ ΜΗΧΑΝΟΓΡΑΦΙΚΩΝ ΥΠΟΔΟΜΩΝ", text: "Α. ΤΜΗΜΑ ΜΗΧΑΝΟΓΡΑΦΙΚΩΝ ΥΠΟΔΟΜΩΝ"},
{value: "Β. ΤΜΗΜΑ ΔΙΑΧΕΙΡΙΣΗΣ ΈΡΓΩΝ, ΤΕΧΝΟΛΟΓΙΩΝ ΠΛΗΡΟΦΟΡΙΑΣ ΚΑΙ ΕΠΙΚΟΙΝΩΝΙΩΝ", text: "Β. ΤΜΗΜΑ ΔΙΑΧΕΙΡΙΣΗΣ ΈΡΓΩΝ, ΤΕΧΝΟΛΟΓΙΩΝ ΠΛΗΡΟΦΟΡΙΑΣ ΚΑΙ ΕΠΙΚΟΙΝΩΝΙΩΝ"},
{value: "Γ. ΤΜΗΜΑ ΔΙΑΧΕΙΡΙΣΗΣ ΚΑΙ ΣΤΑΤΙΣΤΙΚΗΣ ΑΝΑΛΥΣΗΣ ΔΕΔΟΜΕΝΩΝ ΥΓΕΙΑΣ", text: "Γ. ΤΜΗΜΑ ΔΙΑΧΕΙΡΙΣΗΣ ΚΑΙ ΣΤΑΤΙΣΤΙΚΗΣ ΑΝΑΛΥΣΗΣ ΔΕΔΟΜΕΝΩΝ ΥΓΕΙΑΣ"},
{value: "Δ. ΤΜΗΜΑ ΗΛΕΚΤΡΟΝΙΚΩΝ ΥΠΗΡΕΣΙΩΝ ΥΓΕΙΑΣ", text: "Δ. ΤΜΗΜΑ ΗΛΕΚΤΡΟΝΙΚΩΝ ΥΠΗΡΕΣΙΩΝ ΥΓΕΙΑΣ"},
{value: "Α4α. ΤΜΗΜΑ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΥ ΚΑΙ ΕΠΟΠΤΕΙΑΣ ΈΡΓΩΝ", text: "Α4α. ΤΜΗΜΑ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΥ ΚΑΙ ΕΠΟΠΤΕΙΑΣ ΈΡΓΩΝ"},
{value: "Α4β. ΤΜΗΜΑ ΜΕΛΕΤΩΝ ΚΑΙ ΠΡΟΔΙΑΓΡΑΦΩΝ", text: "Α4β. ΤΜΗΜΑ ΜΕΛΕΤΩΝ ΚΑΙ ΠΡΟΔΙΑΓΡΑΦΩΝ"},
{value: "Α4γ. ΤΜΗΜΑ ΒΙΟΪΑΤΡΙΚΗΣ ΤΕΧΝΟΛΟΓΙΑΣ", text: "Α4γ. ΤΜΗΜΑ ΒΙΟΪΑΤΡΙΚΗΣ ΤΕΧΝΟΛΟΓΙΑΣ"},
{value: "Α4δ. ΤΜΗΜΑ ΑΞΙΟΠΟΙΗΣΗΣ ΠΕΡΙΟΥΣΙΑΣ ΔΗΜΟΣΙΟΥ, ΚΤΗΜΑΤΟΛΟΓΙΟΥ ΚΑΙ ΤΟΠΟΓΡΑΦΗΣΕΩΝ", text: "Α4δ. ΤΜΗΜΑ ΑΞΙΟΠΟΙΗΣΗΣ ΠΕΡΙΟΥΣΙΑΣ ΔΗΜΟΣΙΟΥ, ΚΤΗΜΑΤΟΛΟΓΙΟΥ ΚΑΙ ΤΟΠΟΓΡΑΦΗΣΕΩΝ"},
{value: "Α4ε. ΤΜΗΜΑ ΤΕΧΝΙΚΗΣ ΥΠΟΣΤΗΡΙΞΗΣ ΚΕΝΤΡΙΚΗΣ ΥΠΗΡΕΣΙΑΣ", text: "Α4ε. ΤΜΗΜΑ ΤΕΧΝΙΚΗΣ ΥΠΟΣΤΗΡΙΞΗΣ ΚΕΝΤΡΙΚΗΣ ΥΠΗΡΕΣΙΑΣ"},
{value: "Β1α. ΤΜΗΜΑ ΠΡΟΫΠΟΛΟΓΙΣΜΟΥ ΚΑΙ ΜΕΣΟΠΡΟΘΕΣΜΟΥ ΠΛΑΙΣΙΟΥ ΔΗΜΟΣΙΟΝΟΜΙΚΗΣ ΣΤΡΑΤΗΓΙΚΗΣ", text: "Β1α. ΤΜΗΜΑ ΠΡΟΫΠΟΛΟΓΙΣΜΟΥ ΚΑΙ ΜΕΣΟΠΡΟΘΕΣΜΟΥ ΠΛΑΙΣΙΟΥ ΔΗΜΟΣΙΟΝΟΜΙΚΗΣ ΣΤΡΑΤΗΓΙΚΗΣ"},
{value: "Β1β. ΤΜΗΜΑ ΔΗΜΟΣΙΟΝΟΜΙΚΩΝ ΑΝΑΛΥΣΕΩΝ ΚΑΙ ΑΝΑΦΟΡΩΝ", text: "Β1β. ΤΜΗΜΑ ΔΗΜΟΣΙΟΝΟΜΙΚΩΝ ΑΝΑΛΥΣΕΩΝ ΚΑΙ ΑΝΑΦΟΡΩΝ"},
{value: "Β2α. ΤΜΗΜΑ ΟΙΚΟΝΟΜΙΚΗΣ ΟΡΓΑΝΩΣΗΣ ΚΑΙ ΠΡΟΫΠΟΛΟΓΙΣΜΟΥ ΦΟΡΕΩΝ ΥΠΗΡΕΣΙΩΝ ΥΓΕΙΑΣ", text: "Β2α. ΤΜΗΜΑ ΟΙΚΟΝΟΜΙΚΗΣ ΟΡΓΑΝΩΣΗΣ ΚΑΙ ΠΡΟΫΠΟΛΟΓΙΣΜΟΥ ΦΟΡΕΩΝ ΥΠΗΡΕΣΙΩΝ ΥΓΕΙΑΣ"},
{value: "Β2β. ΤΜΗΜΑ ΟΙΚΟΝΟΜΙΚΗΣ ΟΡΓΑΝΩΣΗΣ ΚΑΙ ΠΡΟΫΠΟΛΟΓΙΣΜΟΥ ΕΘΝΙΚΟΥ ΟΡΓΑΝΙΣΜΟΥ ΠΑΡΟΧΗΣ ΥΠΗΡΕΣΙΩΝ ΥΓΕΙΑΣ (Ε.Ο.Π.Υ.Υ.)", text: "Β2β. ΤΜΗΜΑ ΟΙΚΟΝΟΜΙΚΗΣ ΟΡΓΑΝΩΣΗΣ ΚΑΙ ΠΡΟΫΠΟΛΟΓΙΣΜΟΥ ΕΘΝΙΚΟΥ ΟΡΓΑΝΙΣΜΟΥ ΠΑΡΟΧΗΣ ΥΠΗΡΕΣΙΩΝ ΥΓΕΙΑΣ (Ε.Ο.Π.Υ.Υ.)"},
{value: "Β3α. ΤΜΗΜΑ ΕΚΤΕΛΕΣΗΣ ΠΡΟΫΠΟΛΟΓΙΣΜΟΥ", text: "Β3α. ΤΜΗΜΑ ΕΚΤΕΛΕΣΗΣ ΠΡΟΫΠΟΛΟΓΙΣΜΟΥ"},
{value: "Β3β. ΤΜΗΜΑ ΕΦΑΡΜΟΓΗΣ ΠΡΟΓΡΑΜΜΑΤΟΣ ΔΗΜΟΣΙΩΝ ΕΠΕΝΔΥΣΕΩΝ", text: "Β3β. ΤΜΗΜΑ ΕΦΑΡΜΟΓΗΣ ΠΡΟΓΡΑΜΜΑΤΟΣ ΔΗΜΟΣΙΩΝ ΕΠΕΝΔΥΣΕΩΝ"},
{value: "Β3γ. ΤΜΗΜΑ ΜΙΣΘΟΔΟΣΙΑΣ", text: "Β3γ. ΤΜΗΜΑ ΜΙΣΘΟΔΟΣΙΑΣ"},
{value: "Β3δ. ΤΜΗΜΑ ΠΛΗΡΩΜΗΣ ΔΑΠΑΝΩΝ ΚΑΙ ΛΟΙΠΩΝ ΟΙΚΟΝΟΜΙΚΩΝ ΘΕΜΑΤΩΝ", text: "Β3δ. ΤΜΗΜΑ ΠΛΗΡΩΜΗΣ ΔΑΠΑΝΩΝ ΚΑΙ ΛΟΙΠΩΝ ΟΙΚΟΝΟΜΙΚΩΝ ΘΕΜΑΤΩΝ"},
{value: "Γ1α. ΤΜΗΜΑ ΟΡΓΑΝΩΣΗΣ ΚΑΙ ΛΕΙΤΟΥΡΓΙΑΣ ΜΟΝΑΔΩΝ ΠΡΩΤΟΒΑΘΜΙΑΣ ΦΡΟΝΤΙΔΑΣ ΥΓΕΙΑΣ ΔΗΜΟΣΙΟΥ ΤΟΜΕΑ", text: "Γ1α. ΤΜΗΜΑ ΟΡΓΑΝΩΣΗΣ ΚΑΙ ΛΕΙΤΟΥΡΓΙΑΣ ΜΟΝΑΔΩΝ ΠΡΩΤΟΒΑΘΜΙΑΣ ΦΡΟΝΤΙΔΑΣ ΥΓΕΙΑΣ ΔΗΜΟΣΙΟΥ ΤΟΜΕΑ"},
{value: "Γ1β. ΤΜΗΜΑ ΙΔΙΩΤΙΚΩΝ ΜΟΝΑΔΩΝ ΠΡΩΤΟΒΑΘΜΙΑΣ ΦΡΟΝΤΙΔΑΣ ΥΓΕΙΑΣ", text: "Γ1β. ΤΜΗΜΑ ΙΔΙΩΤΙΚΩΝ ΜΟΝΑΔΩΝ ΠΡΩΤΟΒΑΘΜΙΑΣ ΦΡΟΝΤΙΔΑΣ ΥΓΕΙΑΣ"},
{value: "Γ1γ. ΤΜΗΜΑ ΑΝΑΠΤΥΞΗΣ ΠΡΟΓΡΑΜΜΑΤΩΝ ΑΓΩΓΗΣ ΥΓΕΙΑΣ ΚΑΙ ΠΡΟΛΗΨΗΣ", text: "Γ1γ. ΤΜΗΜΑ ΑΝΑΠΤΥΞΗΣ ΠΡΟΓΡΑΜΜΑΤΩΝ ΑΓΩΓΗΣ ΥΓΕΙΑΣ ΚΑΙ ΠΡΟΛΗΨΗΣ"},
{value: "Γ1δ. ΤΜΗΜΑ ΣΤΟΜΑΤΙΚΗΣ ΥΓΕΙΑΣ ΚΑΙ ΟΔΟΝΤΙΑΤΡΙΚΗΣ ΠΕΡΙΘΑΛΨΗΣ", text: "Γ1δ. ΤΜΗΜΑ ΣΤΟΜΑΤΙΚΗΣ ΥΓΕΙΑΣ ΚΑΙ ΟΔΟΝΤΙΑΤΡΙΚΗΣ ΠΕΡΙΘΑΛΨΗΣ"},
{value: "Γ2α. ΤΜΗΜΑ ΟΡΓΑΝΩΣΗΣ, ΛΕΙΤΟΥΡΓΙΑΣ ΚΑΙ ΑΝΑΠΤΥΞΗΣ ΝΟΣΟΚΟΜΕΙΩΝ ΚΑΙ ΔΟΜΩΝ ΑΠΟΚΑΤΑΣΤΑΣΗΣ", text: "Γ2α. ΤΜΗΜΑ ΟΡΓΑΝΩΣΗΣ, ΛΕΙΤΟΥΡΓΙΑΣ ΚΑΙ ΑΝΑΠΤΥΞΗΣ ΝΟΣΟΚΟΜΕΙΩΝ ΚΑΙ ΔΟΜΩΝ ΑΠΟΚΑΤΑΣΤΑΣΗΣ"},
{value: "Γ2β. ΤΜΗΜΑ ΙΔΙΩΤΙΚΩΝ ΚΛΙΝΙΚΩΝΓ2γ. ΤΜΗΜΑ ΕΠΟΠΤΕΥΟΜΕΝΩΝ ΦΟΡΕΩΝ", text: "Γ2β. ΤΜΗΜΑ ΙΔΙΩΤΙΚΩΝ ΚΛΙΝΙΚΩΝΓ2γ. ΤΜΗΜΑ ΕΠΟΠΤΕΥΟΜΕΝΩΝ ΦΟΡΕΩΝ"},
{value: "Γ2δ. ΤΜΗΜΑ ΠΑΡΟΧΩΝ ΥΠΗΡΕΣΙΩΝ ΥΓΕΙΑΣΓ3. ΔΝΣΗ ΨΥΧΙΚΗΣ ΥΓΕΙΑΣ", text: "Γ2δ. ΤΜΗΜΑ ΠΑΡΟΧΩΝ ΥΠΗΡΕΣΙΩΝ ΥΓΕΙΑΣΓ3. ΔΝΣΗ ΨΥΧΙΚΗΣ ΥΓΕΙΑΣ"},
{value: "Γ3α. ΤΜΗΜΑ ΝΟΣΟΚΟΜΕΙΑΚΗΣ ΚΑΙ ΚΟΙΝΟΤΙΚΗΣ ΠΕΡΙΘΑΛΨΗΣ", text: "Γ3α. ΤΜΗΜΑ ΝΟΣΟΚΟΜΕΙΑΚΗΣ ΚΑΙ ΚΟΙΝΟΤΙΚΗΣ ΠΕΡΙΘΑΛΨΗΣ"},
{value: "Γ3α. ΤΜΗΜΑ ΝΟΣΟΚΟΜΕΙΑΚΗΣ ΚΑΙ ΚΟΙΝΟΤΙΚΗΣ ΠΕΡΙΘΑΛΨΗΣ", text: "Γ3α. ΤΜΗΜΑ ΝΟΣΟΚΟΜΕΙΑΚΗΣ ΚΑΙ ΚΟΙΝΟΤΙΚΗΣ ΠΕΡΙΘΑΛΨΗΣ"},
{value: "Γ3β. ΤΜΗΜΑ ΕΞΩΝΟΣΟΚΟΜΕΙΑΚΗΣ ΠΡΟΣΤΑΣΙΑΣ", text: "Γ3β. ΤΜΗΜΑ ΕΞΩΝΟΣΟΚΟΜΕΙΑΚΗΣ ΠΡΟΣΤΑΣΙΑΣ"},
{value: "Γ4α. ΤΜΗΜΑ ΙΑΤΡΩΝ ΕΘΝΙΚΟΥ ΣΥΣΤΗΜΑΤΟΣ ΥΓΕΙΑΣ", text: "Γ4α. ΤΜΗΜΑ ΙΑΤΡΩΝ ΕΘΝΙΚΟΥ ΣΥΣΤΗΜΑΤΟΣ ΥΓΕΙΑΣ"},
{value: "Γ4β. ΤΜΗΜΑ ΕΠΙΣΤΗΜΟΝΙΚΟΥ, ΝΟΣΗΛΕΥΤΙΚΟΥ ΚΑΙ ΛΟΙΠΟΥ ΠΡΟΣΩΠΙΚΟΥ", text: "Γ4β. ΤΜΗΜΑ ΕΠΙΣΤΗΜΟΝΙΚΟΥ, ΝΟΣΗΛΕΥΤΙΚΟΥ ΚΑΙ ΛΟΙΠΟΥ ΠΡΟΣΩΠΙΚΟΥ"},
{value: "Γ4γ. ΤΜΗΜΑ ΙΑΤΡΩΝ ΥΠΑΙΘΡΟΥ", text: "Γ4γ. ΤΜΗΜΑ ΙΑΤΡΩΝ ΥΠΑΙΘΡΟΥ"},
{value: "Γ4δ. ΤΜΗΜΑ ΕΙΔΙΚΕΥΟΜΕΝΩΝ ΙΑΤΡΩΝ", text: "Γ4δ. ΤΜΗΜΑ ΕΙΔΙΚΕΥΟΜΕΝΩΝ ΙΑΤΡΩΝ"},
{value: "Γ4ε. ΤΜΗΜΑ ΠΕΙΘΑΡΧΙΚΩΝ ΥΠΟΘΕΣΕΩΝ ΙΑΤΡΩΝ ΚΛΑΔΟΥ ΕΣΥ", text: "Γ4ε. ΤΜΗΜΑ ΠΕΙΘΑΡΧΙΚΩΝ ΥΠΟΘΕΣΕΩΝ ΙΑΤΡΩΝ ΚΛΑΔΟΥ ΕΣΥ"},
{value: "Γ5α. ΤΜΗΜΑ ΙΑΤΡΩΝ, ΟΔΟΝΤΙΑΤΡΩΝ ΚΑΙ ΦΑΡΜΑΚΟΠΟΙΩΝ", text: "Γ5α. ΤΜΗΜΑ ΙΑΤΡΩΝ, ΟΔΟΝΤΙΑΤΡΩΝ ΚΑΙ ΦΑΡΜΑΚΟΠΟΙΩΝ"},
{value: "Γ5β. ΤΜΗΜΑ ΕΠΙΣΤΗΜΟΝΩΝ ΚΑΙ ΕΠΑΓΓΕΛΜΑΤΙΩΝ ΥΓΕΙΑΣ", text: "Γ5β. ΤΜΗΜΑ ΕΠΙΣΤΗΜΟΝΩΝ ΚΑΙ ΕΠΑΓΓΕΛΜΑΤΙΩΝ ΥΓΕΙΑΣ"},
{value: "Γ6α. ΤΜΗΜΑ ΝΟΣΗΛΕΥΤΩΝ/ΤΡΙΩΝ", text: "Γ6α. ΤΜΗΜΑ ΝΟΣΗΛΕΥΤΩΝ/ΤΡΙΩΝ"},
{value: "Γ6β. ΤΜΗΜΑ ΜΑΙΩΝ ΚΑΙ ΕΠΙΣΚΕΠΤΩΝ/ΤΡΙΩΝ ΥΓΕΙΑΣ", text: "Γ6β. ΤΜΗΜΑ ΜΑΙΩΝ ΚΑΙ ΕΠΙΣΚΕΠΤΩΝ/ΤΡΙΩΝ ΥΓΕΙΑΣ"},
{value: "Δ1α. ΤΜΗΜΑ ΜΕΤΑΔΟΤΙΚΩΝ ΝΟΣΗΜΑΤΩΝ", text: "Δ1α. ΤΜΗΜΑ ΜΕΤΑΔΟΤΙΚΩΝ ΝΟΣΗΜΑΤΩΝ"},
{value: "Δ1β. ΤΜΗΜΑ ΜΗ ΜΕΤΑΔΟΤΙΚΩΝ ΝΟΣΗΜΑΤΩΝ ΚΑΙ ΔΙΑΤΡΟΦΗΣ", text: "Δ1β. ΤΜΗΜΑ ΜΗ ΜΕΤΑΔΟΤΙΚΩΝ ΝΟΣΗΜΑΤΩΝ ΚΑΙ ΔΙΑΤΡΟΦΗΣ"},
{value: "Δ1γ. ΤΜΗΜΑ ΥΓΙΕΙΝΗΣ ΚΑΙ ΥΓΕΙΟΝΟΜΙΚΩΝ ΕΛΕΓΧΩΝ", text: "Δ1γ. ΤΜΗΜΑ ΥΓΙΕΙΝΗΣ ΚΑΙ ΥΓΕΙΟΝΟΜΙΚΩΝ ΕΛΕΓΧΩΝ"},
{value: "Δ1δ. ΤΜΗΜΑ ΥΓΕΙΟΝΟΜΙΚΗΣ ΔΙΑΧΕΙΡΙΣΗΣ ΠΕΡΙΒΑΛΛΟΝΤΟΣ", text: "Δ1δ. ΤΜΗΜΑ ΥΓΕΙΟΝΟΜΙΚΗΣ ΔΙΑΧΕΙΡΙΣΗΣ ΠΕΡΙΒΑΛΛΟΝΤΟΣ"},
{value: "Δ1ε. ΤΜΗΜΑ ΥΓΕΙΟΝΟΜΙΚΗΣ ΔΙΑΧΕΙΡΙΣΗΣ ΑΠΟΒΛΗΤΩΝ ΜΟΝΑΔΩΝ ΥΓΕΙΑΣ ΚΑΙ ΛΟΙΠΩΝ ΠΕΡΙΒΑΛΛΟΝΤΙΚΩΝ ΚΙΝΔΥΝΩΝ", text: "Δ1ε. ΤΜΗΜΑ ΥΓΕΙΟΝΟΜΙΚΗΣ ΔΙΑΧΕΙΡΙΣΗΣ ΑΠΟΒΛΗΤΩΝ ΜΟΝΑΔΩΝ ΥΓΕΙΑΣ ΚΑΙ ΛΟΙΠΩΝ ΠΕΡΙΒΑΛΛΟΝΤΙΚΩΝ ΚΙΝΔΥΝΩΝ"},
{value: "Δ2α. ΤΜΗΜΑ ΕΞΑΡΤΗΣΙΟΓΟΝΩΝ ΟΥΣΙΩΝ", text: "Δ2α. ΤΜΗΜΑ ΕΞΑΡΤΗΣΙΟΓΟΝΩΝ ΟΥΣΙΩΝ"},
{value: "Δ2β. ΤΜΗΜΑ ΛΟΙΠΩΝ ΕΞΑΡΤΗΣΕΩΝ", text: "Δ2β. ΤΜΗΜΑ ΛΟΙΠΩΝ ΕΞΑΡΤΗΣΕΩΝ"},
{value: "Δ3α. ΤΜΗΜΑ ΦΑΡΜΑΚΟΥ", text: "Δ3α. ΤΜΗΜΑ ΦΑΡΜΑΚΟΥ"},
{value: "Δ3β. ΤΜΗΜΑ ΦΑΡΜΑΚΕΙΩΝ ΚΑΙ ΦΑΡΜΑΚΑΠΟΘΗΚΩΝ", text: "Δ3β. ΤΜΗΜΑ ΦΑΡΜΑΚΕΙΩΝ ΚΑΙ ΦΑΡΜΑΚΑΠΟΘΗΚΩΝ"},
{value: "Δ3γ. ΤΜΗΜΑ ΝΑΡΚΩΤΙΚΩΝ", text: "Δ3γ. ΤΜΗΜΑ ΝΑΡΚΩΤΙΚΩΝ"}],
		validate:function(value){
			if($.trim(value) == '')
			{
				return 'This field is required';
			}
		}
	});
});	
</script>

</body>
</html>
