<?php
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
echo $conn ? "Connected" : "Failed";


$queryInsertUser = 'Insert into 2EeU51fxMG.users VALUES ("", "Zeeshan98", "Zeeshan Ali", "1234")';

$execInsertQuery = mysqli_query($conn, $queryInsertUser);

echo $execInsertQuery;

?>