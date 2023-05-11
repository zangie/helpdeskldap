<?php

//fetch.php

include('database_connection.php');

$column = array("userid", "usertype","pclogin", "description", "department", "office", "phone", "registerdate", "validated", "selfregister");

$query = "SELECT * FROM users ";

if(isset($_POST["search"]["value"]))
{
	$query .= '
	WHERE DisplayName LIKE "%'.$_POST["search"]["value"].'%" 
	OR PCLogin LIKE "%'.$_POST["search"]["value"].'%" 
	OR Description LIKE "%'.$_POST["search"]["value"].'%" 
	OR Description LIKE "%'.$_POST["search"]["value"].'%" 
	';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY UserID DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
	$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$result = $connect->query($query . $query1);

$data = array();

foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row['UserID'];
	$sub_array[] = $row['DisplayName'];
	$sub_array[] = $row['UserType'];
	$sub_array[] = $row['PCLogin'];
	$sub_array[] = $row['Description'];
	$sub_array[] = $row['Department'];
	$sub_array[] = $row['Office'];
	$sub_array[] = $row['Phone'];
	$sub_array[] = $row['RegisterDate'];
	$sub_array[] = $row['Validated'];
	$sub_array[] = $row['SelfRegister'];
	$data[] = $sub_array;
}

function count_all_data($connect)
{
	$query = "SELECT * FROM users";

	$statement = $connect->prepare($query);

	$statement->execute();

	return $statement->rowCount();
}

$output = array(
	'draw'		=>	intval($_POST['draw']),
	'recordsTotal'	=>	count_all_data($connect),
	'recordsFiltered'	=>	$number_filter_row,
	'data'		=>	$data
);

echo json_encode($output);

?>