<?php 
$product_name = $_POST["name_movie"];
$price = 500;
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];

$conn=new mysqli("localhost","root","","movie");
$sql = "INSERT INTO forms (Purpose,Amount,Name,Email,Phone) VALUES (`$product_name`, `$price`, `$name`, `$email`, `$phone`)";


include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_22d83102a17a377441bbf166d22', 'test_f196a0d4c066100c8646a4fb368','https://test.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "http://localhost/MOVIE-BOOKING-WEBSITE/thankyou.php",
        "webhook" => ""
        ));
    //print_r($response);

    $pay_ulr = $response['longurl'];
    
    //Redirect($response['longurl'],302); //Go to Payment page

    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
  ?>