<?php 
/* Object Variable Declaration ----------- */
$err_resp = array();
$err_resp['error'] = false;
$err_resp['name_error'] = "";
$err_resp['email_error'] = "";
$err_resp['phone_error'] = "";
$err_resp['message_error'] = "";


/* Form Validation ----------- */

if (!isset($_POST["name"]) || $_POST['name'] == "") {
      $err_resp['name_error'] = "<span>Name is required.</span>";
      $err_resp['error'] = true;
}

if (!isset($_POST["email"]) || $_POST['email'] == "") {
      $err_resp['email_error'] = "<span>E-mail is required.</span>";
      $err_resp['error'] = true;
}

if (!isset($_POST["phone"]) || $_POST['phone'] == "") {
      $err_resp['phone_error'] = "<span>Phone is required.</span>";
      $err_resp['error'] = true;
}

if (!isset($_POST["message"]) || $_POST['message'] == "") {
      $err_resp['message_error'] = "<span>Message is required.</span>";
      $err_resp['error'] = true;
}

/* Exit if error ----------- */

if ($err_resp['error']) {
      header('Content-Type: application/json; charset=utf-8');
      echo json_encode($err_resp);
}

/* Else send Email ----------- */

else {
      $from = "info@sarasaservices.com";
      $to_email = "info@itechvision.co.jp";

      $subject="Message from SarasaServices Home Page.";

      $message = "<table>";
      $message .= "<tr><td>Name</td><td>".$_POST["name"]."</td></tr>";
      $message .= "<tr><td>Email</td><td>".$_POST["email"]."</td></tr>";
      $message .= "<tr><td>Phone</td><td>".$_POST["phone"]."</td></tr>";
      $message .= "<tr><td>Message</td><td>".$_POST["message"]."</td></tr>";
      $message .= "</table>";

      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=utf-8\r\n";
      $headers .= "From: $from\r\n";

      mail($to_email, $subject, $message, $headers);


      header('Content-Type: application/json; charset=utf-8');
      $suc_resp = array('success' => "Thank you for your Enquiry.");
      echo json_encode($suc_resp);
}

