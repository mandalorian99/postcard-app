<?php 
/*
 * This file run mannual , on running this script create a table name 'pc_image'
 * ----------------------------------------------------------------------------
 * 					   | image_id * | image_url | description |
 * ----------------------------------------------------------------------------
 * 					   | integer    | varchar   | varchar     |
 */

require_once('db.inc.php') ;

/* connectiong to mysql databse */
$conn = mysqli_connect(MYSQL_HOST , MYSQL_USER , MYSQL_PASSWORD , MYSQL_DATABASE) ;
	if( !$conn ){
		echo "databse not connected :".mysqli_error($conn) ;
	}
//creating a table name pc_image 
	$query = 'CREATE TABLE IF NOT EXISTS pc_image(
			  image_id		INT  NOT NULL AUTO_INCREMENT ,
			  image_url		VARCHAR(255) 	NOT NULL DEFAULT " "     ,
			  description   VARCHAR(255)    NOT NULL DEFAULT " "     ,

			  PRIMARY KEY(image_id)
	)' ;

	mysqli_query($conn , $query) or die("table not created scuccessfully ".mysqli_error($conn) );
	//path of folder where it is placde...change accrding to your live server
	$images_path = "postcard_pic/" ;

	//inserting images into table 

	$query = 'INSERT INTO pc_image (image_id , image_url ,description ) 
			  VALUES 
			  ( 1 , "'.$images_path.'img1.jpg" , "you are in dream" ) ,
			  ( 2 , "'.$images_path.'img2.jpg" , "congralutaion" ) ,
			  ( 3 , "'.$images_path.'img3.jpg" , "we met again" ) ,
			  ( 4 , "'.$images_path.'img4.jpg" , "love you so much" ) ,
			  ( 5 , "'.$images_path.'img5.jpg" , "Happy new year" ) ,
			  ( 6 , "'.$images_path.'img6.jpg" , "merry chrismas" ) ,
			  ( 7 , "'.$images_path.'img7.jpg" , "happy holi" ) 
	' ;

	mysqli_query($conn , $query) or die("error while inserting data :".mysqli_error($conn)) ;

	echo "-----------success------------------" ;

?>