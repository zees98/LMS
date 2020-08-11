<?php

if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["phoneno"]) && isset($_POST["dob"]) && isset($_POST["gender"]) && isset($_POST["password"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phoneno = $_POST["phoneno"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    // $imgurl = $_POST["img_url"];

    

    $conn = $conn = mysqli_connect(
        "68.183.162.131",
        "hariscorp_hariscorp",
        "kdw{koz4]c[%",
        "hariscorp_zfhlibrary",
        3306
    );

    if ($conn) {
        echo "connected!!!!";
    } else {
        echo "failed";
    }

    $query = "INSERT INTO `Member`(`firstname`, `lastname`, `email`, `password`, `phone`, `dob`, `gender`) VALUES ('$firstname','$lastname','$email','$password','$phoneno', '$dob','$gender')";

    $exec_insert = mysqli_query($conn, $query);

    if ($exec_insert) {
        echo "<br><br>data inserted";
    } else {
        echo "<br><br>insertion error";
    }
} else {
    echo "<br>isset failed";
}
?>