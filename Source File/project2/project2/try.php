<?php

// Include config file
require_once "config.php";

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TRY ONLY</title>
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
                
            </div>
        </nav>
        <!-- Header-->
        <header id="about">
            <div class="container px-4 text-left text-black">
                <h1 class="fw-bolder">Free Pet's Health Consultation / Check Up Station</h1>
                <p class="lead">Regular check-ups can help find potential issues before they become a problem.</BR>When you see your doctor regurarly they are able to detect health condition or diseases early. </BR> Early detection gives you the best chances for getting the right treatment quickly and avoid complications</p>
                </BR>
                
            </div>
        </header>
        
        <div class="signup-form">
    <form  method="POST" enctype="multipart/form-data" >
        <h2>Fill Data</h2>
        <p class="hint-text">Fill below form.</p>
        <div class="form-group">
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="name" placeholder="name" required="true"></div>
                <div class="col"><input type="text" class="form-control" name="contact" placeholder="contact" required="true"></div>
            </div>          
        </div>
        
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Enter your Email id" required="true">
        </div>
      
             <div class="form-group">
            <input type="file" class="form-control" name="profilepic"  required="true">
            <span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
        </div>      
      
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
        </div>
    </form>
    <div class="text-center">View Aready Inserted Data!!  <a href="index.php">View</a></div>
</div>

        <!-- About section-->
        <section id="about" style="background: #d2dae2;">
            <div class="container px-4">
                <div class="row gx-4 justify-content-left">
                 


        </section>


        <button class="kc_fab_main_btn">+</button>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
