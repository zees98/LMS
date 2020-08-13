<?php

session_start();
if (!isset($_SESSION["member_id"])) {
    header("Location: logIn.html");
} else {
    $id = $_SESSION["member_id"];
    $bookID = $_SESSION["BookId"];
}

if (
    isset($_POST["message"]) &&
    isset($_POST["rating"]) 
) {
    $rating = $_POST["rating"];
    $message = $_POST["message"];

    $conn = mysqli_connect(
        "68.183.162.131",
        "hariscorp_hariscorp",
        "kdw{koz4]c[%",
        "hariscorp_zfhlibrary",
        3306
    );
    if ($conn) {


        $insert_feedback = "INSERT INTO `Review` (`mem_id`, `book_id`, `review_text`, `rating`, `date`) VALUES ('$id', '$bookID', '$message', '$rating', CURRENT_DATE);";
        $exec_feedback = mysqli_query($conn, $insert_feedback);

        $conn->close();
        echo "success";
    } else
        echo "failed";
} else
    echo "ISSET FAILED";
?>