<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>postcard app | send mail to your loveones</title>

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
	</style>
</head>
<body>
	<div class="wrapper">
		<h2>Send your friend a post card !!!!</h2>
		<form method="post" action="http://localhost/cms-comicsite/ch 11 sending email/sendmail.php">
			<table>
				<tr>
					<td><label for="recip_email">To</label></td>
					<td><input type="text" name="recip_email"></td>
				</tr>
				<tr>
					<td><label for="sender_email">From</label></td>
					<td><input type="text" name="sender_email"></td>
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