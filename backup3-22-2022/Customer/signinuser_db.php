<?php 

    session_start();
    include  ('server.php');

    $errors = array();

    if (isset($_POST['signin'])) {
        $idcard = mysqli_real_escape_string($conn, $_POST['idcard']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
            
        if (empty($idcard)) {
          array_push($errors, "IDCard is required");
        }
        if (empty($password)) {
            array_push($errors, "password is required");
          }
        if (count($errors)== 0){

            $password = md5($password);
            $query = "SELECT * FROM usersgp WHERE idcard = '$idcard' AND password = '$password'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] ="Your are now logged in";
                header("location : UserLandingPage.php");
            } else {
                array_push($errors, "wrong username/password combination");
            }
        }
    }
        
        
?>