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
if (isset($_POST['sendtel'])) {
	if (isset($_POST['newphone'])) {
	
$header  = 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$header .= 'To: ' . $to_email. "\r\n";
$header .= 'From: itsupport@moh.gov.gr';
$msg     = '<html><head><title>Ticket APP:Ενημέρωση σχετικά με μη επικαιροποιημένο χρήστη στο Active Directory</title></head>';
$msg    .= "<body><p>Ο χρήστης με Ονοματεπώνυμο: ".$displayname." και email: ".$mail ." σας ενημερώνει,
 ότι τα στοιχεία του δεν είναι σωστά στο ACTIVE DIRECTORY. Παρακαλούμε να επικοινωνήσετε μαζί του,
 για την επικαιροποήση των στοιχείων του στο Active Directory</p></body></html>";

$to_email ='itsupport@moh.gov.gr';
$subject = "Ticket APP:Ενημέρωση σχετικά με μη επικαιροποιημένο χρήστη στο Active Directory ";
$body = "Ο χρήστης με Ονοματεπώνυμο: ".$displayname." , email: ".$mail ." και τηλέφωνο ".$_POST['newphone']." σας ενημερώνει,
 ότι τα στοιχεία του δεν είναι σωστά στο ACTIVE DIRECTORY. Παρακαλούμε να επικοινωνήσετε μαζί του,
 για την επικαιροποιήση των στοιχείων του στο Active Directory";

 
if (mail($to_email, $subject, $body, $header,$msg)) {
   
//redirect to the 'thank you' page		
		$connect = new PDO("mysql:host=localhost;dbname=atest", "root", "arstl1719");
   $phone = '';
   $address= '';
    $query = 'SELECT * FROM users where Username = "'.$username.'"';;
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
} else {
    echo "Αποτυχία ενημέρωσης του helpdesk σχετικά με τα στοιχεία σας... Παρακαλούμε ξαναδοκιμάστε";
} 
}
}
	

?>