<?php
$showError = "false";
$showAlert = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){
    include '_dbConnect.php'; 
    $username = $_POST['username'];
    $userEmail = $_POST['signupEmail'];
    $userPhoneNumber = $_POST['signupPhoneNumber'];
    $userPassword = $_POST['signupPassword'];
    $userConfirmPassword = $_POST['signupConfirmPassword'];
    $hashPassword = password_hash($userPassword,  PASSWORD_DEFAULT);

    // CHECK WHETHER A EMAIL OR USERNAME WAS ALREADY EXISTS OR NOT
    $isExixtsSql = "SELECT * FROM `users` WHERE username='$username' AND user_email='$userEmail'";
    $result = mysqli_query($connect, $isExixtsSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError="Error! Email or Username Already in use Choose an unique email and Username.";
        echo $showError;
    }else{
        // INSERTION SQL

        // INSERT DATA TO THE DATABASE IF PASSWORD AND CONFIRM PASSWORD ARE SAME ELSE SHOWS ERROR
        if ($userPassword==$userConfirmPassword) {
            $sql = "INSERT INTO `users` (`username`, `user_email`, `user_phone_number`, `user_password`, `user_timestamp`) VALUES ( '$username', '$userEmail', '$userPhoneNumber', '$hashPassword', current_timestamp());";
            $result = mysqli_query($connect, $sql);
            // $showSuccess = $username." Your Account Created Successfully";
            // echo $showSuccess;
            if($result)            {
                $showAlert = true;
                header("Location: /forum/index.php?signupsuccess=true");
                exit();
            }
        }else{
            $showError="Error! Password Not Matched. Check password and confirm password correctly.";
            // header("Location: /forum/index.php?signupsuccess=false&error=$showError");
        }

    }
    header("Location: /forum/index.php?signupsuccess=false&error=$showError");
}


?>