<?php

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    // if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    //     echo "Incorrect Email";
    // } else if (!(strlen($password) > 8)) {
    //     echo "Incorrect Password";
    // } else {
        $conn = mysqli_connect(
            "68.183.162.131",
            "hariscorp_hariscorp",
            "kdw{koz4]c[%",
            "hariscorp_zfhlibrary",
            3306
        );
        if ($conn) {
            $admin_login_query = "
        SELECT 
            * 
        FROM 
            `Member` 
        WHERE
            email = '$username' and password = '$password'";

            $exec_login_query = mysqli_query($conn, $admin_login_query);

            $rows = mysqli_num_rows($exec_login_query);

            if ($rows == 1) {
                echo "success";

                $data = mysqli_fetch_array($exec_login_query);

                $id = $data["id"];
                $fname = $data["firstname"];
                $lname = $data["lastname"];
                $img = $data["image_path"] ?? "";


                session_start();
                $_SESSION["member_id"] = $id;
                $_SESSION["first_name"] = $fname;
                $_SESSION["last_name"] = $lname;
                $_SESSION["member_img"] = $img;
            } else
                echo "failed";
        }
    // }
}
