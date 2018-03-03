<?php 
 $result =mail('localhost.mahendra@thecodestuff.com' , 'hello world ' , 'hi,world .prepar for mail blast' , 'From : mahendra choudhary<mahendra@thecodestuff.com>') ;

     if($result)
     	echo 'email send '.$result ;
     else 
     	echo 'email not send '.$result ;
?>