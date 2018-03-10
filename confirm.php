<?php 
/*
 * this script intiate when sender click the confirmation link  in its mail
 * the confirmation link had two unique parameter email id and token 
 * this script fetch both email id and token from link via $_GET method
 * then this script match both parameter from the values of database 
 * if we found these value in database then it is confirm that it is valid it 
 */

//importing database connecting credentials
require_once('db.inc.php') ;

//connecting to database 
$conn = mysqli_connect(MYSQL_HOST , MYSQL_USER ,MYSQL_PASSWORD, MYSQL_DATABASE) ;
	if(!$conn)
		die("<em>database not connected :</em>".mysqli_error($conn) ) ;

//fetching the parameters 
 $email_id = ( isset( $_GET['id']  ) )? $_GET['id']: 0 ;
 $token    = ( isset( $_GET['token']  ) )? $_GET['token'] : '' ;

//matching email_id and token against database record in pc_confirmation table
 $query = 'SELECT email_id , token , to_name ,to_email , from_name ,from_email , subject ,postcard ,message FROM  pc_confirmation WHERE email_id = "'.$email_id.'" AND token ="'.$token.'" ' ;
 $result = mysqli_query($conn,$query) or die("query faile".mysqli_query($conn) ) ;
	// if query gives result ,it valid email id
	if( mysqli_num_rows($result) == 0 ){
		echo'<p>oops ! we are not able to confirm your identity</p>';
		mysqli_free_result($result) ;
	}else{
		$row = mysqli_fetch_assoc($result) ;
		print_r($row) ;
		 
		print("<br/>");	
		print_r(extract($row) );
		mysqli_free_result($result) ;
	}
//sending email to the reciptent 
	$boundary = '==MP_Bound_Xyccr948x==' ;
/*
 * defining  multipart messae header for a email 
 */
$header = array() ;
$header[] = 'MIME-Version:1.0' ;
$header[] = 'Content-type: multipart/alternative; boundary="'.$boundary.'"  ' ;
$header[] = 'Content-Transfer-Encoding: 7bit' ;
$heaers[] = 'From: '.$from_email.'' ;

//html email body
$postcard_message  ='<html>' ;
$postcard_message .='<p>Greetings </p>'.$to_name ;
$postcard_message .=$from_name.' has send you a postcard today';
$postcard_message .='<p>Enjoy!!!</p>' ;
$postcard_message .='<hr/>';
$postcard_message .='<img src="'.$postcard.'" alt="postcard image"/> <br/>' ;
$postcard_message .='<p>"'.$message.'"</p>';
$postcard_message .='<hr/>';
$postcard_message .='<p>you can also visit this link to see your postcard :</p>';
$postcard_message .='<a href="viewpostcard.php?id='.$email_id.'&token='.$token.'">click here to view postcard online</a>';
$postcard_message .='</html>'; 
//plain email message 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>conifrming email </title>
</head>
<body>
<?php 
//sending mail 
$success = mail($to_email , $subject ,$message , join("\r\n",$header) );

	if($success){
		echo '<h1>Congratulations!!</h1>';
		echo'<p>the following postcard has been sent to'.$to_name.'</p>' ;
		echo'<p>'.$message.'</p>';
	}else{
		echo'<p><strong>there was a error sending your message</strong></p>' ;
		echo'<br/>';
		echo $postcard_message ;//this line is for test purpose only ...
	}
?>
</body>
</html>