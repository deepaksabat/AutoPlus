<?php 
$to = 'info@mediacity.co.in'; // Put in your email address here
$subject  = "Appointment Form"; // The default subject. Will appear by default in all messages. Change this if you want.

// User info (DO NOT EDIT!)
$name = stripslashes($_REQUEST['name']); // sender's name
$email = stripslashes($_REQUEST['email']); // sender's email
$servicetype = stripslashes($_REQUEST['service-type']);
$vehicalmake = stripslashes($_REQUEST['vehical-make']);
$vehicalmodel = stripslashes($_REQUEST['vehical-model']);
$appointmentdate = stripslashes($_REQUEST['appointment-date']);
$appointmenttime = stripslashes($_REQUEST['appointment-time']);
$phone = stripslashes($_REQUEST['phone']);
$message = stripslashes($_REQUEST['message']);

$msg = "";

// The message you will receive in your mailbox
// Each parts are commented to help you understand what it does exaclty.
// YOU DON'T NEED TO EDIT IT BELOW BUT IF YOU DO, DO IT WITH CAUTION!
$msg .= "Name: ".$name."\r\n\n";  // add sender's name to the message
$msg .= "E-mail: ".$email."\r\n\n";  // add sender's email to the message
$msg .= "Service Type: ".$servicetype."\r\n\n";  // add sender's sources to the message
$msg .= "Vehical Model: ".$vehicalmodel."\r\n\n";  // add sender's sources to the message
$msg .= "Vehical Made: ".$vehicalmake."\r\n\n";  // add sender's sources to the message
$msg .= "Appointment Date: ".$appointmentdate."\r\n\n";  // add sender's sources to the message
$msg .= "Appointment Time: ".$appointmenttime."\r\n\n";  // add sender's sources to the message
$msg .= "Phone: ".$phone."\r\n\n";  // add sender's sources to the message

$msg .= "Message: ".$message."\r\n\n";  // add sender's checkboxes to the message
$msg .= "\r\n\n"; 

$mail = @mail($to, $subject, $msg, "From:".$email);  // This command sends the e-mail to the e-mail address contained in the $to variable
echo $msg;
if($mail) {
	header("Location:index.html");	
} else {
	echo 'Message could not be sent!';   //This is the message that will be shown when an error occured: the message was not send
}

?>