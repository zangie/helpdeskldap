<?php
error_reporting(1);
 require_once "config.php";
 date_default_timezone_set('Europe/Athens');
 	session_start();
//////////LOGIN WITH ACTIVE DIRECTORY CREDENTIALS///////////////
function auth($username, $password, $dn = 'yyka', $endpoint = 'ldap://yyka.local',
 $dc = 'ou=MOH,dc=yyka,dc=local') {
	

	$ldap = @ldap_connect($endpoint);
	if(!$ldap) return false;

	ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	$bind = @ldap_bind($ldap, "$dn\\$username", $password);
	if(!$bind) return false;

	$result = @ldap_search($ldap, $dc, "(sAMAccountName=$username)");
	if(!$result) return false;

	//@ldap_sort($ldap, $result, 'sn');
	$info = @ldap_get_entries($ldap, $result);
	if(!$info) return false;
	if(!isset($info['count']) || $info['count'] !== 1) return false;

	$data = [];

	foreach($info[0] as $key => $value) {
		if(is_numeric($key)) continue;
		if($key === 'count') continue;

		$data[$key] = (array)$value;
		unset($data[$key]['count']);
	}

	return [
		'mail' => $data['mail'][0],
		'password' => $data['password'][0],
		
		'displayname' => $data['displayname'][0],
		'department' => $data['department'][0],
		'description' => $data['description'][0],
		'physicaldeliveryofficename' => $data['physicaldeliveryofficename'][0],
		'telephonenumber' => $data['telephonenumber'][0],
		'samaccountname' => $data['samaccountname'][0],
		'dn' => $data['dn'][0],
		'name' => $data['name'][0]
	];
}

//////////FIND USER FROM ACTIVE DIRECTORY/////////
function FindUser(){	
$info = auth($_POST['username'], $_POST['password']);
 	if($info=== false){ echo '<div class="alert alert-danger text-center">Αποτυχία Σύνδεσης. Λάθος Username ή Password.</div>
			<a href="login.php"><div class="btn btn-block btn-primary btn-lg text-center" id="refresh" > Δοκιμάστε ξανά</div></a>';
	echo "<section name='info' hidden>";}
		 else{
			 echo "<section name='info' vissible'>";
		 echo '<div class="alert alert-success text-center">Επιτυχία Σύνδεσης</div><h1 class="text-center">' .$info['displayname'] . '</h1>' ;
 			// CreateSession();
			ECHO ADUsersCredits();
		 }
}
/* 
function RetrieveData(){
	$username = $_POST['username'];
	
	$info = auth($_POST['username'], $_POST['password']);
		$username = $_POST['username'];
		$pdo = new PDO(
    "mysql:host=localhost;dbname=atest",
    'root',
    'arstl1719'
);
   $phone = '';
   $address= '';
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
			$mail=$row['Mail'];
			$phone= $row['Phone'];
			$address= $row['Description'];	 
			$department= $row['Department'];
			$passwordw= $_POST['password'];
		
			$office= $row['Office'];
				echo"<div class='row'><div class='col-sm-2'>Email:</div>
			<div class='col-sm-10'><label>". $mail ."</label></div></div>";
			echo"<div class='row'><div class='col-sm-2'>Τηλέφωνο:</div>
			<div class='col-sm-10'><label>". $phone ."</label></div></div>";
			echo"<div class='row'><div class='col-sm-2'>Διεύθυνση:</div>
		<div class='col-sm-10'><label>". $address ."</label></div></div>";
			echo"<div class='row'><div class='col-sm-2'>Τμήμα:</div>
		<div class='col-sm-10'><label>". $department ."</label></div></div>";
		
			echo"<div class='row'><div class='col-sm-2'>Γραφείο:</div>
		<div class='col-sm-10'><label>". $office ."</label></div></div>"; 
			
		CreateSession();}
 else
 echo ADUsersCredits();

} */

	


function CreateSession(){
	
	session_start();
	$info = auth($_POST['username'], $_POST['password']);
	$_SESSION['username']=$_POST['username'] ;
	$_SESSION['mail']=$info['mail'] ;
	$_SESSION['description']=$info['description'] ;
	$_SESSION['department']=$info['department'] ;
	$_SESSION['phone']=$info['telephonenumber'] ;
	$_SESSION['office']=$info['physicaldeliveryofficename'] ;
	
	$_SESSION['username']=$_POST['username'];
	$_SESSION['displayname']=$info['displayname'];
	$_SESSION['password']=$_POST['password'];

	/* echo $_SESSION['mail'];
	echo $_SESSION['username'];
	echo $_SESSION['displayname']; */
	/* $username = $_POST['username'];
	
	$usertype = $_SESSION['usertype'];
	$mail = $_SESSION['mail'];
	$description = $_SESSION['description'];
	$regdate =date("Y-m-d H:i:s");
	//$regdate = $_SESSION[$date]; 
	$pcaddress = $_SESSION['pcaddress'];
	$department	=$_SESSION['department'] ;
	$office= $_SESSION['office'] ;
	$phone = $_SESSION['telephonenumber'];
	$dn	= $_SESSION['dn'];	
	$cn	= $_SESSION['cn'];	 */
}
 function insertTicket()
    {
        $mail=$_SESSION['mail']; 
		

$displayname = $_SESSION['displayname'];
$ticketnumber = uniqid();
$subject=  $_POST['subject'];
$category = $_POST['category'];
$priority =  $_POST['priority'];
$creationdate = date("Y-m-d H:i:s");
$attachment = $_POST['attachment'];
$problem=  $_POST['problem'];

  require_once "config.php";
 $sql = "INSERT INTO tickets (TicketNumber, FKUserID, Subject, CreationDate,  Priority,  Category,  Attachments, Problem)
	 VALUES (('$ticketnumber') , ((select UserID from users where Mail = '$mail')), ('$subject'), ('$creationdate'), ('$priority '),('$category'), ('$attachment'), ('$problem'))";
	 // $sql = 'SELECT * FROM users where Username = "'.$username.'"';
	 if (mysqli_query($link, $sql)) {
	 echo "<script type='text/javascript'>alert('Το αίτημα σας υποβλήθηκε με επιτυχία!')</script>" ;
	 header( "refresh:1;url=profile.php" );
	 } else {
		echo  "<script type='text/javascript'>alert('Αποτυχία υποβολής του αιτήματος! Παρακαλούμε δοκιμάστε ξανά.')</script>". $sql . mysqli_error($link);
	 }
 mysqli_close($link);	
	  }
 function ADUsersCredits(){
	 
	if (isset($_POST['username'])) {
		
		$info = auth($_POST['username'], $_POST['password']);
		if (($info['mail']=="")||($info['mail']==".")){
		echo  "<script type='text/javascript'>alert('Παρακαλούμε όπως απευθυνθείτε στον προϊστάμενο της διεύθυνσής (τμήματος) σας, προκειμένου να μας αποστείλει αίτημα για την δημιουργία διεύθυνσης ηλεκτρονικού ταχυδρομείου (υπηρεσιακό email). Το αίτημα μπορεί vα γίνει μέσω της εφαρμογής αναφοράς βλάβης ή να σταλεί απευθείας στο itsupport@moh.gov.gr')</script>";
		echo header( "refresh:0;url=login.php" );
		} 
		else{
		
		//$info = auth($_POST['username'], $_POST['password']);
		echo "<div class='row'><div class='col-sm-2'>Email:</div>
			<div class='col-sm-10'><label>". $info['mail']."</label></div></div>";
		
		echo "<div class='row'><div class='col-sm-2'>Τηλέφωνο:</div>
			<div class='col-sm-10'><label>". $info['telephonenumber']."</label></div></div>";
			echo"<div class='row'><div class='col-sm-2'>Διεύθυνση:</div>
		<div class='col-sm-10'><label>".  $info['description'] ."</label></div></div>";
			echo"<div class='row'><div class='col-sm-2'>Τμήμα:</div>
		<div class='col-sm-10'><label>".  $info['department']."</label></div></div>";
			echo"<div class='row'><div class='col-sm-2'>Γραφείο:</div>
		<div class='col-sm-10'><label>".  $info['physicaldeliveryofficename'] ."</label></div></div>";
		
/* 		
	$username = $_POST['username'];
	$displayname = $_SESSION['displayname'];
	$usertype = $_SESSION['usertype'];
	$mail = $_SESSION['mail'];
	$description = $_SESSION['description'];
	$regdate =date("Y-m-d H:i:s");
	//$regdate = $_SESSION[$date]; 
	$pcaddress = $_SESSION['pcaddress'];
	$department	=$_SESSION['department'] ;
	$office= $_SESSION['office'] ;
	$phone = $_SESSION['telephonenumber'];
	$dn	= $_SESSION['dn'];	
	$cn	= $_SESSION['cn'];	 */
	
	
CreateSession();
		}
	}	  
}	 	 

?>