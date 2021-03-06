<?php
session_start();
if (!isset($_SESSION["member_id"])) {
    header("Location: login.html");
} else {
    $id = $_SESSION["member_id"];
    $fname = $_SESSION["first_name"];
    $lname  = $_SESSION["last_name"]; 
    // $img= $_SESSION["member_img"] ;
}
if (isset($_POST["signout"])) {
    session_destroy();
    session_unset();
    header("Location: logIn.html");
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="..\css\CustomerProfile.css">
    <title>Customer Profile</title>
    <link rel="icon" href="..\assets\Icons\icon.png">
    <script defer src="../js/CustomerProfile.js"></script>
</head>

<body class="h-100" id="">
    <nav class="navbar navbar-expand-md navbar-dark" id="navbar">
        <div class="row">
            <img id="logo" src="../assets/Icons/booklogo.png" alt="">
            <p id="title">ZFH</p>
            <p id="memID">
            <?php
                echo $id;
            ?>
                

            </p>
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
        <div class="row h-100">
            <div class="col-lg-2" id="dashboarddiv">
                <a href="../html/dashboard.php" id="dashboard">
                    <div class="row">
                        <div class="col-4">
                            <br>
                            <img id="dp" src="../assets/Icons/user.png" alt="Avatar">
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
                        <a href="customerProfile.php" id="customerprofile">
                            <p id="t1">Profile</p>
                        </a>
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
            <div class="col-lg-10" id="form">
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-11">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <br><br>
                                <img src=" " id="profile_img">


                                <label for="file" class="filelabel">
                                    <div id="imagediv">
                                        <span class="fas fa-camera fa-1x" id="cameraicon"></span>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-1 col-md-3"></div>
                            <div class="col-lg-8 col-md-6">
                                <br><br><br><br>
                                <form>
                                    <div class="row">
                                        <div class="col-3">
                                            <input type='file' id="file" accept="image/png,image/jpg,image/jpeg" hidden>
                                            <label for="fn">First Name</label>
                                            <input type="text"  id="fn">
                                            <i class="fa fa-user" id="ficon"></i>
                                        </div>
                                        <div class="col-lg-2"></div>
                                        <div class="col-3">
                                            <label for="ln">Last Name</label>
                                            <input type="text"  id="ln">
                                            <i class="fa fa-user" id="licon"></i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="email">Email</label>
                                            <input type="text"  id="email">
                                            <i class="fa fa-envelope" id="emailicon"></i>
                                        </div>
                                        <div class="col-lg-2"></div>
                                        <div class="col-3">
                                            <label for="phoneno">Phone Number</label>
                                            <input type="text"  id="phoneno">
                                            <i class="fa fa-mobile" id="phoneicon"></i>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                    <div class="col-3">
                                            <label for="dob">DOB</label>
                                            <input type="date"  id="dob"  >
                                            <i class="fa fa-birthday-cake" id="dobicon"></i>
                                        </div>
                                        <div class="col-lg-2"></div>
                                        <div class="col-3">
                                            <label for="gender">Gender</label>
                                            <br>
                                            <input type="text" list="list"  id="gender">
                                            <i class="fa fa-user-o" id="gendericon"></i>
                                            <datalist id="list">
                                                <option value="Female"></option>
                                                <option value="Male"></option>
                                            </datalist>
                                        </div>
                                        
                                        

                                    </div>
                                    <br><br>
                                    <div class="row">
                                        
                                    <div class="col-3">
                                            <label for="pass">Password</label>
                                            <input type="password" id="pass" >
                                            <i class="fa fa-lock" id="passicon"></i>
                                        </div>
                                        <!-- <div class="col-lg-2"></div> 
                                        <div class="col-lg-3" style="border:2px red solid; width:400px">
                                            <label for="pass" id="confirmlabel">Retype Password</label>
                                            <input type="password" id="confirm_pass" value="354" >
                                            <i class="fa fa-lock" id="confirm_passicon"></i>
                                        </div> -->
                                         
                                    
                                         
                                    </div>
                                  <br><br>
                                    <div class="row">
                                    <div class="col-lg-3" >
                                            <label for="pass" id="confirmlabel" >Retype Password</label>
                                            <input type="password" id="confirm_pass" >
                                            <i class="fa fa-lock" id="confirm_passicon"></i>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-1">
                                            <input type="submit" class="btn btn-outline-dark btn-lg" id="submitbutton">
                                        </div>
                                        <div class="col-1">
                                            <div id="edit_div">
                                                <button class="btn btn-outline-dark btn-lg" id="edit">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
