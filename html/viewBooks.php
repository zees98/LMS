<?php

if (!isset($_SESSION))
    session_start();
$bookID = $_SESSION["BookId"];

$conn = mysqli_connect(
    "68.183.162.131",
    "hariscorp_hariscorp",
    "kdw{koz4]c[%",
    "hariscorp_zfhlibrary",
    3306
);


if ($conn) {

    $query = "SELECT book_id, title, pub_year, author, cat_name, summary, round(avg(rating),2) FROM ((`Book` NATURAL join `Publisher`) Natural join Category) Natural join Review where book_id = '{$bookID}'";
    $res = mysqli_query($conn, $query);

    $row = mysqli_fetch_row($res);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../assets/Icons/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book | <?php
                        echo $row[1];
                    ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/book_preview.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/book_preview.js"></script>
    <script src="../js/BookInfo.js"></script>
    <script src="https://use.fontawesome.com/3ac16a555a.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark" id="navbar">
        <div class="row">
            <img id="logo" src="../assets/Icons/booklogo.png" alt="">
            <p id="title">ZFH</p>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="../html/dashboard.php" class="nav-link"><img id="dp1" src="../assets/Icons/user.png" alt="Avatar"></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron">
    <h1 id="r">Book Information</h1>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-lg-3"><img src="../assets/books/1.jpg" alt="" width="100%"></div>
                <div class="col-md-7 col-lg-8">
                <h2 id="r">
                        <?php

                        echo $row[1];

                        ?>
                    </h2>
                    <h5 class="text-info" id="r"><?php
                                            echo $row[3];
                                            ?></h5>
                    <h5 class="text-info" id="r"><?php
                                            echo $row[2];
                                            ?></h5>
                    <h1 id="r"><?php
                        if($row[6] == NULL)
                            echo "No Rating";
                        else
                            echo $row[6] . "/5";

                        ?>
                        </h1>
                    <h5><?php
                        echo str_repeat("⭐", $row[6]);
                        ?></h5>
                    <br>
                    <div class="container-fluid">
                        <div id="desc-control" class="row">
                            <h4 class="col-lg-3 col-md-6 col-6 p-0">Description</h4>
                            <h5 id="expand" class="text-info col-md-3 col-3"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i>
                            </h5>
                        </div>
                    </div>
                    <h6 class="text-justify mt-4 mt-md-4 mt-lg-4 p-md-3 p-lg-4 p-sm-3" id="description">
                    <?php
                        echo $row[5];
                    ?>
                    </h6>
                </div>
            </div>
        </div>

    </div>
    <section class="jumbotron" id="reviews">
    <h1 id="r">
            Reviews
        </h1>
        <br>
            <div class="container-fluid" id="">
    </section>
       <h4 id="write">Write Your own review</h4>
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-6 col-sm-8 my-auto" id="">
                <textarea name="message" id="message" style="border-color: grey; height: 200px; width: 800px;"placeholder="Give a review.."></textarea>
                </div>
                <div class="col-md-1 my-auto" id="ratingDiv">
                    <select name="rating" id="rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="col-md-1 col-sm-4 my-auto"><button type="button"  class="btn btn-primary" id="search">Submit</button></div>
            </div>
        </div>
    </div>

</body>

</html>