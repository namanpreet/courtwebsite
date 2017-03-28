<?php
 
if(isset($_POST['email'])) {
 
     
 
    $email_to = "manpreetsingh.singh05@gmail.com";
    $email_subject = "Appointment request from website";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['phone']) ||
 
        !isset($_POST['email'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $name = $_POST['name']; // required
 
    $phone = $_POST['phone']; // required
 
    $email_from = $_POST['email']; // required
	
	$date = $_POST['date'];//not required
 
    $address = $_POST['address']; //not required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .']+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'Name you entered does not appear to be valid.<br />';
 
  }
 
	if(preg_match("/^[0-9]{9}$/", $phone)) {
 
 
    $error_message .= 'The Phone you entered does not appear to be valid.<br />';
 
  }
	
  if(strlen($address) < 4 && strlen($address) > 0) {
 
    $error_message .= 'The Address you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
   $email_message .= "Phone: ".clean_string($phone)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Preferable Date: ".clean_string($date)."\n";
	
    $email_message .= "Address: ".clean_string($address)."\n";
 
 
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
 
<head>

<meta http-equiv="refresh" content="0; url=contact_msg.html">

 </head> 
 
<?php
 
}
 
?>