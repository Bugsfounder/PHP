<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>MyReference - Home</title>
    <link rel="stylesheet" href="/myreference/static/css/home.css">
</head>

<body>
    <!-- MAIN CONTAINER STARTS HERE -->
    <?php include 'partials/_header.php';  ?>

    <!-- WELCOME CONTAINER STARTS HERE -->

    <div class="container-fluid bg-gradient" style="background-color:#e9ecef; padding: 50px;">
        <div class="container" style="    display: flex;    flex-direction: column;    align-items: center;">
            <img src="/myreference/static/img_home/brand_logo.png" alt="MyReference" style="width: 120px;">
            <h1 class="text-dark text-center">Welcome to MyReference</h1>
            <p class="lead container text-muted text-center">Confused on which course to take? I have got you covered.
                Browse
                courses
                and find out
                the best course for you. Its free!
                Code With Harry is my attempt to teach basics and those coding techniques to people in short time which
                took
                me ages to learn.
            </p>
            <form class="d-flex">
                <a _ngcontent-serverapp-c44="" routerlink="/videos" class="btn mx-1  btn-success d-block"
                    href="/myreference/categorylist.php?category_id=1">Video Reference</a>
                <a _ngcontent-serverapp-c44="" routerlink="/videos" class="btn  mx-3 btn-danger d-block"
                    href="/myreference/categorylist.php?category_id=4">Notes Reference </a>
                <a _ngcontent-serverapp-c44="" routerlink="/videos" class="btn  mx-3 btn-success d-block"
                    href="/myreference/categorylist.php?category_id=3">Code Reference </a>
            </form>
        </div>
    </div>
    <!-- WELCOME CONTAINER STARTS HERE -->

    <!-- CATEGORY CONTAINER STARTS HERE -->
    <h1 class="text-center my-4 mx-4">All Caregories</h1>


    <!-- CATEGORY LIST CONTAINER STARTS HERE  -->
    <div class="container" style="display: flex; flex-wrap:wrap;align-items: center; justify-content:center;">

        <!-- FETCHING DATA FROM DATA BASE AND DISPLAY HERE  -->
        <?php
        include 'partials/_dbconnect.php';  

        $sql = "SELECT * FROM `categorise`";
        $result = mysqli_query($connect,$sql);

        while($row=mysqli_fetch_assoc($result)){
            $sno = $row['sno'];
            $img_id = $row['sno'];
            $title = $row['title'];
            $img_topic = $row['img_topic'];
            $description = $row['description'];
            
            echo '<form acrtion="categoryList.php" method="post" _ngcontent-serverapp-c44="" class="card mx-4 my-2 mb-4 p-2 align-items-center" style="width: 18rem;"><img
            _ngcontent-serverapp-c44="" style="    height: 180px;" src="/myreference/static/img_home/' . $img_topic . '.jpg" alt="..." class="padded card-img-top">
        <div _ngcontent-serverapp-c44="" class="card-body">
            <h5 _ngcontent-serverapp-c44="" name="title" class="card-title text-center">' . $title . ' </h5>
            <p _ngcontent-serverapp-c44="" name="description" class="card-text text-center">' . substr($description, 0, 85) . '... 
                </p>
                <a _ngcontent-serverapp-c44="" routerlink="/videos" class="btn btn-primary d-block"
                href="categorylist.php?category_id=' . $sno . '">' . $title . ' </a>
        </div>
         </form>';}
         
         ?>
    </div>



    <!-- &categorytitle=' . $title . '&categorydesc=' . $description . ' -->

    <!-- $category_id = $_GET['category_id'];
            if($_SERVER['REQUEST_METHOD']=='POST') {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $sql = " SELECT * FROM `category_list` WHERE category_id='$category_id'";
                $result = mysqli_query($connect, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $sno = $row['sno'] ;
                    $img_id =$row['sno'] ;
                    $title= $row['title'];
                    $description = $row['description'];

                    
            } -->


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