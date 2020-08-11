<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="../assets/Icons/icon.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script defer src="../js/contactUs.js"></script>
    <link rel="stylesheet" href="../css/contactus.css">
</head>

<body>
    <div id="dlgbx">
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
                    <a href="../html/dashboard.php" class="nav-link"><img id="dp1" src="../assets/fahad.jpg" alt="Avatar"></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" id="c1">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8" id='col'>
                <div class="container" id="mainContainer">
                    <div class="row">
                        <div class="col-lg-7" id="textside">
                            <h5 id="heading1">Send us a Message</h5>
                            <form onsubmit="return validateForm()" method="post">
                                <label id="textsize">Your Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Fahad Khalid">
                                <label id="textsize">Your Email</label>
                                <input type="email" class="form-control" id="email" placeholder="abc@gmail.com">
                                <label id="textsize">Your Message</label>
                                <textarea name="message" id="message" style="border-color: grey; height: 200px; width: 500px;"placeholder="Enter a message"></textarea>
                                <br><br>
                                <button id="click" type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                                <br>
                            </form>
                        </div>
                        <div class="col-lg-5" id='imageside'>
                            <h5>Contact Information</h5>
                            <br>
                            <div class="row">
                                <div class="col-lg-2">
                                    <img id='location' src="../assets/Icons/images.png">
                                    <br> <br>
                                    <img id='phone' src="../assets/Icons/phone.png">
                                    <br> <br>
                                    <img id='mail' src="../assets/Icons/mail.png">
                                </div>
                                <div class="col-lg-10">
                                    <h6>3583 Raintree Boulevard</h6>
                                    <h6>Crystal, MN</h6>
                                    <br>
                                    <h6>456-765-2467</h6>
                                    <br>
                                    <h6>abc@library.com</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
    </div>
</body>

</html>