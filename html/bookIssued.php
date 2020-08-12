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
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bookissued.css">
    <script src="../js/bookIssued.js"></script>
    <link rel="icon" href="../assets/Icons/icon.png">
    <script src="../js/returnbook.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
</head>

<body>
    <div id="dlgbx">
        <p id="memberId"></p>
        <div id="dlgbxBody">
            <div class="container">
                <br><br>
                <p id="t2">Are you sure you want to return this book?</p>
                <div class="row justify-content-center">
                    <div class="col-3"></div>
                    <div class="col-8">
                        <button id="confirm" class="btn btn-primary ml-auto">Confirm</button>
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
    <!-- dashboard -->
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
                        <a href="bookIssued.php" id="issuedbooks">
                            <p id="t1">Issued Books</p>
                        </a>
                    </div>
                </div>
                <hr class="solid">

                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-history"></i>
                    </div>
                    <div class="col-10" id="historydiv">
                        <a href="history.php" id="history"> History</a>
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
                    <div class="col-10">
                        <div class="row justify-content-end">
                            <div class="col-5">
                                <br><br>
                                <h1 class="heading">Books Issued</h1>
                                <br>
                            </div>
                            <div class="col-5">
                            </div>

                            <div class="col-2">
                                <br><br>
                                <div class="container" id="totalbooks1">
                                    <h1 id="total"></h1>
                                </div>
                                <br>
                            </div>

                        </div>
                        <br><br>
                        <div class="container" id="tableheight">
                            <table class="table table-striped table-dark" id="tabledata">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Book Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Publisher</th>
                                        <th scope="col">Issued Date</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Actions</th>

                                    </tr>
                                </thead>
            
                                <tbody id="tablebody">
                                </tbody>
                            </table>
                            <br><br>
                            <div class="row justify-content-center">
                                <div class="loader"></div>
                            </div>
                        </div>
                        <br><br><br><br><br><br><br>
                        <br><br><br><br><br><br><br><br><br>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="row" id="t">
                    <h1>Recommended books</h1>

                </div>

                <br>
                <div class="container-fluid" id="newarrival">
                    <div class="row">
                        <img id='book' src="../assets/books/1.jpg" alt="Avatar">
                        <img id='book' src="../assets/books/2.jpg" alt="Avatar">
                        <img id='book' src="../assets/books/3.jpg" alt="Avatar">
                        <img id='book' src="../assets/books/4.jpg" alt="Avatar">
                        <img id='book' src="../assets/books/5.jpg" alt="Avatar">
                        <img id='book' src="../assets/books/book1.png" alt="Avatar">
                        <img id='book' src="../assets/books/1.jpg" alt="Avatar">
                        <img id='book' src="../assets/books/5.jpg" alt="Avatar">
                    </div>
                    <hr class="solid" id="line">
                </div>
                <br>

                <div class="row justify-content-end">
                    <a href="searchbooks.php">
                        <h4>See More</h4>
                    </a>
                </div>
                <br><br><br>
            </div>

        </div>

    </div>
    </div>
</body>

</html>
