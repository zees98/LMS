<?php

if (
    isset($_POST["Membername"]) &&
    isset($_POST["Email"]) &&
    isset($_POST["Message"]) 
) {
    $name = $_POST["Membername"];
    $email = $_POST["Email"];
    $message = $_POST["Message"];
    $category = $_POST["category"];
    $summary = $_POST["summary"];
    $pub_name = $_POST["pub_name"];
    $pub_address = $_POST["pub_address"];

    echo $bookname;


    $conn = mysqli_connect(
        "68.183.162.131",
        "hariscorp_hariscorp",
        "kdw{koz4]c[%",
        "hariscorp_zfhlibrary",
        3306
    );
    if ($conn) {
        // Gettting the member ID
    $query = "SELECT id FROM `Member` WHERE email = '{$email}'";
        $memb_id_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $id = "";
        while ($row = mysqli_fetch_array($memb_id_query)) {
            $id = $row["id"];
        }
        echo "<br>" . $id;


        $insert_feedback = "INSERT INTO `Feedback` (`feedback_id`, `mem_id`, `description`, `date`) VALUES (NULL, '$id', '$message', 'current_timestamp()');";
        $exec_feedback = mysqli_query($conn, $insert_book);

        $conn->close();
        echo "success";
    } else
        echo "failed";
} else
    echo "ISSET FAILED";
