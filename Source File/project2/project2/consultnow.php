<?php

// Include config file
require_once "config.php";


// Initialize the session
session_start();
 ?>
<style>
    .dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 10px;
  font-size: 10px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 170px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
<style>
body {
    color: #fff;
    background: #63738a;
    font-family: 'Roboto', sans-serif;
}
.form-control {
    height: 40px;
    box-shadow: none;
    color: #969fa4;
}
.form-control:focus {
    border-color: #5cb85c;
}
.form-control, .btn {        
    border-radius: 3px;
}
.signup-form {
    width: 450px;
    height:  300px;
    margin: left;
    padding: 1px 0;
    font-size: 15px;
}
.signup-form h2 {
    color: #636363;
    margin: 0 0 15px;
    position: relative;
    text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
    content: "";
    height: 2px;
    width: 30%;
    background: #d4d4d4;
    position: absolute;
    top: 50%;
    z-index: 2;
}   
.signup-form h2:before {
    left: 0;
}
.signup-form h2:after {
    right: 0;
}
.signup-form .hint-text {
    color: #999;
    margin-bottom: 30px;
    text-align: center;
}
.signup-form form {
    color: #999;
    border-radius: 3px;
    margin-bottom: 1px;
    margin-top: -50px;
    background: #f2f3f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 15px;
}
.signup-form .form-group {
    margin-bottom: 10px;
}
.signup-form input[type="checkbox"] {
    margin-top: 3px;
}
.signup-form .btn {        
    font-size: 16px;
    font-weight: bold;      
    min-width: 140px;
    outline: none !important;
}
.signup-form .row div:first-child {
    padding-right: 10px;
}
.signup-form .row div:last-child {
    padding-left: 10px;
}       
.signup-form a {
    color: #fff;
    text-decoration: underline;
}
.signup-form a:hover {
    text-decoration: none;
}
.signup-form form a {
    color: #5cb85c;
    text-decoration: none;
}   
.signup-form form a:hover {
    text-decoration: underline;
}  
</style>
</style>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ACME Pet Clinic</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#page-top">ACME</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header id="about" style="background-image: url('assets/consultnowbg.jpg'); background-size: 100%">
            <div class="container px-4 text-left text-white">
                <div class="signup-form">
                    <form  method="POST" enctype="multipart/form-data" >
                    <h2>Submit new Online Consultation.</h2>
                    <p class="hint-text">Come, Join us! Let our Vet Consult your beloved pets.</p>
        
                    <div class="form-group">
                        <center>
                        <button><a href="consultationcrud/index.php" class="btn  btn-lg btn-block">Submit a new Ticket.</a></button>
                        </center>
                    </div>
                    </form>
                </div>

                <div class="signup-form">
                    <form  method="POST" enctype="multipart/form-data" >
                    <h2>Track your Consultation History.</h2>
                    <p class="hint-text">You can track your consultation history in our system.</p>
        
                    <div class="form-group">
                        <center>
                        <a href="searchhistory/index.php"><imput type="buttons" class="btn btn-success btn-lg btn-block">Track Pet's Check-up History.</a></button>
                        </center>
                    </div>
                    </form>
                </div>


            </div>
        </header>
        <!-- About section-->
        
        <!-- Services section-->
        
        <!-- Contact section-->

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
    </body>
</html>
