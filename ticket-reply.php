<?php
session_start();
	error_reporting(0);
	date_default_timezone_set('Europe/Athens');
	  $username=$_SESSION['username'];
	  if (!isset($_SESSION["username"]))
{
    header('location:login.php');
}
/* echo  $mail=$_SESSION['mail'] . '<br>';
echo  $_SESSION['displayname']. '<br>';
echo  $_SESSION['description']. '<br>';
echo  $_SESSION['department']. '<br>';
echo  $_SESSION['pcaddress']. '<br>';
echo  $_SESSION['telephonenumber']. '<br>';
echo  $_SESSION['office']. '<br>'; 
*/
require_once "config.php";

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

$displayname = $_SESSION['displayname'];
$mail= $_SESSION['mail'];
$usertype= $_SESSION['usertype'];
echo $usertype;
$ticketnumber = $_SERVER['QUERY_STRING'];

//echo $username;
$creationdate = date("Y-m-d H:i:s");




?>
	<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ΠΡΟΦΙΛ ΧΡΉΣΤΗ | HELP DESK | ΔΙΕΥΘΥΝΣΗΣ ΗΛΕΚΤΡΟΝΙΚΗΣ ΔΙΑΚΥΒΕΡΝΗΣΗΣ </title>

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
   <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <!--  <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Αρχική</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Επικοινωνία</a>
      </li>-->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
   <!--   <li class="nav-item">
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
     <!-- <li class="nav-item dropdown">
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
       <!--   </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
           <!-- <div class="media">
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
       <!--<div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

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
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Αρχική</a></li>
              <li class="breadcrumb-item active">Απάντηση σε Ticket</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" id='simpleuser'>
      <div class="container-fluid">
        <div class="row">
        
		  
		         <div class="col-lg-12">



            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Αίτημα με αριθμό : <?php echo $ticketnumber;?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <?php
                $sql = 'select * from ((select TicketNumber as TicketNumber, TDescription,TDepartment,   Mail as Mail, Subject as Subject , Problem as Problem ,Attachments as Attachments, EstimatedTime as EstimatedTime, 
				Department as Department,
		CreationDate as CreationDate, (SELECT StatusText from Status where StatusID=FKStatus) status,(SELECT StatusID from Status where StatusID=FKStatus) statusid,
		Category as Category, OtherCategory as OtherCategory, DisplayName as DisplayName, (SELECT Usertype from users where WhoOpenedIt=UserID) Usertype,
		Description as Description, Priority as Priority, SpentTime as SpentTime, DeadLine as DeadLine, PCLogin as PCLogin,
		Phone as Phone, Office as Office, (SELECT DisplayName from users where WhoOpenedIt=UserID) WhoOpenedIt 
		from tickets left join users on FKUserID=UserID )
		UNION
		(select OTicketNumber as TicketNumber,ODescription,ODepartment,  OMail as Mail, OSubject as Subject, OProblem as Problem,OAttachments as Attachments , OEstimatedTime as EstimatedTime, ODepartment as Department,
		OCreationDate as CreationDate, 
 (SELECT StatusText from Status where StatusID=OFKStatus) status,(SELECT StatusID from Status where StatusID=OFKStatus) statusid,
 OCategory as Category, OOtherCategory as OtherCategory, ODisplayName as DisplayName, 
 (SELECT Usertype from users where OWhoOpenedIt=UserID) Usertype, 
 ODescription as Description,OPriority as Priority, OSpentTime as SpentTime, ODeadLine as DeadLine, OPCLogin as PCLogin,
 OPhone as Phone, OOffice as Office,   (SELECT DisplayName from users where OWhoOpenedIt=UserID) OWhoOpenedIt 
 from othertickets )) ola where TicketNumber= "'.$ticketnumber.'"';
				
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
							
										
						
                                while($row = mysqli_fetch_array($result)){
									
									?>
									
									 <div class="row">
				
					<div class="col-12 ">
                  <div class="info-box bg-light">
				  
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Χρήστης</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $_GET['DisplayName']=$row['DisplayName'];?></span>					
                    </div>
					 <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Email:</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $_GET['SimpleUserMail']=$row['Mail'];?></span>
                    </div>
					 <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Τηλέφωνο:</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $_GET['Phone']=$row['Phone'];?></span>
                    </div>
					 <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Διεύθυνση</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $_GET['TDescription']=$row['TDescription'];?></span>
                    </div>
					
					<div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Τμήμα</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['TDepartment'];?></span>
                    </div>
					
					<div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Γραφείο</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $_GET['Office']=$row['Office'];?></span>
                    </div>
					
					 <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Υπολογιστής:</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['PCLogin'];?></span>
                    </div>
					
              
				</div>
				</div>

                </div>
				<div class="row ">
				 <div class="col-12 ">
				 
				 
                  <div class="info-box bg-light">
				  
				  
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Θέμα</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['Subject'];?></span>					
                    </div>
					
					
					
					<div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Κατηγορία</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['Category'];?></span>
                    <span class="info-box-number text-center text-muted mb-0"><?php echo $row['OtherCategory'];?></span>
                   
					</div>
					 <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Προτεραιότητα</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['Priority'];?></span>
                    </div>
					<div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Εκτιμώμενος χρόνος επίλυσης</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['EstimatedTime'];?></span>
                    </div>
					<div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Πραγματικός Χρόνος Επίλυσης</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['SpentTime'];?></span>
                    </div>
					<div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Προθεσμία</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php
	if ($row["DeadLine"]==null){echo "";}else{
	echo  date('d/m/Y', strtotime($row["DeadLine"]));}?></span>
                    </div>
					 <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Δημιουργήθηκε:</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo  date('d/m/Y H:i:s', strtotime($row["CreationDate"]));?></span>
                    </div>
					
                  </div>
                </div>
			
				
				
			</div>
										<div class="row">
          
            <div class="col-4 ">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-left text-muted"><b>Περιγραφή:</b></span>
                      <span class="info-box-number text-center text-muted mb-0"><?php   echo $_GET['Problem']=$row['Problem'];?></span>
                    </div>
                  </div>
                </div>
				  <div class="col-2 ">
				
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-left text-muted"><b>Κατάσταση:</b></span>
                      <span class="info-box-number text-center text-muted mb-0">
					  <?php echo $row['status'];?></span>
                    </div>
                  </div>
				  </div>
				  	  <div class="col-2 ">
				
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-left text-muted"><b>Συννημένο αρχείο:</b></span>
                      <span class="info-box-number text-center text-muted mb-0">
					  <a href="<?php echo $row['Attachments'];?>" target="_blank"><?php echo $row['Attachments'];?></a></span>
                    </div>
                  </div>
				  </div>
			
				  <!--assignedto--->
				
				    <div class="col-4 ">
				    <div class="info-box bg-light">
                    <div class="info-box-content">
					     <table class="table table-striped table-bordered">
					   <tr>
                      <th><span class="info-box-text text-left text-muted"><b>Διαχειριστής/ές:</b></th>
					  <th><span class="info-box-text text-left text-muted"><b>Ημερομηνία Ανάθεσης:</b></th>
					   </tr>
				
					    <?php 
		
				  $ticketnumber = $_SERVER['QUERY_STRING'];
				 
				  require_once "config.php";
				   $sql = 'select * from (
				   (SELECT u.DisplayName as assigneduser, p.AssignDate as AssignDate ,t.TicketNumber as TicketNumber
				   FROM users u 
				   join assign p on u.UserID=p.AFKUserID 
				   join tickets t on t.TicketID=p.FKTicketID ) 
				   UNION
				   (SELECT u.DisplayName as assigneduser, p.OAssignDate as AssignDate, t.OTicketNumber as TicketNumber
				   FROM users u join assignforothertickets p on u.UserID=p.OAFKUserID join othertickets t on t.OTicketID=p.OFKTicketID))
				   ola where TicketNumber="'.$ticketnumber.'"';
		
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
							
							 while($row= mysqli_fetch_array($result)){
								  echo "<tr><td>". $row['assigneduser']."</td>";
								    echo "<td>".date('d/m/Y H:i:s', strtotime( $row['AssignDate']))."</td></tr>";
							}
						
						}  
					
					
                            // Free result set
                            mysqli_free_result($result);
							
                        }
					?>	
					 </span>
					  </span>
			
                     </table>
                    </div>
                  </div>			  
                </div>
               
              </div>
			  <hr>
			  
			 
			  <div class="card-header" style="background-color:#fef1e6; text-align:center;">
			   <h3>Απαντήσεις Ticket:</h3>
				</div>
			  <hr>
			  <?php
			  
                $sql1 = 'SELECT * from (
				(select TicketNumber as TicketNumber, DisplayName as DisplayName, 
				ReplyCreationDate as ReplyCreationDate, StatusText as StatusText, PrefilledText as PrefilledText, 
				Reply as Reply
				FROM tickets
				left join status on FKStatus=StatusID
				left join replies r on r.FKTicketID=TicketID left join users on r.FKAdminID=UserID )
				UNION 
				(select OTicketNumber as TicketNumber, ODisplayName as DisplayName, 
				OReplyCreationDate as ReplyCreationDate, StatusText as StatusText, OPrefilledText as PrefilledText,
				OReply as Reply FROM othertickets left join status on OFKStatus=StatusID 
				left join otherreplies r on r.OFKTicketID=OTicketID left join users on r.OFKAdminID=UserID ))
				ola where TicketNumber = "'.$ticketnumber.'"';
				
                    if($result1 = mysqli_query($link, $sql1)){
                        if(mysqli_num_rows($result1) > 0){
							 while($row= mysqli_fetch_array($result1)){
									
									?>
			  	<div class="row">
           <div class="info-box bg-light">
		                      
							    <div class="col-12 col-sm-3">
								<b>Απάντησε ο χρήστης:</b>           
					  <?php echo $row['DisplayName'];?></span><br>
                    <b>Ημερομηνία Απάντησης:</b>
					
					  <?php if ($row["ReplyCreationDate"]==null){echo "";}else{
	echo  date('d/m/Y H:i:s', strtotime($row["ReplyCreationDate"]));}?><br>
					<!--    <b>Κατάσταση: </b>
					
					 // <?php echo $row['StatusText'];
					  //$statustext= $row['StatusText'];
					  //$_GET['StatusText'];
					 // echo $statustext;
					 // echo $_GET['statustext'];?><br> !-->
					  
					<b>Απάντηση-Κατάσταση: </b><br>
					
					  <?php echo $row['PrefilledText'];?>
					 
					  
					  
					  
					
					  </div>
					   <div class="col-12 col-sm-9">
					   <b>Απάντηση:</b>
           
					  <?php echo $row['Reply'];?></span><br>
					  
                    </div>
					
              <!-- /.card-body -->
            </div>
			</div>
			<?php
                                }// Free result set
                            mysqli_free_result($result1);
                        }						
						
					}?>
            </div><!-- /.repliesdiv -->
          </div>
		  
		  <!---ΣΗΜΕΙΩΣΕΙΣ ΔΙΑΧΕΙΡΙΣΤΩΝ-->
		  
		    <div class="card-header" style="background-color:#93b3db; text-align:center;">
			   <h3>Σχόλια - Σημειώσεις:</h3>
				</div>
			  <hr>
			  <?php
                $sql1 = 'SELECT * FROM 
				((select TicketNumber as TicketNumber, NoteCreationDate as NoteCreationDate, DisplayName as DisplayName,
				NoteText as NoteText
				from tickets 
				left join extranotes on FKNoteTicketID=TicketID 
				left join users on FKNoteAdminID=UserID )
				UNION
				(select OTicketNumber as TicketNumber, ONoteCreationDate as NoteCreationDate, DisplayName as DisplayName,
				ONoteText as NoteText
				from othertickets 
				left join extranotesforothertickets on OFKNoteTicketID=OTicketID 
				left join users on OFKNoteAdminID=UserID))ola 
				where TicketNumber ="'.$ticketnumber.'"';
				
                    if($result1 = mysqli_query($link, $sql1)){
                        if(mysqli_num_rows($result1) > 0){
							 while($row= mysqli_fetch_array($result1)){
									
									?>
			  	<div class="row">
           <div class="info-box bg-light">
		                      
							    <div class="col-12 col-sm-3">
                    <b>Ημερομηνία Σημείωσης:</b>
					
					  <?php if ($row["NoteCreationDate"]==null){
						  echo "";}
						  else{ echo  date('d/m/Y', strtotime($row["NoteCreationDate"]));}

					 ?><br>
					  
				  <b>Δημιουργήθηκε από το χρήστη:</b>           
					  <?php echo $row['DisplayName'];?></span><br>
					  
					
					  </div>
					   <div class="col-12 col-sm-9">
					  
           
					 
					   <b>Σχόλια - Σημειώσεις:</b>
           
					  <?php echo $row['NoteText'];?></span>
                    </div>
					
              <!-- /.card-body -->
            </div>
			</div>
			<?php
                                }// Free result set
                            mysqli_free_result($result1);
                        }						
						
					}?>
            </div><!-- /.repliesdiv -->
          </div>
		  
		  
		  
		  
		<!--  ΤΕΛΟΣ ΣΗΜΕΙΩΣΕΩΝ-->
		  
		         <div class="col-lg-12">

	 <form method='post' action="<?PHP "ticket-reply.php?". $ticketnumber ?>">
			      <div class="card-body">
				  
				
				    <table class="table table-striped table-bordered">
					<tr>
					<td class="col-sm-2">   <label for="priority">Γρήγορη Απάντηση</label>
                <select name="prefilledtext"   id="prefilledtext" class="form-control custom-select"  
				onchange="makeSpentTimeRequired()"  >
                  <option value="" selected disabled>Επιλογή...</option>
				  <option value="Για την επίλυση του προβλήματος  παρακαλούμε δείτε τις οδηγίες στον εσωτερικό ιστότοπο του υπουργείου. (Replied)">
				  Για την επίλυση του προβλήματος παρακαλούμε δείτε τις οδηγίες στον εσωτερικό ιστότοπο του υπουργείου. (Replied)</option>
                 
                  <option value="Λάβαμε το αίτημα σας, θα ενημερωθείτε σύντομα. (Replied)">Λάβαμε το αίτημα σας, θα ενημερωθείτε σύντομα. (Replied)</option>
                  <option value="Το αίτημα σας βρίσκεται σε εξέλιξη. (In Progress)">Το αίτημα σας βρίσκεται σε εξέλιξη. (In Progress)</option>
                  <option value="Το αίτημα σας έχει επιλυθεί μερικώς.(On hold)">Το αίτημα σας έχει επιλυθεί μερικώς.(On hold)</option>
				  <option id="closed" value="Το αίτημα σας έχει ολοκληρωθεί. (Closed)">Το αίτημα σας έχει ολοκληρωθεί. (Closed)</option>
				  <option value="Το αίτημα σας έχει απορριφθεί.(Rejected)">Το αίτημα σας έχει απορριφθεί.(Rejected) </option>
				  <option value="Έγινε επίσκεψη">Έγινε επίσκεψη</option>
				 
                </select>
				</td>
					<td class="col-sm-2">
				  <label for="category">Κατηγορία</label>
                <select id="selectcategory"   name="selectcategory" class="form-control custom-select" onchange = "displayOtherCat()">
                  <option value="" selected disabled>Επιλογή...</option>
                  <option value="Δίκτυο">Δίκτυο</option>
                  <option value="Domain">Domain</option>
                  <option value="Εκτυπώσεις">Εκτυπώσεις</option>
				  <option value="Κοινόχρηστος Φάκελος">Κοινόχρηστος Φάκελος</option>
				  <option value="Τηλεδιάσκεψη">Τηλεδιάσκεψη</option>
				  <option value="Λογισμικό">Λογισμικό</option>
				  <option value="Mail">Mail</option>
				  <option value="Η/Υ Hardware">Η/Υ Hardware</option>
				  <option value="Τηλεφωνία">Τηλεφωνία</option>
				  <option value="Άλλο">Άλλο</option>
                </select>
             <div class="control-group" id="divothercategory"  style="display:none">
              <label class="control-label">Άλλη Κατηγορία:</label>
              <div class="controls">
                <input type="text"  name="othercat" class="input-xlarge">
              </div>
            </div>
				</td>
					<td>   <label for="changepriority">Προτεραιότητα</label>
                <select name="priority" class="form-control custom-select">
                  <option value="" selected disabled>Επιλογή...</option>
                  <option value="Χαμηλή">Χαμηλή</option>
                  <option value="Φυσιολογική">Φυσιολογική</option>
                  <option value="Υψηλή">Υψηλή</option>				
                </select>
				</td>
					<td>  <label for="deadline">Προθεσμία: </label><br>
  <input type="date" name="deadline"  class="form-control" >
  </td>
					<td>
					  <label for="estimatedtime">Εκτιμ. χρόνος : </label><br>
    <input type="number" id="estimatedtime" placeholder="Σε ώρες" name="estimatedtime" min="1" max="10"     step="1" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                      title="Numbers only" class="form-control" >
					</td>
						<td>
					  <label for="spenttime">Πραγματικός χρόνος: </label><br>
    <input type="number"  id="spenttime" name="spenttime" placeholder="Σε ώρες"  onchange = "changeStatustoClosed()"
	min="1" max="10"    step="1" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                      title="Numbers only" class="form-control" >
					</td>
				  <?php
    
   
     $connect = new PDO("mysql:host=localhost;dbname=atest", "root", "arstl1719");
	 
	 
    $selectstaff = '';
    
    $query = "SELECT DISTINCT DisplayName, UserID FROM users where Usertype='helpdeskuser' ORDER BY DisplayName ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    
    foreach($result as $row){
       $selectstaff .= '<option value="'.$row['UserID'].'">'.$row['DisplayName'].'</option>';
    }

?>
					<td class="col-sm-2">
					 <label for="assigntouser">Ανάθεση στο χρήστη</label>
                <select name="assigntouser" class="form-control custom-select">
				
                <option><?php echo  $selectstaff;?></option>			
                </select></td>
			
					</tr>
					</table>
				</form>
		
				
					   <?php 
					   
        $reply=$_POST['reply'];	
		$deadline = date($_POST['deadline']);	
		$prefilledtext = $_POST['prefilledtext'];
		$spenttime = $_POST['spenttime'];
		$estimatedtime = $_POST['estimatedtime'];
		$priority =$_POST['priority'];
		$selectcategory = $_POST['selectcategory'];
		$othercat =$_POST['othercat'];
		$notetext =$_POST['notetext'];
		$notecreationdate =  date("Y-m-d H:i:s"); 
		$assigntouser = $_POST['assigntouser'];
		$asssigndate =  date("Y-m-d H:i:s"); 
if(isset($_POST['submit'])  ){
	
		//////ΑΝΑΘΕΣΗ DEADLINE////////
	 	  if($deadline!='')  {
		 $sqldeadline ="UPDATE tickets SET DeadLine='".$deadline."' where TicketNumber = '$ticketnumber'";
	 if (mysqli_query($link, $sqldeadline)) {
		echo "Επιτυχία Προσθήκης Deadline!";
		
	 } else {
		echo "Δεν έγινε σωστή εισαγωγή του deadline στο ticket. Παρακαλούμε δοκιμάστε ξανά: " . $sqldeadline . "" . mysqli_error($link)."<br>";
	 }//echo "<meta http-equiv='refresh' content='0'>";
	}
	
			//////ΑΝΑΘΕΣΗ ΚΑΤΗΓΟΡΙΑΣ////////
 	 if($selectcategory!='')  {
		
	$sqlupdatecategory=" UPDATE tickets SET Category ='".$selectcategory."', OtherCategory='".$othercat."'  where TicketNumber = '$ticketnumber'";
 if ((mysqli_query($link, $sqlupdatecategory))) {
		echo "Επιτυχία αλλαγής κατηγορίας!";
		 //echo "<meta http-equiv='refresh' content='0'>";
	 } else {
		echo "Error: " . $sqlupdatecategory . "
" . mysqli_error($link);
	 }

	// echo "<meta http-equiv='refresh' content='0'>";
					}
					
					//////ΑΝΑΘΕΣΗ ΑΛΛΗΣ ΚΑΤΗΓΟΡΙΑΣ////////
 	 if(($selectcategory=="ΆΛΛΟ") ||  ($othercat!='')){
		
	$updateothercategory=" UPDATE tickets SET Category ='".$selectcategory."', OtherCategory='".$othercat."'  where TicketNumber = '$ticketnumber'";
	if ((mysqli_query($link, $updateothercategory))) {
		echo "Επιτυχία αλλαγής κατηγορίας!";
		 echo "<meta http-equiv='refresh' content='0'>";
	 } else {
		echo "Error: " . $updateothercategory . "
" . mysqli_error($link);
	 }

	// echo "<meta http-equiv='refresh' content='0'>";
	}
	
	
						//////////ΑΝΑΘΕΣΗ ΠΡΟΤΕΡΑΙΟΤΗΤΑΣ/////////
	 if($priority!='')  {
			$updatepriority=" UPDATE tickets SET Priority='".$priority."' where TicketNumber = '$ticketnumber'";
				 if ((mysqli_query($link, $updatepriority))) {
		echo "Επιτυχία αλλαγής Προτεραιότητας!";
		
	 } else {
		echo "Error: " . $updatepriority . "
" . mysqli_error($link);
	 }

					}			
					
		
			//////ΑΝΑΘΕΣΗ ΧΡΗΣΤΗ////////
   if($assigntouser!='' )  {
		 $sqlassign = "INSERT INTO assign (FKTicketID, AFKUserID, AssignDate) VALUES
 (((select TicketID from tickets where TicketNumber = '$ticketnumber')), ((select UserID from users where 
 Usertype = 'helpdeskuser' and UserID  = '$assigntouser'))  ,('$asssigndate'))";
 
  $sqlinform = "select Mail from users where Userid='".$assigntouser."'";
	 if ((mysqli_query($link, $sqlassign))&&(mysqli_query($link, $sqlinform))) {
	 if($result = mysqli_query($link, $sqlinform)){
                        if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
		
		 $_GET['Mail']= $row['Mail'];
		echo 	 $_GET['Mail'];
		
		
		

		

		
		
$header  = 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
//$header .= 'To: '. $_GET['Mail'];
$header .= 'From: itsupport@moh.gov.gr';
$msg     = '<html><head><title>Ticket APP:Σας έγινε ανάθεση ticket</title></head>';
$msg    .= "<body><p></p></body></html>";
$to_email = $_GET['Mail'];
$subject = "Ticket APP:Σας έγινε ανάθεση ticket";
$body = "Παρακαλούμε όπως ενημερωθείτε από την εφαρμογή σχετικά με το ticket που σας έχει ανατεθεί.<br>
<hr>
<h3 style='text-align:center'>Στοιχεία Ticket </h3><br>
<ul>
<li>	Ημερομηνία ανάθεσης: <strong>$asssigndate</strong><br>   </li>

<li>	Χρήστης: <strong>".$_GET['DisplayName']."</strong><br>    </li>
<li>	Διεύθυνση Email: <strong>".$_GET['SimpleUserMail']."</strong><br>  </li>
<li>	Διεύθυνση: <strong>".$_GET['TDescription']."</strong><br>  </li>
<li>	Γραφείο: <strong>".$_GET['Office']."</strong><br>     </li>
<li>	Τηλέφωνο: <strong>".$_GET['Phone']."</strong><br>	</li>
<li>	Πρόβλημα: <strong>".$_GET['Problem']."</strong><br>   </li>
</ul>
";
	if (mail($to_email, $subject, $body, $header,$msg)) {
						
	 }			
}



			
	 
	 }}

   }} 
	
	//////ΑΝΑΘΕΣΗ ΕΚΤΙΜΩΜΕΝΟΥ ΧΡΟΝΟΥ////////
	 	  if($estimatedtime!='')  {
		 $sqlestimatedtime ="UPDATE tickets SET estimatedtime='".$estimatedtime."' where TicketNumber = '$ticketnumber'";
	 if (mysqli_query($link, $sqlestimatedtime)) {
		echo "Επιτυχία Προσθήκης Εκτιμώμενου χρόνου!";
		
	 } else {
		echo "Δεν έγινε σωστή εισαγωγή του εκτιμώμενου χρόνου επίλυσης του ticket. Παρακαλούμε δοκιμάστε ξανά: " . $sqlestimatedtime . "" . mysqli_error($link)."<br>";
	 }
	// echo "<meta http-equiv='refresh' content='0'>";
	}
	//////ΑΝΑΘΕΣΗ ΠΡΑΓΜΑΤΙΚΟΥ ΧΡΟΝΟΥ////////
	 	  if($spenttime !='')  {
		 $sqlspenttime ="UPDATE tickets SET SpentTime='".$spenttime."' where TicketNumber = '$ticketnumber'";
	 if (mysqli_query($link, $sqlspenttime)) {
		echo "Επιτυχία Προσθήκης Πραγματικού χρόνου!";
		
	 } else {
		echo "Δεν έγινε σωστή εισαγωγή του πραγματικού χρόνου επίλυσης του ticket. Παρακαλούμε δοκιμάστε ξανά: " . $sqlspenttime . "" . mysqli_error($link)."<br>";
	 }
	// echo "<meta http-equiv='refresh' content='0'>"; 
	}
	
	////////ΑΝΑΘΕΣΗ ΣΧΟΛΙΟΥ/////
	    if($notetext !='')  {
		 $sqlextranotes= "INSERT INTO extranotes (FKNoteTicketID, FKNoteAdminID, NoteText,  
		 NoteCreationDate) VALUES
 (((select TicketID from tickets where TicketNumber = '$ticketnumber')), 
 ((select UserID from users where Mail = '$mail'))  , ('$notetext'),  ('$notecreationdate'))";
	 if (mysqli_query($link, $sqlextranotes)) {
		echo "Επιτυχία Εισαγωγής Απάντησης!";
		
	 } else {
	echo "Error: " . $sqlextranotes . mysqli_error($link);
	 }
	}

//////ΑΝΑΘΕΣΗ ΑΠΑΝΤΗΣΗΣ////////	
 /// αν ειναι συμπληρωμένο μονο το reply textarea
      if(($reply!='')&& (empty( $prefilledtext)))  {
		 $sqlreply = "INSERT INTO replies (FKTicketID, FKAdminID, Reply,  ReplyCreationDate) 
	   VALUES
 ((select TicketID from tickets where TicketNumber = '$ticketnumber'), 
 (select UserID from users where Mail = '$mail')  , ('$reply'),  ('$creationdate'))";
 if ( $statustext==="New"){
 $sqlupdate1=" UPDATE tickets SET FKStatus=1 where TicketNumber = '$ticketnumber'";
  if ((mysqli_query($link, $sqlupdate1))) {
		echo "Επιτυχία update!";
		
	 } else {
	echo "Error: "  . $sqlupdate1. "
" . mysqli_error($link);
	 }
 }
 
	 if ((mysqli_query($link, $sqlreply))) {
		echo "Επιτυχία Εισαγωγής Απάντησης!";
		
	 } else {
	echo "Error: " . $sqlreply .  "
" . mysqli_error($link);
	 }
	  }	 
	///////ΑΝΑΘΕΣΗ ΓΡΗΓΟΡΗΣ ΑΠΑΝΤΗΣΗΣ///////

 /// αν ειναι συμπληρωμένο μονο το prefilledtext
    if((empty($reply))&& ( $prefilledtext!=''))  {
	  
	   $sqladdreply = "INSERT INTO replies (FKTicketID, FKAdminID,  PrefilledText, ReplyCreationDate) 
	   VALUES
 ((select TicketID from tickets where TicketNumber = '$ticketnumber'), 
 (select UserID from users where Mail = '$mail')  ,  ('$prefilledtext'), ('$creationdate'))";
 
if($_POST['prefilledtext']=== "Για την επίλυση του προβλήματος  παρακαλούμε δείτε τις οδηγίες στον εσωτερικό ιστότοπο του υπουργείου. (Replied)") { 
$sqlupdate=" UPDATE tickets SET FKStatus=5 where TicketNumber = '$ticketnumber'";
}
if($_POST['prefilledtext']=== "Λάβαμε το αίτημα σας, θα ενημερωθείτε σύντομα. (Replied)") { 
$sqlupdate=" UPDATE tickets SET FKStatus=5 where TicketNumber = '$ticketnumber'";
}
if($_POST['prefilledtext']=== "Το αίτημα σας βρίσκεται σε εξέλιξη. (In Progress)") { 
$sqlupdate=" UPDATE tickets SET FKStatus=3 where TicketNumber = '$ticketnumber'";
}
if($_POST['prefilledtext']=== "Το αίτημα σας έχει επιλυθεί μερικώς.(On hold)") { 
$sqlupdate=" UPDATE tickets SET FKStatus=4 where TicketNumber = '$ticketnumber'";
}
if($_POST['prefilledtext']=== "Το αίτημα σας έχει ολοκληρωθεί. (Closed)") { 
$sqlupdate=" UPDATE tickets SET FKStatus=6 where TicketNumber = '$ticketnumber'";
}
if($_POST['prefilledtext']=== "Το αίτημα σας έχει απορριφθεί.(Rejected)") { 
$sqlupdate=" UPDATE tickets SET FKStatus=7 where TicketNumber = '$ticketnumber'";
}
if($_POST['prefilledtext']=== "Έγινε επίσκεψη") { 
$sqlupdate=" UPDATE tickets SET FKStatus=2 where TicketNumber = '$ticketnumber'";
}

  if ((mysqli_query($link, $sqlupdate))&&(mysqli_query($link, $sqladdreply))) {
		echo "Επιτυχία αλλαγής Κατάστασης!";
		
	 } else {
		echo "Error: " . $sqlupdate. $sqladdreply . "
" . mysqli_error($link);
	 }
	
//	
  }
  
  
  	///////ΑΝΑΘΕΣΗ ΓΡΗΓΟΡΗΣ ΑΠΑΝΤΗΣΗΣ///////
   if((!empty($reply))&&(!empty ($prefilledtext)))  {
	   $sqladdreplywithquickanswer = "INSERT INTO replies (FKTicketID, FKAdminID, Reply, PrefilledText, ReplyCreationDate) 
	   VALUES
 ((select TicketID from tickets where TicketNumber = '$ticketnumber'), 
 (select UserID from users where Mail = '$mail')  , ('$reply'), ('$prefilledtext'), ('$creationdate'))";
 
if($_POST['prefilledtext']=== "Για την επίλυση του προβλήματος  παρακαλούμε δείτε τις οδηγίες στον εσωτερικό ιστότοπο του υπουργείου. (Replied)") { 
$sqlupdate2=" UPDATE tickets SET FKStatus=5 where TicketNumber = '$ticketnumber'";
}
if($_POST['prefilledtext']=== "Λάβαμε το αίτημα σας, θα ενημερωθείτε σύντομα. (Replied)") { 
$sqlupdate2=" UPDATE tickets SET FKStatus=5 where TicketNumber = '$ticketnumber'";
}
if($_POST['prefilledtext']=== "Το αίτημα σας βρίσκεται σε εξέλιξη. (In Progress)") { 
$sqlupdate2=" UPDATE tickets SET FKStatus=3 where TicketNumber = '$ticketnumber'";
}
if($_POST['prefilledtext']=== "Το αίτημα σας έχει επιλυθεί μερικώς.(On hold)") { 
$sqlupdate2=" UPDATE tickets SET FKStatus=4 where TicketNumber = '$ticketnumber'";
}
if($_POST['prefilledtext']=== "Το αίτημα σας έχει ολοκληρωθεί. (Closed)") { 
$sqlupdate2=" UPDATE tickets SET FKStatus=6 where TicketNumber = '$ticketnumber'";
}
if($_POST['prefilledtext']=== "Το αίτημα σας έχει απορριφθεί.(Rejected)") { 
$sqlupdate2=" UPDATE tickets SET FKStatus=7 where TicketNumber = '$ticketnumber'";
}  
if($_POST['prefilledtext']=== "Έγινε επίσκεψη") { 
$sqlupdate2=" UPDATE tickets SET FKStatus=2 where TicketNumber = '$ticketnumber'";
}  
 if (mysqli_query($link, $sqladdreplywithquickanswer)&&(mysqli_query($link, $sqlupdate2))) {
		echo "Επιτυχία αλλαγής Κατάστασης!";
		
	 } else {
		echo "Error: " . $sqladdreplywithquickanswer. $sqlupdate2 . "
" . mysqli_error($link);

	 }

   }
 
echo "<meta http-equiv='refresh' content='0'>";
}
 

    ?>
         
<script>

function displayOtherCat() {

    var selectothercategory = document.getElementById("selectcategory");

	    if (selectothercategory.value == "Άλλο")
	{
		
		document.getElementById("divothercategory").style.display ="block";
	}
	 
	 else 
	{
		
		//document.getElementById("divothercategory").style.display ="none";
	}

}
</script>



<script>

function makeSpentTimeRequired() {
    var prefilledtext = document.getElementById("prefilledtext");
	    if (prefilledtext.value == "Το αίτημα σας έχει ολοκληρωθεί. (Closed)")
	{		
  document.getElementById("spenttime").required = true;
	/* 	const input = document.getElementById('spenttime');

		input.setAttribute('required', ''); */
	}	 
	else 
	{		
		  document.getElementById("spenttime").required = false;
	} 

}
</script>

<script>

function changeStatustoClosed() {
    var spenttime = document.getElementById("spenttime");
	    if (spenttime.value !== "")
	{		
 
  document.getElementById("closed").selected = true;


	/* 	const input = document.getElementById('spenttime');

		input.setAttribute('required', ''); */
	}	 
	else 
	{		
		  document.getElementById("prefilledtext").required = false;
	} 

}
</script>              
                         
                            <div class="mb-1">
                                <label><strong>Απάντηση:</strong></label>
                                <textarea id='makeMeSummernote' name='reply' class="form-control" ></textarea><br>
                            </div>
							   <div class="mb-3">
							 <label><strong>Σχόλια - Σημειώσεις:</strong></label>
                  <textarea id='makeMeSummernote' name='notetext' class="form-control" ></textarea><br>
                           
                                
                            </div>
                            <div class="d-flex justify-content-center">
                                <input type="submit" name="submit" value="Αποστολή"  class="btn btn-success">
                            </div>
                        </form>
                    </div>
									<?php
                                }
                            
								 
							  
                            // Free result set
                            mysqli_free_result($result);
                        }
						
					}

                ?>
				
				
				


            <!-- /.card -->
          </div>
		  
          <!-- /.col -->
   
          <!-- /.col -->
        </div>
		
        <!-- /.row -->
      </div><!-- /.container-fluid -->
	


	  </div>
	  
	  
	  
	  
		  
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
    <script src="js/jquery.min.js"></script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
<script src="plugins/summernote/summernote-bs4.min.js"></script>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  })
</script>



</head>

</body>
</html>



