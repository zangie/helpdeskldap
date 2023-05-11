	<?php
error_reporting(1);
 require_once "config.php";

date_default_timezone_set('Europe/Athens');

 
/*  function ticketassigned(){
   $connect = new PDO("mysql:host=localhost;dbname=atest", "root", "");
    
    $query = "SELECT * FROM assign inner join tickets on assign.FKTicketID=tickets.TicketID 
	inner join users on users.UserID=assign.FKUserID where TicketNumber= $ticketno";

    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    
    foreach($result as $row){
		
    echo $row['DisplayName'];
	
    }
	 } */
	 
	 function SelectStafftoAssign(){
 $connect = new PDO("mysql:host=localhost;dbname=atest", "root", "arstl1719");
	 
	 
     $selectstaff = '';
    
    $query = "SELECT DISTINCT DisplayName FROM users where Usertype='admin' ORDER BY DisplayName ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    
    foreach($result as $row){
       $selectstaff .= '<option value="'.$row['DisplayName'].'">'.$row['DisplayName'].'</option>';
	    
    }return  $selectstaff;
	
	
	 }
	 

	 
		 function tabletickets(){
	/* $ticketid = $_GET['TicketID'];
 		$ticketno=$_GET['TicketNumber'];
  $connect = new PDO("mysql:host=localhost;dbname=atest", "root", "");
    
    $query = "SELECT * FROM tickets join status on FKStatus=StatusID  order by CreationDate desc;";

    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    
    foreach($result as $row){
		
		$ticketno=$row['TicketNumber'];
	$ticketid=$row['TicketID'];
    $subject = $row['Subject'];
	$problem = $row['Problem'];	
	$category=$row['Category'] ;
	$creationdate=$row['CreationDate'];
    $priority=$row['Priority'];
	$status=$row['StatusText'];
	echo "<tr><td id='ticketno'><a href=ticket-reply.php?". $ticketno ."  >". $ticketno . "</a> </td>";
	echo "<td> ". $subject . "</td>";
	echo "<td> ". $category . "</td>";
	echo "<td> ". $problem . "</td>";
	echo "<td> ". $priority . "</td>";
	echo "<td> ". $creationdate . "</td>";
	
			 if ($row['FKStatus']== 2 && $row['ReplyID']==null){									
		$now = time(); // or your date as well
		$creationdate = strtotime($row['CreationDate']);
		$datediff = $now - $creationdate;
	
		$dt=round($datediff / (60 * 60 * 24));
			
		echo "<td><p class='blink'>". $status . "</p>Ημέρες καθυστέρησης: " . $dt . "</td></br> ";
					}
		else echo "<td>". $status . "</td>";

	echo "<form action='' method='post'><td id='anathesi'><select name='helpdeskuser' id='helpdeskuser'
		class='form-control' style='width:80%'><option>Επιλογή...".SelectStafftoAssign() ."</option>
		</td>";
		echo "<td></td>";
		echo "<td> <input  name='ticketid' value=".  $ticketid." />  <input type='submit' class='btn btn-success' style='width:80%' name='assign' method='post' value='Αποθήκευση Ανάθεσης' >              
              
		</td></tr>  </form>";
			
	}if(isset($_POST['helpdeskuser'])){
		 if (isset($_POST['assign'])) {
									$helpdeskuser = $_POST['helpdeskuser'];
								$asssigndate=date("Y-m-d H:i:s");
							
									
 	$sql = "INSERT INTO assign (FKTicketID, FKUserID, AssignDate)
	 VALUES (('$ticketid'),
	 (select UserID from users where usertype = 'admin' and  DisplayName='$helpdeskuser'), ('$asssigndate'))"; 

	 if (mysqli_query($link, $sql)) {
		 echo "<script type='text/javascript'>alert('Το αίτημα σας υποβλήθηκε με επιτυχία!')</script>" ;

	 } else {
		echo "<script type='text/javascript'>alert('Λάθος!Παρακαλούμε επιλέξτε σε 
		ποιον χρήστη θα γίνει ανάθεση του ticket')</script> " .$helpdeskuser. $ticketid;
		}}
	 mysqli_close($link); 
									 	
						}
                       */
		}

	/* 		function ticketassigned(){
				$ticketid = isset($_REQUEST['ticketid']) ? $_REQUEST['ticketid'] : "";
				$ticketno=$_GET['ticketid'];
   $connect = new PDO("mysql:host=localhost;dbname=atest", "root", "");
    
    $query = "SELECT * FROM assign inner join tickets on assign.FKTicketID=tickets.TicketID 
	inner join users on users.UserID=assign.FKUserID where TicketNumber= $ticketid";

    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    
    foreach($result as $row){
		$ticketid=$row['ticketid'];
    echo $row['DisplayName']."<br>";
    }
	  echo $row['DisplayName']."<br>";
	return $row;
	 }  */

	 ?>
	 