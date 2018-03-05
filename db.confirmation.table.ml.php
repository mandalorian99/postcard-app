<?php 
/*
 * this php script is responsible for creating a table name 'pc_confirmation'
 * structure is :
 *________________________________________________________________________________
 * |email_id|token|to_email|to_name|from_name|from_email|subject|postcard|message|
 *--------------------------------------------------------------------------------
 * |int*    |var  |var     |varc   |varchar  |varchar   |varchar|varchar |text   |
 *--------------------------------------------------------------------------------
 */
require_once('db.inc.php') ;

//connecting to databse
$conn = mysqli_connect(MYSQL_HOST , MYSQL_USER ,MYSQL_PASSWORD ,MYSQL_DATABASE) ;
	
	if(!$conn)
		die("db link not established <h3>".mysqli_error($conn)."</h3>") ;

//sql query for creating table pc_confirmation 
	$query = 'CREATE TABLE IF NOT EXISTS pc_confirmation(
			  email_id		INT UNSIGNED	NOT NULL AUTO_INCREMENT 	,
			  token			char(32)     	NOT NULL 					,
			  to_email		VARCHAR(100)    NOT NULL  					,
			  to_name		VARCHAR(50)     NOT NULL					,
			  from_name		VARCHAR(50)     NOT NULL					,
			  from_email	VARCHAR(100)    NOT NULL 					,
			  subject		VARCHAR(255)    NOT NULL 					,
			  postcard		VARCHAR(255)    NOT NULL 					,
			  message		TEXT 										,

			  PRIMARY KEY(email_id)
    		  )'; 

  //parsing sql query 
 mysqli_query($conn , $query) or die("oops something wrong <em>".mysqli_query()."</em>" );

 echo "------------suceess------------" ;

?>