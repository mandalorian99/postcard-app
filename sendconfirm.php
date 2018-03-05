<?php 
/*
 *  @ this srcipt collect data of all the field items of postcard_v.2.php file 
 *  @ which include path of image to be send .
 *	@ Here a uqique token and email id is generated ,which is inserted in  
 *  @  table-pc_confirmation 
 *	@ then a confirmation mail send to the sender which include a link include unique 
 *  @  token and email id ..
 *  @ when user click on this click , he/she redirected to the confirm.php script .
 *  @ this confirm.php script takes token and email id and match against database.
 *	@ if result is true ..a postcard email is send to the reciptent .
 */

//importing database credentials 
require_once('db.inc.php') ;

//connecting to database .
$conn = mysqli_connect( MYSQL_HOST , MYSQL_USER , MYSQL_PASSWORD , MYSQL_DATABASE ) ;
	if( !$conn )
		die("database not connected :".mysqli_error($conn) ) ;


//fetching user input data from postcar_v.2.php file 
if( isset( $_POST['submit'] ) ){
	$to_name   = $_POST['recip_name'] ;
	$to_email  = $_POST['recip_email'] ;

	$from_name = $_POST['from_name'] ;
	$from_email= $_POST['from_email'] ;

	$postcard_img_path = $_POST['postcard'] ;

	$subject = $_POST['recip_subject'] ; 
	$message = $_POST['recip_msg'] ; 
	print_r($_POST) ;

//generating a randwom token , we using md5() encryptin buil in php function. 
	$token = md5( time() ) ;

/*inserting above data into pc_confirmation table*/
 $query ='INSERT INTO pc_confirmation 
 		  (email_id,token,to_email,to_name,from_name,from_email,subject,postcard,message)
 		  VALUES(
			NULL , 
			"'.$token.'"     ,
			"'.$to_email.'"   ,
			"'.$to_name.'"  ,
			"'.$from_name.'" ,
			"'.$from_email.'",
			"'.$subject.'"   ,
			"'.$postcard_img_path.'",
			"'.$message.'"
 		  )' ;

//parsing sql query 
 mysqli_query( $conn , $query ) or die("<h3>failed...</h3> : ".mysqli_error( $conn) );

/* 
 * php buil-in-function mysqli_insert_id() functin return latest auto increment key 
 * so we fetch email id and use it later to send along with toeken in confirm mail 
 */
 $email_id = mysql_insert_id($conn) ;
 echo "<strong>email id =<strong>"$email_id ;

/*
 * defining  multipart messae header for a email 
 */
$header = array() ;
$header[] = 'MIME-Version:1.0' ;
$header[] = 'Content-type: text/html; charset="iso-8859-1" ' ;
$header[] = 'Content-Transfer-Encoding: 7bit' ;
$heaers[] = 'From: '.$from_email.'' ;

$confirm_subject = 'Please confirm your postcard [ '.$subject.' ]' ;

/*-------------------MESSAGE BODY HTML------------------------------------------------*/
$confirm_message  = '<html>' ;
$confirm_message .= '<p>Hello , '.$from_name.'.Please click on the link below to confirm that you would like to send this postcard</p>' ;
$confirm_message .= '<p> <a href = "confirm.php?id='.$email_id.'&token='.$token.'" >Click here to confirm </a> </p>' ;
$confirm_message .= '<hr/>' ;
$confirm_message .= '<p> <img src="'.$postcard_img_path.'"  /></p>';
$confirm_message .= '<br/>'.$message ;
$confirm_message .= '</html>';
/*--------------------MESSAGE BODY END--------------------------------------------------*/

}else{
	echo "form not submitted yet...." ;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>confirm your email</title>
</head>
<body>
<?php 
// now intiating the mail process 
$success = mail( $from_email,$confirm_subject,$confirm_message,join( "\r\n",$header) ) ;

	if( $success ){
		echo '<h1>Pending Confirmation !!!</h1>' ;
		echo '<p>A confirmation mail is send to your email '.$from_email.' open your email and click on the link to confirm that you would like to send this postcard to '.$to_name.'</p>';
		echo'<br/>---------------<br/>' ;
		echo $confirm_message;
	}else{
		echo'<p><strong>There was an error sending the confirmatin mail .</strong></p>';
	}
?>
</body>
</html>