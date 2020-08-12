<?php

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $conn = $conn = mysqli_connect(
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
            `Admin` 
        WHERE
            email = '$username' and password = '$password'";

        $exec_login_query = mysqli_query($conn, $admin_login_query);

        $rows = mysqli_num_rows($exec_login_query);

        if ($rows == 1){
            echo "success";
            
            $data = mysqli_fetch_array($exec_login_query);

            $id = $data["id"];
            $name = $data["name"];
            $img = $data["img_path"];
            // $em = $data["email"];
            // $pass = $data["password"];

            session_start();
            $_SESSION["admin_id"] = $id;
            $_SESSION["admin_name"] = $name;
            $_SESSION["admin_img"] = $img;
            // $_SESSION["admin_email"] = $em;
            // $_SESSION["admin_passord"] = $pass;

        }
        else
            echo "failed";
    }
}
