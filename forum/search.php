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
    <style>
    #maincontainer {
        min-height: 100vh;
    }
    </style>
</head>

<body>

    <!-- ******************************************************************************************* -->
    <!-- NAVBAR STARTS FROM HERE -->
    <?php  include 'parsials/_header.php'; ?>
    <?php  include 'parsials/_dbConnect.php'; ?>
    <!-- NAVBAR ENDS HERE -->
    <!-- ******************************************************************************************* -->


    <!-- ******************************************************************************************* -->
    <!-- MAIN BODY OF WEBSITE STARTS FROM HERE  -->





    <!-- SEARCH RESULTS -->
    <div id="maincontainer" class="container my-3">
        <h1 class="py-3">Search result for : "<b><em><?php echo $_GET['search'];?></em></b>" </h1>
        <?php
        $noresult = true;

                $query = $_GET['search'];
                $sql = "SELECT *FROM threads where MATCH (thread_title, thread_description) against('$query');";
                $result = mysqli_query($connect, $sql);
                $noResult = true;
                while ($row = mysqli_fetch_assoc($result)) {
                     $noresult = false;
                    $title = $row['thread_title'];
                    $desc = $row['thread_description'];
                    $thread_id = $row['thread_id'];
                    $url = "/forum/thread.php?threadid=" . $thread_id;

                    // DISPLAY THE SEARCH RESULTS
                    
                    echo '<div class="result">
                            <h3><a href="' . $url . '" class="text-dark">'.  $title  . '</a></h3> 
                            <p>' . $desc . ' </p>
                         </div>';

                }
                    if($noresult){
                        echo '<div class="jumbotron my-4 py-4 bg-light jumbotron-fluid">
                        <div class="container">
                          <p class="display-4">No Result Found</p>
                          <p class="lead">Suggestions: </p>
                          <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>
                            </ul>
                        </div>
                      </div>'; 

                    };



        ?>

    </div>





    <!-- CATEGORY CONTAINER STARTS HERE  -->



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
    <!-- 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
    </script>
-->
</body>

</html>

</html>