<?php

include 'src/instamojo.php';
// include 'connect.php';

$api = new Instamojo\Instamojo('test_22d83102a17a377441bbf166d22', 'test_f196a0d4c066100c8646a4fb368','https://test.instamojo.com/api/1.1/');

$payid = $_GET["payment_request_id"];

$conn=new mysqli("localhost","root","","movie");
    $response = $api->paymentRequestStatus($payid);
    
    $purpose=$response['purpose'];
    $amount=$response['payments'][0]['amount'];
    $name=$response['payments'][0]['buyer_name'];
    $email=$response['payments'][0]['buyer_email'];
    $phone=$response['payments'][0]['buyer_phone'];
    $transaction_id=$response['payments'][0]['payment_id'];
    $status=$response['status'];
	
    
    
    $sql = "INSERT INTO forms (`Purpose`,`Amount`,`Name`,`Email`,`Phone`,`Status`) VALUES (`$purpose`, `$amount`, `$name`, `$email`, `$phone`,`$status`)";
    $conn->query($sql);
    $conn->close();


  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Thank You, Mojo</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container">

      <div class="page-header">
        <h1><a href="index.php">Thank You, Payment success!!</a></h1>
        <p class="lead"></p>
      </div>
  
      <h3 style="color:#6da552">Your ticket would be mailed to you soon !!</h3>
  




  </body>
</html>