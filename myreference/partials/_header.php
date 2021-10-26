<?php
session_start();
echo '<nav class="navbar  py-1 navbar-expand-lg" style="background-color:#343a40;">
<div class="container-fluid" >

    <a class="navbar-brand" _ngcontent-serverapp-c51="" href="#"><img height="39px" width="39px"
            src="/myreference/static/img_home/brand_logo.png" alt="MyReference"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item font-weight-bold"><a _ngcontent-serverapp-c51=""
                    class="nav-link fw-bold text-light" href="index.php">Home</a>
            </li>
            <li class="nav-item font-weight-bold"><a _ngcontent-serverapp-c51=""
                    class="nav-link fw-bold text-light" href="about.php">About</a>
            </li>
            <li class="nav-item font-weight-bold"><a _ngcontent-serverapp-c51=""
                    class="nav-link fw-bold text-light" href="contact.php">Contact Us</a>
            </li>
        </ul>';
        
        
        if((isset($_SESSION['loggedin']))&&($_SESSION['loggedin']==true)){
            echo'
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            <div class="mx-3 d-flex">
            
            <button type="button" class="btn mx-1 btn-danger"> <a class="text-light" style="text-decoration:none;" href="/myreference/partials/_logout.php">Signout</a></button>';
        }else{
        echo'
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        <div class="mx-3 d-flex">
        
                        <button type="button" class="btn mx-1 btn-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>

      <button type="button" class="btn mx-1 btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>


            </div>
        </form>';
        }
        echo'
    </div>
</div>
</nav>';





include '../myreference/partials/_loginModal.php';
include '../myreference/partials/_signupModal.php';

// if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    if((isset($_GET['signupsuccess'])&&($_GET['signupsuccess']=="true"))){
        echo '<div class="alert alert-success my-0 alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You successfully signedup, You can now login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    else{
        if((isset($_GET['signupsuccess'])&&($_GET['signupsuccess']=="false"))){
            echo '<div class="alert alert-danger my-0 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '.$_GET['error'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    
    if((isset($_GET['loggedinsuccess'])&&($_GET['loggedinsuccess']=="true"))){
                echo '<div class="alert alert-success my-0 alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You successfully loggedin, You can now colaborate with other colaborators.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }else{
        if((isset($_GET['loggedinsuccess'])&&($_GET['loggedinsuccess']=="false"))){
            echo '<div class="alert alert-danger my-0 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '.$_GET['error'].' 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    
        
    if((isset($_GET['loggedoutsuccess'])&&($_GET['loggedoutsuccess']=="true"))){
        echo '<div class="alert alert-success my-0 alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You successfully logged Out, You can again loggedin using your username and password.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }else{
        if((isset($_GET['loggedoutsuccess'])&&($_GET['loggedoutsuccess']=="false"))){
                echo '<div class="alert alert-danger my-0 alert-dismissible fade show" role="alert">
                <strong>Error!</strong> You cannot logged out successfully, Please try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';    
        }   
    }
    

?>