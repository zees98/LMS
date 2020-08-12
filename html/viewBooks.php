<?php

if (!isset($_SESSION))
    session_start();
$bookID = $_SESSION["bookID"];

$conn = mysqli_connect(
    "68.183.162.131",
    "hariscorp_hariscorp",
    "kdw{koz4]c[%",
    "hariscorp_zfhlibrary",
    3306
);


if ($conn) {

    $query = "SELECT book_id, title, pub_year, author, cat_name, summary FROM (`Book` NATURAL join `Publisher`) Natural join Category where book_id = '{$bookID}'";
    $res = mysqli_query($conn, $query);

    $row = mysqli_fetch_row($res);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/book_preview.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/book_preview.js"></script>
    <script src="https://use.fontawesome.com/3ac16a555a.js"></script>

    <style>
        #dlgbx {
            display: none;
            position: fixed;
            z-index: 5;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.3);
        }
        
        #dlgbxBody {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 30%;
            height: 30%;
            margin-top: -15%;
            margin-left: -15%;
            background-color: white;
            padding: 20px;
            border-radius: 40px;
        }
        
        #dlgbx table {
            margin-top: 5%;
        }
    </style>
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
                    <a href="../html/dashboard.php" class="nav-link"><img id="dp1" src="../assets/fahad.jpg" alt="Avatar"></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron">
        <h1>Book Information</h1>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-lg-3"><img src="../assets/books/1.jpg" alt="" width="100%"></div>
                <div class="col-md-7 col-lg-8">
                    <h2>Mr Nachron's List</h2>
                    <h5 class="text-info">Mike Corbett</h5>
                    <h5 class="text-info">2008</h5>
                    <h5>⭐⭐⭐⭐⭐</h5>
                    <br>
                    <div class="container-fluid">
                        <div id="desc-control" class="row">
                            <h4 class="col-lg-3 col-md-6 col-6 p-0">Description</h4>
                            <h5 id="expand" class="text-info col-md-3 col-3"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i>
                            </h5>
                        </div>
                    </div>
                    <h6 class="text-justify mt-4 mt-md-4 mt-lg-4 p-md-3 p-lg-4 p-sm-3" id="description">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id beatae quidem dolorem commodi maxime explicabo. Eaque illum eligendi velit, qui voluptatem animi laborum, commodi tenetur eius doloribus a, similique tempora atque! Nam dolor laboriosam temporibus
                        nulla aspernatur libero quam commodi a aperiam magnam ipsam id cumque quis, ut quisquam illum dolore amet ipsa, ducimus blanditiis quod doloremque! Adipisci, nemo maiores fuga expedita accusantium enim neque a perspiciatis ab nesciunt
                        nam eaque deserunt minima dicta repellendus, magni vitae officiis tenetur. Dolor quidem cum veritatis consequatur illo esse, ipsum dolorem quo sint rem molestias reiciendis dolore tempore voluptatibus magni, ex ipsa doloremque.
                    </h6>
                </div>
            </div>
        </div>

    </div>
    <div class="jumbotron" id="reviews">
        <h1>
            Reviews
        </h1>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-1"><img src="../assets/Icons/book.png" alt="" width="100%"></div>
                <div class="col-11 m-auto">
                    <h5 class="text-info">Zeeshan Ali ⭐⭐⭐⭐</h5>
                    <h6>Fantastic Book - 6:02 am July 31, 2020</h6>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-1"><img src="../assets/Icons/book.png" alt="" width="100%"></div>
                <div class="col-11 m-auto">
                    <h5 class="text-info">Haseeb Arif ⭐</h5>
                    <h6>Fazool Book Hai - 4:20 am July 31, 2020</h6>
                </div>
            </div>
        </div>
        <br><br>
        <h4>Write Your own review</h4>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-sm-8 my-auto" id="">
                    <input class="btn" type="text" name="review" id="">

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
                <div class="col-md-1 col-sm-4 my-auto"><button class="btn btn-primary" id="search"> <i class="fa fa-send" aria-hidden="true"></i></button></div>
            </div>
        </div>
    </div>

</body>

</html>