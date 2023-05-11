<?php
	error_reporting(0);
session_start();
date_default_timezone_set('Europe/Athens');
$creationdate = date("Y-m-d H:i:s"); 
	// echo $creationdate 	;	
		
//$insertuser = insertNewUser(); 
$username=$_SESSION['username'];

if (!isset($_SESSION["username"]))
{
    header('location:login.php');
}
 // echo  $mail=$_SESSION['mail'] . '<br>';
/*echo  $_SESSION['samaccountname']. '<br>';
echo  $_SESSION['description']. '<br>';
echo  $_SESSION['department']. '<br>';
echo  $_SESSION['physicaldeliveryofficename']. '<br>';
echo  $_SESSION['telephonenumber']. '<br>';
echo  $_SESSION['dn']. '<br>';
echo  $_SESSION['pcaddress']. '<br>';
 */
   //echo $useris=$_GET['useris'];  //Output: myquery


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

//echo $username;
  if (isset($_POST['submituser']))
    {
        insertTicket();
    }
    function insertTicket()
    {
        $mail=$_SESSION['mail']; 
		
$assigntouser = $_POST['assigntouser'];
$displayname = $_SESSION['displayname'];

$ticketnumber = uniqid("a");
$subject=  $_POST['subject'];
$selectcategory = $_POST['selectcategory'];
$priority =  $_POST['priority'];
$creationdate = date("Y-m-d H:i:s");
$othercat =$_POST['othercat'];
$problem =  $_POST['problem'];
$username = $_GET['username'];
$asssigndate =  date("Y-m-d H:i:s"); 



				$descriptionad=$_GET['description'];
				$officead=$_GET['physicaldeliveryofficename'];
				$phonead=$_GET['telephonenumber'];
require "config.php";	


 $sql = "INSERT INTO tickets (TicketNumber, FKUserID, TDescription, TDepartment,  Subject, CreationDate,  Priority,  Category, OtherCategory, 
 Attachments, Problem, WhoOpenedIt)
	 VALUES (('$ticketnumber') , ((select UserID from users where UserName = '".$_GET['useris']."')), ((select Description from users where UserName = '".$_GET['useris']."')), ((select Department from users where UserName = '".$_GET['useris']."')),
('$subject'), ('$creationdate'), ('$priority '),('$selectcategory'),('$othercat'),('".$_FILES["fileToUpload"]["name"]."'), ('$problem'),(select UserID from users where DisplayName = '$displayname'))";
	 // $sql = 'SELECT * FROM users where Username = "'.$username.'"';
	// echo $sql;
	 if (mysqli_query($link, $sql)) {
	 echo "<script type='text/javascript'>alert('Το αίτημα σας υποβλήθηκε με επιτυχία!')</script>" ;
	
	header( "refresh:0;url=admin.php" );
	 } else {
		echo  "<script type='text/javascript'>alert('Αποτυχία υποβολής του αιτήματος! Παρακαλούμε δοκιμάστε ξανά.')</script>". $sql . mysqli_error($link);
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
	//	echo 	 $_GET['Mail'];
		
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

<li>	Χρήστης: <strong>".$displaynamead."</strong><br>    </li>
<li>	Διεύθυνση: <strong>".$descriptionad."</strong><br>  </li>
<li>	Γραφείο: <strong>".$_GET['physicaldeliveryofficename']."</strong><br>     </li>
<li>	Τηλέφωνο: <strong>".$_GET['telephonenumber']."</strong><br>	</li>
<li>	Πρόβλημα: <strong>".$_POST['problem']."</strong><br>   </li>
</ul>
";
	if (mail($to_email, $subject, $body, $header,$msg)) {
						
	 }			
}



			
	 
	 }}

   }} 
 mysqli_close($link);	
 //header( "refresh:0;url=admin.php" );
 
 		
			
	
	  }
	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>ΔΗΜΙΟΥΡΓΙΑ TICKET ΓΙΑ ΧΡΗΣΤΗ ΣΤΟ AD | HELP DESK | ΔΙΕΥΘΥΝΣΗΣ ΗΛΕΚΤΡΟΝΙΚΗΣ ΔΙΑΚΥΒΕΡΝΗΣΗΣ </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
   <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Αρχική</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Επικοινωνία</a>
      </li>
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
      <!--  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
         <!--     <div class="media">
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
            <!--  <div class="media">
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
        <!--    </a>
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
         <!--   </a>
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
    <!--  <div class="form-inline">
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
            <h1>Νέο Αίτημα</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Αρχική</a></li>
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
					<?php
					
			$useris=$_GET['useris'];
$LDAPUserDomain = "@yyka.local"; 
	
	$SearchFor=$useris;		//What string do you want to find?
	$SearchField="samaccountname";			//In what Active Directory field do you want to search for the string?
	$LDAPHost = "ldap://yyka.local";		//Your LDAP server DNS Name or IP Address
	$dn = "DC=yyka,DC=local";		//Put your Base DN here
	$LDAPUser = 'ZafeiropoulouA';		//A valid Active Directory login
	$LDAPUserPassword = 'ae5zRpoial5!5';
	$LDAPFieldsToFind = array("*");		//Search Felids, Wildcard Supported for returning all values

	$cnx = ldap_connect($LDAPHost) or die("Could not connect to LDAP");
	ldap_set_option($cnx, LDAP_OPT_PROTOCOL_VERSION, 3);	//Set the LDAP Protocol used by your AD service
	ldap_set_option($cnx, LDAP_OPT_REFERRALS, 0);		//This was necessary for my AD to do anything
	ldap_bind($cnx,$LDAPUser.$LDAPUserDomain, $LDAPUserPassword) or die("Could not bind to LDAP");
	//error_reporting (E_ALL ^ E_NOTICE);			//Suppress some unnecessary messages

	$filter="($SearchField=$SearchFor*)";	//Wildcard is * Remove it if you want an exact match
	$sr=ldap_search($cnx, $dn, $filter, $LDAPFieldsToFind);
	$info = ldap_get_entries($cnx, $sr);
// get entry data as array


// iterate over array and print data for each entry
?>
<div class="row">

 <table class="table table-striped table-bordered" >
 <tr>
									<th>Ονοματεπώνυμο</th>									
									<th>Username</th>
								
									<th>E-Mail</th>
									<th>Διεύθυνση</th>
									<th>Τμήμα</th>
									<th>Γραφείο</th>
									<th>Τηλέφωνο</th>
    </tr>
	<?php
	for ($i=0; $i<$info["count"]; $i++) {
    echo "<tr>";
    echo "<td>".$info[$i]["displayname"][0]."</td>";
    echo "<td>".$info[$i]["samaccountname"][0]."</td>";
	echo "<td>".$info[$i]["mail"][0]."</td>";
	echo "<td>".$info[$i]["description"][0]."</td>";
	echo "<td>".$info[$i]["department"][0]."</td>";
	echo "<td>".$info[$i]["physicaldeliveryofficename"][0]."</td>";
	echo "<td>".$info[$i]["telephonenumber"][0]."</td>";
  

    echo "</tr></table>";
					$_GET['displayname']=$info[$i]["displayname"][0];
					$_GET['samaccountname']=$info[$i]["samaccountname"][0];
					$_GET['mail']=$info[$i]["mail"][0];
					$_GET['description']=$info[$i]["description"][0];
					$_GET['department']=$info[$i]["department"][0];
					$_GET['physicaldeliveryofficename']=$info[$i]["physicaldeliveryofficename"][0];
					$_GET['telephonenumber']=$info[$i]["telephonenumber"][0];
						findNewUser();
			
	}
			
 function findNewUser(){
require "config.php";	
 $sql = "select * from users where UserName = '".$_GET['useris']."'";
	 // $sql = 'SELECT * FROM users where Username = "'.$username.'"';
	if ($result=mysqli_query($link,$sql))
							{
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  if ($rowcount==0){
	 	
	    echo "<script type='text/javascript'>alert('Ο χρήστης δεν υπάρχει στην βάση γίνεται η εισαγωγή του....')</script>";
	InsertNewUserAD();	
	 }
	    else{
			UpdateUser();
	 } 
	 }
	
	  mysqli_close($link);	
}

function UpdateUser(){
	
	 $descriptionad=$_GET['description'];
				$officead=$_GET['physicaldeliveryofficename'];
				$departmentad=$_GET['department'];
				$phonead=$_GET['telephonenumber'];
			
			require "config.php";		
		//require_once "config.php";
$sqlupdate =  "update users set Description ='" . $descriptionad ."'" . ", Department ='".$departmentad."'"." , 
  Office ='".$officead."'"." ,  Phone ='".$phonead."'"."  where UserName = '".$_GET['useris']."'";
//  echo $sqlupdate;
   if (mysqli_query($link, $sqlupdate)) {
//	echo '<div class=" btn-success">Η update του χρήστη στο helpdesk έγινε επιτυχώς!</div>';
	 } else {
		echo  "<script type='text/javascript'>alert('Αποτυχία υποβολής 
		του αιτήματος! Παρακαλούμε δοκιμάστε ξανά0.')</script>". $sqlupdate . mysqli_error($link);
	 }
 mysqli_close($link);	
 } 
function InsertNewUserAD(){
	
				$displaynamead=$_GET['displayname'];
				$usernamead=$_GET['samaccountname'];				
				$mailad=$_GET['mail'];
				$descriptionad=$_GET['description'];
				$officead=$_GET['physicaldeliveryofficename'];
				$departmentad=$_GET['department'];
				$phonead=$_GET['telephonenumber'];
				$regdatead = date("Y-m-d H:i:s");
			require "config.php";		
		//require_once "config.php";
$sql = "INSERT INTO Users (Username, UserType, DisplayName, Mail,  Department,
 Description,  Office, Phone, RegisterDate, Validated, SelfRegister) 
VALUES('$usernamead', 'simpleuser', '$displaynamead', '$mailad', '$departmentad', 
'$descriptionad', '$officead','$phonead', '$regdatead', '1', '0')";
 if (mysqli_query($link, $sql)) {
	echo '<div class=" btn-success">Η εγγραφή του χρήστη στο helpdesk έγινε επιτυχώς!</div>';
	 } else {
		echo  "<script type='text/javascript'>alert('Αποτυχία υποβολής 
		του αιτήματος! Παρακαλούμε δοκιμάστε ξανά.')</script>". $sql . mysqli_error($link);
	 }
 mysqli_close($link);	
}
//$userid = $pdo->lastInsertId();


			
				
	?>
			
			</div>
			<form method="post" >
<div class="row">
			   <div class="col-sm-3">
                <label for="category">Κατηγορία</label>
                <select id="selectcategory"   name="selectcategory" class="form-control custom-select" onchange = "displayOtherCat()">
                  <option selected disabled>Επιλογή...</option>
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
              </div>
			  
			  <div class="col-sm-3" id="divothercategory"  style="display:none">
              <label class="control-label">Άλλη Κατηγορία:</label>
              <div class="controls">
                <input type="text"  name="othercat" class="input-xlarge">
              </div>
            </div>
			      <div class="col-sm-3">
                <label for="priority">Προτεραιότητα</label>
                <select name="priority" class="form-control custom-select">
                  <option selected disabled>Επιλογή...</option>
                  <option>Χαμηλή</option>
                  <option  selected="selected">Φυσιολογική</option>
                  <option>Υψηλή</option>
				
                </select>
              </div>
			  
			  
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
					<div class="col-sm-3">
					 <label for="assigntouser">Ανάθεση στο χρήστη</label>
                <select name="assigntouser" class="form-control custom-select">
				
                <option><?php echo  $selectstaff;?></option>			
                </select>
			  </div>
			  </div>
			  
			  
			  
              <div class="form-group">
                <label for="subject">Θέμα</label>
                <input type="text" name="subject" class="form-control">
              </div>
              <div class="form-group">
                <label for="problem">Περιγραφή</label>
                <textarea name="problem" class="form-control" rows="4"></textarea>
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

<script>
function ClearFields() {

     document.getElementById("category").value = "";
     document.getElementById("priority").value = "";
	 document.getElementById("subject").value = "";
	 document.getElementById("description").value = "";
}
</script>
<script>

function displayOtherCat() {

    var selectothercategory = document.getElementById("selectcategory");

	    if (selectothercategory.value == "Άλλο")
	{
		
		document.getElementById("divothercategory").style.display ="block";
	}
	 
	 else 
	{
		
		document.getElementById("divothercategory").style.display ="none";
	}

}
</script>




</body>
</html>
