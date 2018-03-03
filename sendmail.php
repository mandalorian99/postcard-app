<?php
/*
 ~ This script collect and send data to the server ,where server use mail() funciton to 
 ~ send a simple mail to the mentioned email .
 ~  syntax ---- mail( to , subject , message , header)
 */

/*
 * validating data and fetching from the html form 
 */

if( isset( $_POST['submit'] ) ){

	$recip_email   = $_POST['recip_email'] ;
	$sender_email  = $_POST['sender_email'] ;
	$recip_subject = $_POST['recip_subject'] ;
	$recip_msg     = $_POST['recip_msg'] ;
    
    $header = array() ;

	$header[] = 'MIME-VERSION: 1.0' ;
	$header[] ='Content-type: text/html; charset=iso-8859-1' ;
	$header[] ='Content-Transfer-Encoding: 7bit' ;
	$header[] ='From:'.$sender_email.'' ;

	print_r($_POST) ;

   /*
    * using in build function to send mail to reciptent ...
    */

   $success = mail( $recip_email , $recip_subject , $recip_msg , join("\r\n",$header) ) ;

   	if( $success ){
   		$message = "Your mail is send successfully to ".$recip_email.""  ;
   		$message .="\r\n your subject ['".$recip_subject."']  " ;
   		$message .= "you said that ['".$recip_msg."']" ;
   		echo $message ;
    }else{
	  echo"<br/>message is not sent" ;
	$flag = "fail" ;
    }

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mail send | 
		<?php 
		    if($success){
	 		 echo"success"  ;
	 		}else{
	 			echo $flag ;
	 		} ?>
	 		
	</title>
</head>
<body>
<?php 
	echo $message ;
?>
</body>
</html>