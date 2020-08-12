<?php

if (!isset($_SESSION))
    session_start();
    // $_SESSION["bookID"];
$bookID = 17;

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


</head>

<body>

    <div id="dlgbx">
        <div id="dlgbxBody">
            <h1 class="">Issue The Book Now</h1>
            <table class="table">
                <thead>
                <th>Book Name</th>
                <th>Author </th>
                <th>Due Date</th>
                </thead>
                <tbody id="issue-book-body">
                
                </tbody>
            </table>
            <div class="container-fluid">
                <div class="row">
                    <button id="confirm" class="btn btn-primary ml-auto">Confirm</button>
                    <button id="cancel" class="btn btn-outline-primary ml-2">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar navbar-dark navbar-expand">
        <div class="navbar-brand">ZFH Library</div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item m-2 "><a href="" class="nav-link">Home<a></li>
            <li class="nav-item m-2 "><a href="" class="nav-link">Login<a></li>
            <li class="nav-item m-2 "><a href="" class="nav-link">Sign up<a></li>
        </ul>

    </div>

    <div class="jumbotron">
        <h1>Book Information</h1>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-lg-3"><img src="../assets/books/1.jpg" alt="" width="100%"></div>
                <div class="col-md-7 col-lg-8">
                    <h2>
                        <?php

                        echo $row[1];

                        ?>
                    </h2>
                    <h5 class="text-info">Mike Corbett</h5>
                    <h5 class="text-info">2008</h5>
                    <h5>⭐⭐⭐⭐⭐</h5>
                    <br>
                    <button id="issueBtn" class="btn btn-primary">Issue Now</button>
                    <button class="btn btn-outline-primary">Save for Later</button>
                    <br><br>
                    <div class="container-fluid">
                        <div id="desc-control" class="row">
                            <h4 class="col-lg-3 col-md-6 col-6 p-0">Description</h4>
                            <h5 id="expand" class="text-info col-md-3 col-3"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i>
                            </h5>
                        </div>
                    </div>
                    <h6 class="text-justify mt-4 mt-md-4 mt-lg-4 p-md-3 p-lg-4 p-sm-3" id="description">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id beatae quidem dolorem commodi
                        maxime explicabo. Eaque illum eligendi velit, qui voluptatem animi laborum, commodi tenetur eius
                        doloribus a, similique tempora atque! Nam dolor laboriosam temporibus nulla aspernatur libero
                        quam commodi a aperiam magnam ipsam id cumque quis, ut quisquam illum dolore amet ipsa, ducimus
                        blanditiis quod doloremque! Adipisci, nemo maiores fuga expedita accusantium enim neque a
                        perspiciatis ab nesciunt nam eaque deserunt minima dicta repellendus, magni vitae officiis
                        tenetur. Dolor quidem cum veritatis consequatur illo esse, ipsum dolorem quo sint rem molestias
                        reiciendis dolore tempore voluptatibus magni, ex ipsa doloremque.
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