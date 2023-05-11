<?php

//update.php

include('database_connection.php');

$query = "
UPDATE users
SET ".$_POST["name"]." = '".$_POST["value"]."' 
WHERE UserID = '".$_POST["pk"]."'
";

$connect->query($query);

?>