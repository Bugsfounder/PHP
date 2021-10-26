<?php
    $showError = "false";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include '_dbConnect.php'; 
        $username = $_POST['loginUsername'];
        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];

        $sql = "SELECT * FROM `users` WHERE username='$username' AND user_email='$email'";
        $result = mysqli_query($connect, $sql);

        $numRows = mysqli_num_rows($result);
        if($numRows==1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['user_password'])){
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['sno']=$row['sno'];
                    $_SESSION['useremail']=$email;
                    $_SESSION['username']=$username;
                    // echo "logged in: ". $email;
            }
            header("Location: /forum/index.php?loggedinsuccess=true");
            exit();
        }
        header("Location: /forum/index.php?loggedinsuccess=false");
    }
?>