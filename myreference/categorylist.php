<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Video Reference - MyReference</title>
    <link rel="stylesheet" href="/myreference/static/css/home.css">
</head>

<body>
    <!-- MAIN CONTAINER STARTS HERE -->
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';  ?>


    <!-- PHP CODE HERE  FOR FETCHING DATA FROM ULR AS A GET REQUEST AND DISPLAY AS HEADING AND DESCRIPTION-->
    <?php
        $category_id = $_GET['category_id'];
        $sql = "SELECT * FROM `categorise` WHERE sno='$category_id'";
        $result = mysqli_query($connect, $sql);
        while ($row=mysqli_fetch_assoc($result)) {
            $category_title = $row['title'];
            $categorydesc = $row['description'];
            echo '<h1 class="text-center mt-4 mx-4">' . $category_title . '</h1>';
            echo '<p class="text-center mb-5">' . $categorydesc . '</p>';
        }
    ?>

    <!-- THIS IS THE CONTAINER WHICH CONTAINS OUR ALL LIST AS CARDS -->
    <div class="container" style="display: flex;  min-height: 100vw; flex-wrap:wrap; justify-content:center;">

        <?php
        include 'partials/_dbconnect.php';
        $isEmpty = true;
        $category_id = $_GET['category_id'];
        // echo $category_id;
        $sql = "SELECT * FROM `category_list` WHERE category_id=$category_id";
        $result = mysqli_query($connect, $sql);
   
        while ($row = mysqli_fetch_assoc($result)) {
        $isEmpty = false;
        $sno = $row['sno'];
        $img_id = $row['sno'];
        $img_topic = $row['img_topic'];
        $title = $row['title'];
        $description = $row['description'];
        // echo $category_id;
    
   
        echo '<form action="videoplayer.php" method="post" _ngcontent-serverapp-c44=""
            class="card mx-4 my-2 p-2 align-items-center" style="width: 18rem;"><img style="width: 231px;
            height: 191px;" _ngcontent-serverapp-c44="" src="static/img_video/' . $img_topic . '.png" alt="..."
                class="padded card-img-top">
            <div _ngcontent-serverapp-c44="" class="card-body">
                <h5 _ngcontent-serverapp-c44="" name="title" class="card-title text-center">' . $title . ' </h5>
                <p _ngcontent-serverapp-c44="" name="description" class="card-text text-center">' . substr($description,
                    0, 50) . '...
                </p>';
                    echo '<a _ngcontent-serverapp-c44="" routerlink="/videos" class="btn btn-outline-success d-block"
                    href="videoplayer.php?category_list_id=' . $sno . '">Browse Reference >></a>';
                echo '</div> </form>';

        }
        if($isEmpty){
        echo '<h1>This session was empty now we are add content here soon</h1>';
        // echo $category_id;
        }

        ?>
    </div>









    <!-- CATEGORY LIST CONTAINER ENDS HERE  -->

    <!-- CATEGORY CONTAINER ENDS HERE -->

    <!-- FOOTER HERE  -->
    <?php include 'partials/_footer.php';  ?>








    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
    </script> -->

</body>

</html>