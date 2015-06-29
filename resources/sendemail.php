<?php
 
if(isset($_POST['email'])) {

 
    $email_to = "nourdt@live.com";
 
    $email_subject = "From Email";
 
     
 
     
 
    function died($error) {
 
        
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Wanna take a second look ?.<br /><br />";
 
        die();
 
    }
 
     
 
    
 
    if(!isset($_POST['Name']) ||
 
        !isset($_POST['Subject']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['textbox'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $Name = $_POST['Name']; // required
 
    $Subject = $_POST['Subject']; // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // not required
 
    $comments = $_POST['comments']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$Name)) {
 
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
 
  }
 
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The message you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($Name)."\n";
 
    $email_message .= "Subject: ".clean_string($Subject)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
This is an automated message to let you know that we have received your enquiry. We'll get back to you as soon as possible.

-Skuares team
 
 
<?php
 
}
 
?>
