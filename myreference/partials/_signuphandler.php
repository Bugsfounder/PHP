<?php
    include '_dbconnect.php';
    $showError = "false";
    $showSuccess = "false";

    if($_SERVER['REQUEST_METHOD']=='POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);


        // CHECK WHETHER A USERNAME OR EMAIL ALREADY EXISTS IN THE DATABASE
        $sql = "SELECT * FROM `users` WHERE user_name='$name'";
        $result = mysqli_query($connect, $sql);
        $numOfMatch = mysqli_num_rows($result);
        
        if($numOfMatch>0){
            $showError = "User already exists";
            // echo $showError;
        }else{
            // INSERTING DATA TO THE DATABASE BECAUSE USER NOT EXISTS IN THE DATABASE

            if ($password==$cpassword) {
            $sql ="INSERT INTO `users` (`user_name`, `user_email`, `user_password`, `user_phone`, `timestamp`) VALUES ('$name', '$email', '$hash_password', '$phone', current_timestamp())";
             
            $result = mysqli_query($connect, $sql);

            if($result){
                $showSuccess = "true";
                header("Location: /myreference/index.php?signupsuccess=true");
                exit();
            }else{
                $showError="Error! Password Not Matched. Check password and confirm password correctly.";
                header("Location: /myreference/index.php?signupsuccess=false&error=$showError");
            }
            }else{
                
                $showError="Error! Password Not Matched. Check password and confirm password correctly.";
                header("Location: /myreference/index.php?signupsuccess=false&error=$showError");
        }

        }

        header("Location: /myreference/index.php?signupsuccess=false&error=$showError");

    }
     
?>