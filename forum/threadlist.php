<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Welcome to iDescuss - Coding Forums</title>
</head>

<body>

    <!-- ******************************************************************************************* -->
    <!-- NAVBAR STARTS FROM HERE -->
    <?php  include 'parsials/_header.php';

    ?>

    <?php  include 'parsials/_dbConnect.php'; ?>

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categorise` WHERE category_id=$id";
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    };

    ?>




    <?php
        $showAleart = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
        // INSERT DATA TO THE DATABASE  |  CATCH DATA FROM WHERE USER ENTER HIS/HER PROBLEM TITLE AND DESCRIPTION IN POST REQUEST FORM 
        $th_title = $_POST['title'];
        $th_description = $_POST['description'];
        $sno  = $_POST['sno'];
        
        // FIXING PROBLEM OF XSS INJECTION PROTECTION SO SCRIPTS ARE NOT EXECUTE ON OUR SITE
        $th_title = str_replace("<", "&lt", $th_title);
        $th_title = str_replace(">", "&gt", $th_title);
        $th_description = str_replace("<", "&lt", $th_description);
        $th_description = str_replace(">", "&gt", $th_description);

        $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_description', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($connect, $sql);
        $showAleart = true;
            
    if($showAleart){
        echo      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your thread has been added! Please wait for community to respond.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    };
    
    }



    ?>

    <!-- NAVBAR ENDS HERE -->
    <!-- ******************************************************************************************* -->


    <!-- ******************************************************************************************* -->
    <!-- MAIN BODY OF WEBSITE STARTS FROM HERE  -->


    <!-- CATEGORY CONTAINER STARTS HERE  -->
    <div class="container my-4 ">
        <h2 class="text-center my-3">iDiscuss - Categorise Threads</h2>
        <div class="jumbotron py-4 bg-light">
            <h1 class="display-4">Welome to <?php echo $catname;?> Forums</h1>
            <p class="lead"><?php echo $catdesc;?> </p>
            <hr class="my-4">

            <p>
            <ul>
                <li>This is a peer peet to forum is for sharing knowledge for each other. </li>
                <li> No Spam / Advertising / Self-promote in the forums is not allowed.</li>
                <li>Do not post copyright-infringing material. </li>
                <li>Do not post “offensive” posts, links or images. </li>
                <li>Do not cross post questions. </li>
                <li>Do not PM users asking for help. </li>
                <li>Remain respectful of other members at all times. </li>
            </ul>
            </p>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>

    </div>
    <?php
    if((isset($_SESSION['loggedin']))&&($_SESSION['loggedin']==true)){
        echo '<div class="container"
        <h1 class="py-3">Start a Discussion</h1>
        
        <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Problem Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Keep your title as short and crisp as Posible.</div>
    </div>
    <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Elaborate your concern</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>

    </div>
    <button type="submit" class=" my-4 btn btn-success">Submit</button>
    </form>
    </div>';
    }else{
        echo' <div class="container">
        <h1 class="py-3">Start a Discussion</h1> 
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                aria-label="Warning:">
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <div>
                You are not loggedin! Please login to be able to start a discussion.
            </div>
        </div>

    </div>

';
    }


    ?>

    <div class="container">
        <h1 class="py-3">All Discussions</h1>

        <?php

        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($connect, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['thread_id'];
            $th_user_id = $row['thread_user_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_description'];
            $th_timestamp = $row['timestamp'];
            $date = new DateTime($th_timestamp);
            // $new_date_format = $date->format('d-m-Y');
            // $new_date_format = $date->format('j-F-Y | g:i a');
            $new_date_format = $date->format('j-M-Y | g:i a');

            $sql2 = "SELECT * FROM `users` WHERE sno='$th_user_id'";
            $result2 =mysqli_query($connect, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
       
            echo '
            <div class="media my-4" style="display: flex;">
            <img class="mr-3 mx-3" src="img/userdefault.png" style="height: 77px;" alt="Generic placeholder image">
            <div class="media-body">
            <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
            ' . $desc  
            . '<hr class="my-1"> <h6> Asked by: ' .   $row2['username'] . '<span class="badge mx-2 bg-secondary">' . $new_date_format  . '</span></h6> ' . '</div> ' .'
            </div>';
        };
        // echo var_dump($noResult);
        if($noResult){
            echo '<div class="jumbotron my-4 py-4 bg-light jumbotron-fluid">
            <div class="container">
              <p class="display-4">No Discussion Found</p>
              <p class="lead">Be the first person to ask a question.</p>
            </div>
          </div>';
        }
    ?>




    </div>


    <!-- MAIN BODY OF WEBSITE ENDS  HERE  -->
    <!-- ******************************************************************************************* -->

    <!-- ******************************************************************************************* -->
    <!-- FOOTER OF WEBSITE STARTS FROM HERE  -->

    <?php  include 'parsials/_footer.php'; ?>


    <!-- FOOTER OF WEBSITE ENDS FROM HERE  -->
    <!-- ******************************************************************************************* -->






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> -->

</body>

</html>