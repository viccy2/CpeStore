<?php
require 'dc.php';
session_start();
// function for form validation
function validateData($data)
{
    $resultData = htmlspecialchars(stripslashes(trim($data)));
    return $resultData;
};

$name    	=    		strtolower(validateData($_POST['name']));
$price    	=    		strtolower(validateData($_POST['price']));
$quantity   =   		strtolower(validateData($_POST['quantity']));

$target_dir = "pics/";
$target_file = strtolower($target_dir . basename($_FILES["fileToUpload"]["name"]));
$time = time();
$image_name = $_FILES["fileToUpload"]["name"];
$image_type = $_FILES["fileToUpload"]["type"];
$tmp_name =  $_FILES["fileToUpload"]["tmp_name"];
$image_explode = explode('.', $image_name);
$image_ext = end($image_explode);
$extensions = ['png', 'jpeg', 'jpg'];
$new_image =  $time.$image_name;
if ($target_file=="pics/") {
	echo "error";
}
else{
	$save = mysqli_query($con,"insert into product_tb (product_name,product_price,product_quantity,product_image,product)values('$name','$price','$quantity','pics/$new_image','yes')");
	move_uploaded_file($tmp_name,"pics/".$new_image);
	echo "added successfully";
}




?>