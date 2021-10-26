<?php

session_start();


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="/forum">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/forum">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                   Top Categorise
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>';

                include '_dbConnect.php';
                $sql ="SELECT * FROM `categorise` LIMIT 5";
                $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $cat_name = $row['category_name'];
                    $cat_id = $row['category_id'];
                    echo '<a class="dropdown-item" href="threadlist.php?catid=' . $cat_id . '">' . $cat_name . '</a>';
                }
                // <a class="dropdown-item" href="#">Action</a>
                // <a class="dropdown-item" href="#">Action2</a>

                echo '</li>

                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>';

        if((isset($_SESSION['loggedin'])&&($_SESSION['loggedin']==true))){
            echo '<form class="d-flex my-2 my-lg-0" action="search.php" method="get">
            <input class="form-control me-2" name = "search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form> 
            <p class="text-light my-0 mx-2" >
            Welcome ' . $_SESSION['username']. '
            </p>
            <a href="/forum/parsials/_logout.php" class="btn btn-outline-success">Logout</a>';
        }else{
         echo '
            <form class="d-flex my-2 my-lg-0">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            </form> 
            <div class=" mx-2">
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
            </div>';
        }
    echo '
        </div>
        </div>
        </nav>';

include 'parsials/_loginModal.php';
include 'parsials/_signupModal.php';
if((isset($_GET['signupsuccess'])&&($_GET['signupsuccess']=="true"))){
    echo '<div class="alert alert-success my-0 alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You successfully signedup, You can now login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
else{
    if((isset($_GET['signupsuccess'])&&($_GET['signupsuccess']=="false"))){
        echo '<div class="alert alert-danger my-0 alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Password cannot matched or username already used, choose a unique username and email id.
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
        <strong>Error!</strong> Wrong information, Please check information and try again later.
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