<?php 
//importing database credentials
require_once('db.inc.php');

//connecting to databse 
$conn = mysqli_connect(MYSQL_HOST , MYSQL_USER , MYSQL_PASSWORD ,MYSQL_DATABASE ) ;
	if(!$conn)
		die("<em>databse not connected..</em>".mysqli_query($conn) );

//fetching id and token form url using get 
	$id    = $_GET['id'] ;
	$token = $_GET['token'] ;
$query = 'SELECT email_id , token , to_name , to_email , from_name ,from_email ,subject ,postcard , message  FROM pc_confirmation WHERE email_id="'.$id.'" AND token="'.$token.'" ';
//parsing mysqli query
$result = mysqli_query($conn , $query) or die("query not parsed.".mysqli_error($conn) );

if(mysqli_num_rows($result) == 0 ){
	echo'<p>ooops !! nothing to view </p>';
	mysqli_free_result($result);
	exit;
}else{
	$row = mysqli_fetch_assoc($result);
	extract($row);
	mysqli_free_result($result) ;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>view postcard</title>
</head>
<body>
<?php
echo'<p>subject :"'.$subject.'"</p>';
echo'<p><img src="'.$postcard.'" /></p>' ;
echo $message ;
?>
</body>
</html>