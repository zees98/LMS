<?php
session_start();
if (!isset($_SESSION["member_id"])) {
    header("Location: login.html");
} else {
    $id = $_SESSION["member_id"];
    $fname = $_SESSION["first_name"];
    $lname  = $_SESSION["last_name"]; 
    //  $img= $_SESSION["member_img"] ;
}

if (isset($_POST["signout"])) {
    session_destroy();
    session_unset();
    header("Location: logIn.html");
}
?>

    <html>

    <head>
        <title>Search Books</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@500&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="icon" href="../assets/Icons/icon.png">
        <link rel="stylesheet" href="../css/searchbooks.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script defer src="../js/searchbook.js"></script>
    </head>

    <body>
        <div id="dlgbx">
            <div id="dlgbxBody">
                <div class="container">
                    <h2>Filter</h2>
                    <h6 class="text">Category</h4>
                        <select name="category" class="form-control" id="">
                        <option value="Thriller">Thriller</option>
                        <option value="Action">Action</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Romance">Romance</option>
                        <option value="Horror">Horror</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Classics">Classics</option>
                        <option value="Cookbooks">Cookbooks</option>

                    </select>
                        <br>
                        <h6 class="text">Year</h4>
                            <select name="category" class="form-control" id="">
                    <option value="1">2001</option>
                    <option value="2">2002</option>
                    <option value="3">2003</option>
                    <option value="4">2004</option>
                    <option value="5">2005</option>
                    <option value="6">2006</option>
                    <option value="7">2007</option>
                        <option value="8">2008</option>
                        <option value="9">2009</option>
                        <option value="10">2010</option>
                        <option value="11">2011</option>
                        <option value="12">2012</option>
                        <option value="13">2013</option>
                        <option value="14">2014</option>
                        <option value="15">2015</option>
                        <option value="16">2016</option>
                        <option value="17">2017</option>                        
                        <option value="18">2018</option>
                        <option value="19">2019</option>
                        <option value="20">2020</option>
                        
                    </select>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-3"></div>
                                <div class="col-8">
                                    <button id="confirm" class="btn btn-primary ml-auto">Filter</button>
                                    <button id="cancel" class="btn btn-outline-primary ml-2">Cancel</button>
                                </div>
                                <div class="col-1"></div>
                            </div>
                </div>
            </div>
        </div>
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
                        <a href="../html/contactUs.php" class="nav-link">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row" id="mainrow">
                <div class="col-lg-2" id="dashboarddiv">
                    <a href="../html/dashboard.php" id="dashboard">
                        <div class="row">
                            <div class="col-4">
                                <br>
                                <img id="dp" src="../assets/fahad.JPG" alt="Avatar">
                            </div>
                            <div class="col-8" id="namediv">
                            <?php
                        echo $fname." ".$lname;
                        ?>
                            </div>
                        </div>
                    </a>
                    <hr class="solid">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="col-10" id="profilediv">
                            <a href="customerProfile.php" id="customerprofile">Profile</a>
                        </div>
                    </div>
                    <hr class="solid">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="col-10" id="issuedbooksdiv">
                            <a href="bookIssued.php" id="issuedbooks">Issued Books</a>
                        </div>
                    </div>
                    <hr class="solid">

                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-history"></i>
                        </div>
                        <div class="col-10" id="historydiv">
                            <a href="history.html" id="history"> History</a>
                        </div>
                    </div>
                    <hr class="solid">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="col-10" id="pastduediv">
                            <a href="pastDue.php" id="pastdue">Returned Books</a>
                        </div>
                    </div>
                    <hr class="solid">
                    <br><br><br><br><br><br><br><br><br><br><br>
                    <br>
                    <hr class="solid">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="row">
                            <div class="col-2">
                             <i class="fa fa-sign-out"></i>
                            </div>
                            <div class="col-10" id="logoutdiv">
                                 <button name="signout" id="b">LogOut</button>
                            </div>
                        </div>
                    </form>
                    <hr class="solid">
                </div>
                <div class="col-lg-10" id="side">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <br><br><br>
                            <input type="search" id="searchbar" placeholder="Enter Book Name">
                        </div>
                        <div class="col-1">
                            <br><br>
                            <button class="btn searchbutton"><i class="fa fa-search" aria-hidden="true"
                                id="searchicon"></i></button>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-1">
                            <br><br><br>
                            <button id="filter" class="btn-outline-dark filterbutton">Filter</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-11">
                            <br><br>
                            <div class="row">

                                <div class="col-lg-4 col-md-6">
                                    <br>
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="../assets/books/2.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-text">Nocturnal Animals</h4>
                                            <h5 class="card-text" id="author">Austin Wright</h5>
                                            <h6 class="card-text">⭐⭐⭐⭐⭐</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <br>
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="../assets/books/2.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-text">Nocturnal Animals</h4>
                                            <h5 class="card-text" id="author">Austin Wright</h5>
                                            <h6 class="card-text">⭐⭐⭐⭐⭐</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <br>
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="../assets/books/2.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-text">Nocturnal Animals</h4>
                                            <h5 class="card-text" id="author">Austin Wright</h5>
                                            <h6 class="card-text">⭐⭐⭐⭐⭐</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <div class="col-lg-4 col-md-6">
                                    <br>
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="../assets/books/2.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-text">Nocturnal Animals</h4>
                                            <h5 class="card-text" id="author">Austin Wright</h5>
                                            <h6 class="card-text">⭐⭐⭐⭐⭐</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <br>
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="../assets/books/2.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-text">Nocturnal Animals</h4>
                                            <h5 class="card-text" id="author">Austin Wright</h5>
                                            <h6 class="card-text">⭐⭐⭐⭐⭐</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <br>
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="../assets/books/2.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-text">Nocturnal Animals</h4>
                                            <h5 class="card-text" id="author">Austin Wright</h5>
                                            <h6 class="card-text">⭐⭐⭐⭐⭐</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php
if (isset($_POST["signout"])) {
    session_destroy();
    session_unset();
    header("Location: logIn.html");
}
?>