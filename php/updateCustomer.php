<?php
//9
// if (isset($_POST["id"]) isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["phoneno"]) && isset($_POST["dob"]) && isset($_POST["gender"]) && isset($_POST["password"])) {
    $id=$_POST['id'];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phoneno = $_POST["phoneno"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $imgurl = $_POST["img_url"];


    // $id=28;
    // $firstname = "fahad";
    // $lastname = "mustafa";
    // $email = "fahadmustafa@jeeto.com";
    // $phoneno = "00923351667888";
    // $dob = "1994-08-07";
    // $gender = "M";
    // $password = "1234";

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
$update_query= "update Member set firstname='{$firstname}', lastname='{$lastname}', email='{$email}', password='{$password}',phone='{$phoneno}',dob='{$dob}',gender='{$gender}',image_path='{$imgurl}' WHERE id='{$id}'";
    $exec_query = mysqli_query($conn, $update_query);

    if ($exec_query) {
        echo "Profile Updated Successfully!";
    } else {
        echo "<br><br>updation error";
    }

    ?>