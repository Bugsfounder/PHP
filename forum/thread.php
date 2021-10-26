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
    <?php  include 'parsials/_header.php'; ?>
    <?php  include 'parsials/_dbConnect.php'; ?>

    <?php
   $id = $_GET['threadid'];
   $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
   $result = mysqli_query($connect, $sql);
   $noResult = true;
   while ($row = mysqli_fetch_assoc($result)) {
       $id = $row['thread_id'];
       $title = $row['thread_title'];
       $desc = $row['thread_description'];
       $th_user_id = $row['thread_user_id'];
                   
       // QUERY THE USERS TABLE TO FIND OUT THE NAME OF POSTER (OP)
       $sql2 = "SELECT * FROM `users` WHERE sno='$th_user_id'";
       $result2 =mysqli_query($connect, $sql2);
       $row2 = mysqli_fetch_assoc($result2);
       $posted_by = $row2['username'];
    //    echo $posted_by;
       
    };
    ?>

    <?php
    $showAleart = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // INSERT DATA TO THE comments DATABASE
        $comment  = $_POST['comment'];
       
            $comment = str_replace("<","&lt",$comment);
            $comment = str_replace(">","&gt",$comment);
        
        $sno  = $_POST['sno'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($connect, $sql);
        $showAleart = true;
            
    if($showAleart){
        echo      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your comment has been added! 
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
    <div class="container my-4">
        <h2 class="text-center my-3">iDiscuss - Categorise Threads</h2>
        <div class="jumbotron bg-light py-4 px-4">
            <h1 class="display-4text-center"><?php echo $title;?> Forums</h1>
            <p class="lead"><?php echo $desc;?> </p>
            <hr class="my-4">

            <p>
            <h3>Rules of Forum:- </h3>
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
            <p>
                Posted By :- <b><?php echo $posted_by;?></b>
            </p>
        </div>

    </div>
    <?php 
    if((isset($_SESSION['loggedin'])&&($_SESSION['loggedin'])==true)){
      echo' <div class="container">
        <h1 class="py-3">Post a comment</h1>
        
        <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
    </div>
    <button type="submit" class=" my-4 btn btn-success">Post Comment</button>
    </form>
    </div>';
    }else{
        
        echo' <div class="container">
        <h1 class="py-3">Post a comment</h1> 
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                aria-label="Warning:">
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <div>
                You are not loggedin! Please login to be able to Post Comments.
            </div>
        </div>

    </div>

';
    }
    ?>

    <div class="container" id="ques">
        <h1 class="py-3">All Comments</h1>

        <?php
            
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
            $result = mysqli_query($connect, $sql);
            $noResult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;
                $id = $row['comment_id'];
                $content = $row['comment_content'];
                $timestamp = $row['comment_time'];
                $th_user_id = $row['comment_by'];
                $date = new DateTime($timestamp);
                // $new_date_format = $date->format('d-m-Y');
                // $new_date_format = $date->format('j-F-Y | g:i a');
                $new_date_format = $date->format('j-M-Y | g:i a');
                
                $new_date_format = $date->format('j-M-Y | g:i a');
                
                $sql2 = "SELECT * FROM `users` WHERE sno='$th_user_id'";
                $result2 =mysqli_query($connect, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                // echo $row2['username'];

                echo '
                <div class="media my-4" style="display: flex;">
                <img class="mr-3 mx-3" src="img/userdefault.png" style="height: 77px;" alt="Generic placeholder image">
                <div class="media-body">
                <h6>'.$row2['username'].'<span class="badge mx-3 bg-secondary">' . $new_date_format  . '</span></h6>
                ' . $content . '
                </div>
                </div>';
            };
            // echo var_dump($noResult);
            if($noResult){
                echo '<div class="jumbotron my-4 py-4 bg-light jumbotron-fluid">
                <div class="container">
                  <p class="display-4">No Comments Found</p>
                  <p class="lead">Be the first person to answer this question.</p>
                </div>
              </div>';
            };
    ?>
        <!-- <p class="my-0" style="font-weight: bold;">Anonymous User at ' . $new_date_format  . '</p> -->



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