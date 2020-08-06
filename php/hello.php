<?php

    $conn = mysqli_connect(
        "remotemysql.com",
        "2EeU51fxMG",
        "qaxpb7JGoR",
        "2EeU51fxMG",
        3306
        
    );
    echo $conn ? "Connected" : "Failed";

?>

