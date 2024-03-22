<?php

// Include config file
require_once "config.php";


// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
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
                        <li class="nav-item"><a class="nav-link">Currently logged in as: <?php echo htmlspecialchars($_SESSION["username"]); ?></li>
                         
                        
                        <div class="dropdown">
                            <button onclick="myFunction()" class="dropbtn">Records</button>


                            <div id="myDropdown" class="dropdown-content">
                                <a href="petgroomingtrans/index.php ">Transaction</a>
                                <a href="employeecrud/index.php ">Employee Records</a>
                                <a href="customercrud/index.php ">Customer Records</a>
                                <a href="petcrud/index.php ">Pet Records</a>
                                <a href="consultationcrud/index.php ">Consultation Records</a>
                                <a href="petgroomingcrud/index.php ">Pet Grooming Records</a>
                                 <a href="import.php ">Imports Database</a>
                                  <a href="export.php ">Export Database</a>
                                <a href="logout.php ">Logout</a>
                            </div>
                             

                        </div>    

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header id="about" style="background-image: url('assets/bg.jpg'); background-size: cover">
            <div class="container px-4 text-left text-white">
                <h1 class="fw-bolder">Welcome to ACME PetClinic!</h1>
                <p class="lead">A full service companion animal veterinary clinic located in Taguig City!</BR>Our services and facilities are designed for routine preventive care, </BR> early deyection and treatment of diseases, emergency and surgical care.</p>
                </BR>
                <!-- <a class="btn btn-lg btn-light" href="index.php ">Sign-Up / Log In Now!</a>-->
            </div>
        </header>
        <!-- About section-->
        <section id="about" style="background: #d2dae2;">
            <div class="container px-4">
                <div class="row gx-4 justify-content-left">
                    <div class="col-lg-8">
                        <h2>WHAT IS ACME?</h2>
                        <p class="lead">Your pet is valued family member and it is our commitment to provide quality veterinary care troughout their lifetime.</p>
                        Services we offer:
                        <ul>
                            <li>Virtual Pet Health Consultant.</li>
                            <li>Online Consultation.</li>
                            <li>Grooming and Boarding Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services section-->
        <section class="bg-light" id="services">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <center><h2>Services we offer</h2></center>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.
                        </p></BR></BR></h2>
                    </div></BR>
                    <div class="item">
                    <img src="assets/imgpet1.jpg" class="circular_image"/>
                    <h1 span class="caption">Grooming Service</span></h1>
                    <h2 span class="caption">Try our best cuts for your lovely pets!</span></h2>
                        <h3 span class="caption">With our best of the best groomers,</br> we offer you the best and quality cuts made by ACME!
                        </br>
                        </br>
                            <a class="btn btn-lg btn-dark" href="petgroomingtrans/insert.php ">Try, Now!</a></span></h3>
                            

                </div>
                
                <div class="item_left">
                    <img src="assets/imgpet1.jpg" class="circular_image_left"/>
                    <h1 span class="caption">Virtual Health Consultant</span>
                    <h2 span class="caption">Virtually check and monitor your pet conditions </BR>with the help of our mighty Vet!</span>
                        <h3 span class="caption">With our best of the best Vet,</br> we offer you the best and Good Vets by ACME!</span>
                            </br>
                        </br>
                            <a class="btn btn-lg btn-dark" href="consultnow.php ">Try, Now!</a></span></h3>
                </div>
                </div>
            </div>
        </div>
        </section>
        <!-- Contact section-->
        <section id="contact">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Contact us</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
                    </div>
                </div>
            </div>
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
