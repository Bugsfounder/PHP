<?php
    include '_dbconnect.php';
    $showError = "false";
    $showSuccess = "false";

    if($_SERVER['REQUEST_METHOD']=='POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);


        // CHECK WHETHER A USERNAME OR EMAIL ALREADY EXISTS IN THE DATABASE
        $sql = "SELECT * FROM `users` WHERE user_name='$name'";
        $result = mysqli_query($connect, $sql);
        $numOfMatch = mysqli_num_rows($result);
        
        if($numOfMatch==1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['user_password'])){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sno']=$row['user_id'];
                $_SESSION['username']=$name;
                $_SESSION['email'] = $email;
                // $_SESSION['password'] = $password;
                
            }
            header("Location: /myreference/index.php?loggedinsuccess=true") ;
            exit();           

        }
        header("Location: /myreference/index.php?loggedinsuccess=false");

    }
     
?>