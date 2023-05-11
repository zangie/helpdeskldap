<?php 
	error_reporting(1);
	session_start();
require_once "functions.php";
$username = $_SESSION['username'];
$mail = $_SESSION['mail'];
$displayname = $_SESSION['displayname'];
$description = $_SESSION['description'];
$department  = $_SESSION['department'];
$office      = $_SESSION['office'];
$telphone =$_SESSION['phone'];

/* echo $mail;
echo $displayname;
echo $username;  */
//echo CreateSession();
//

/* echo $displayname;
echo $mail;*/

if (isset($_POST['notvalidated'])) {
	
	?>
<!doctype html>
<html>
<head>
	  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
   
</head>
<body >
							
							
							
<body class="hold-transition login-page">
<div class="login-box" style="    width:40%;">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <h4>Παρακαλούμε συμπληρώστε το τηλέφωνο σας,
					<br>ώστε το τμήμα Μηχανογραφικών Υποδομών<br> να επικοινωνήσει μαζί σας, 
					για την διόρθωση των στοιχείων σας.</h4>
    </div>
    <div class="card-body">
   
	
		 
		<form method="POST"  action="sendemail.php"> 
			<div class="row">
			<input type="text" name="newphone" placeholder="Τηλέφωνο..." class="form-control" required >
	<input type="submit" name="sendtel" class="btn btn-success btn-block" value="Αποστολή">
			



	</form>
		</div>
</div>
</div>
</div>



</body>
</html>

<?php
}
	if (isset($_POST['validated'])) {

	
$username = $_SESSION['username'];
		$pdo = new PDO(
    "mysql:host=localhost;dbname=atest",
    'root',
    'arstl1719'
);
		   $sql = "SELECT * FROM `users` WHERE Username = :username";

//Prepare the SQL statement.
$stmt = $pdo->prepare($sql);

//Bind our email value to the :username parameter.
$stmt->bindValue(':username', $username);

//Execute the statement.
$stmt->execute();

//Fetch the row / result.
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//If num is bigger than 0, the email already exists.
if($row > 0){			
		 $connect = new PDO("mysql:host=localhost;dbname=atest", "root", "arstl1719");
   $phone = '';
   $address= '';
     $query = 'Update users set Validated = "1" ,Mail = "'.$mail.'", Department = "'.$department.'" ,  Description = "'.$description.'" , Office = "'.$office.'", Phone = "'.$telphone.'" where Username = "'.$username.'"';

  $statement = $connect->prepare($query);
    $statement->execute();
	
	
    $query = 'SELECT * FROM users where Username = "'.$username.'"';
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
	 foreach($result as $row){
	if (($row['UserType'] =='admin')||($row['UserType'] =='helpdeskuser')){
echo header( "refresh:0;url=admin.php" );
								}
	
 else if ($row['UserType'] =='simpleuser'){
		echo header( "refresh:0;url=profile.php" );
								}
	 }
	}
	else

	{
	$pdo = new PDO(
    "mysql:host=localhost;dbname=atest",
    'root',
    'arstl1719');


$username = $_SESSION['username'];
 $displayname = $_SESSION['displayname'];
$regdate = date("Y-m-d H:i:s");
$mail = $_SESSION['mail'];
$pcaddress = gethostbyaddr($_SERVER['REMOTE_ADDR']) ;
$department = $_SESSION['department'];
$description = $_SESSION['description'];

$office = $_SESSION['office'];
$phone = $_SESSION['phone']; 
	
$sql = 'INSERT INTO Users (Username, UserType, DisplayName, Mail, PCLogin, Department, Description,  Office, Phone, RegisterDate, Validated, SelfRegister) 
VALUES(:username, "simpleuser", :displayname, :mail, :pclogin, :department, :description,  :office, :phone, :registerday, "1", "1")';

$statement = $pdo->prepare($sql);

$statement->execute([
	':username' => $username,
	':displayname' => $displayname,
	':mail' => $mail,
	':pclogin' => $pcaddress,
	':department' => $department,
	':description' => $description,
	
	':office' => $office,
	':phone' => $phone,
	':registerday' => $regdate
]);?>
<!DOCTYPE html>
<html>
<head>

	<!-- Include SweetAlert CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
</head>
<body>



	<!-- Include SweetAlert JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

	<?php
		// Check if the form has been submitted

			// Show SweetAlert message

echo '<script>
		Swal.fire({
			title: "Η εγγραφή σας στο helpdesk έγινε επιτυχώς!",
			icon: "success"
		});
				</script>';

			echo header( "refresh:3;url=profile.php" );
	}}
	?>

	<!-- Form to trigger SweetAlert message -->


</body>
</html>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
