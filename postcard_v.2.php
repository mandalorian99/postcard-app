<?php 
/*
 * this php file responsible for collecting user input from sender which include a img
 * which is send along the email .
 */
//importing database credential's 
require_once('db.inc.php') ;

//connecting to databse >pc_image 
$conn = mysqli_connect( MYSQL_HOST , MYSQL_USER , MYSQL_PASSWORD , MYSQL_DATABASE ) ;

	if(!$conn)
		die( "<em>databse not connected :</em>".mysqli_error($conn) ) ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>postcard app | send mail to your loveones</title>

<script type="text/javascript">
function changeImage() {
var s = document.getElementById("postcard_select");
var picVal = s.options[s.selectedIndex].value;
var pictxt = s.options[s.selectedIndex].text;
console.log("image path:"+picVal) ;
console.log("desciption:"+pictxt) ;
document.getElementById("postcard").src=picVal ;
document.getElementById("postcard").alt=pictxt ;
}
</script>
	<style type="text/css">
		.wrapper{
			display: block ;
			background: gray ;
			padding:20px;
			text-align: center;
			color:#ffff  ;
			font-size: 20px;
		}
		table{
			background: pink ;
			margin: auto ;
			opacity: 10 ;
		}
		td{
			text-align: left;
			
		}
		img{
			width :500px;
			height: 500px;

		}
	</style>
</head>
<body>
	<div class="wrapper">
		<h2>Send your friend a post card !!!!</h2>
		<form method="post" action="sendconfirm.php">
			<table>
				<tr>
					<td><label for="from_name">Sender's Name</label></td>
					<td><input type="text" name="from_name"></td>
				</tr>
				<tr>
					<td><label for="from_email">Sender's Email</label></td>
					<td><input type="email"  name="from_email"></td>
				</tr>
				<tr>
					<td><label for="recip_email">Recipient Email</label></td>
					<td><input type="text" name="recip_email"></td>
				</tr>
				<tr>
					<td><label for="recip_name">Recipient Name</label></td>
					<td><input type="text" name="recip_name"></td>
				</tr>
				<tr>
					<td><label for="">Choose Your Postcard</label></td>
					<td><select name="postcard" id="postcard_select" onchange="changeImage()">
						<?php 
						/* 
						 * fetching descriptionn and image path 
						 * from database table pc_image
						 */
						$query = 'SELECT image_url , description 
								  FROM pc_image 
								  ORDER BY description
								 ' ;
						//parsing query  
						$result = mysqli_query( $conn , $query ) or die("cant fetch..") ;
						$row =mysqli_fetch_assoc( $result ) ;
						print_r($result);
						echo"<br/>---------<br/>";
						print_r($row) ;
						echo"<br/>---------<br/>";
						extract($row) ; 
						echo"<br/>---------<br/>";
						/*LOOP through data and insert dynamically in html*/
						while( $row = mysqli_fetch_assoc($result) ){
							echo'<option value="'.$row['image_url'].'">'.$row['description'].'</option>' ;
						}

						?>
					</select></td>
				</tr>
				<tr>
					<td colspan="2">
					<img id="postcard" src="postcard_pic/img1.jpg" alt="congratulation" >
				    </td>
				</tr>
				<tr>
					<td><label for="recip_subject">Subject</label></td>
					<td><input type="text" name="recip_subject"></td>
				</tr>
				<tr>
					<td valign="top"><label for="recip_msg">Message</label></td>
					<td><textarea name="recip_msg" id="" cols="30" rows="10" placeholder="enter your message here....." ></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="send mail"></td>
					<td><input type="reset" name="reset" value="clear"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>