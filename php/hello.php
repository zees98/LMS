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



    $queryInsertUser = '

        Insert into
        
            Member(id,firstname,lastname,email,password,phone,dob,gender,image_path) 
        
        VALUES ("", "Zeeshan", "Ali", "zeeshanhamdani98@gmail.com", "1234", "03005531902","1998-11-06", "M" , null)';

    $execInsertQuery = mysqli_query($conn, $queryInsertUser);

    echo "<br>".$execInsertQuery;


$conn -> close();


?>