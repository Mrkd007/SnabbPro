<?php


 	$message ="jalksjdlsaj";

    $email1 ="itskd17@gmail.com";
 
   	$email_subject = "New Form submission from ";

  	$to = "snabbpro@gmail.com";
 
  	$headers = '$email1';
 
  	if (mail($to,$email_subject,$message,$headers))
  	{
  		echo "Thanks for using our service we are there shortly.";
  	}
  	else
  	{
  		echo "Some Error occured. Please try again.";
  	}

	
?>