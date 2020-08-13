<?php

$email=$_POST['email'];
$password=$_POST['password'];

$database =  "hariscorp_zfhlibrary";
$conn = mysqli_connect(
    // Hostname
    "68.183.162.131",
    // Username
    "hariscorp_hariscorp",
    // Password 
    "kdw{koz4]c[%",
    // Database
    $database,
    // Port
    3306

);
$check_email="select id from `Admin` where email='{$email}'";
$result= mysqli_query($conn,$check_email);

if($result){
 $update_password ="update `Admin` SET password='{$password}' where email='{$email}'";
 $result2=mysqli_query($conn,$update_password);
 if($result2){
     echo "Your Password has been updated!";
 }
 else{
     echo "Password Updation Failed!";
 }
}
else{
    echo "Email Doesn't Exist!";
}
?>