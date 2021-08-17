
<?php

require_once '../includes/conn.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];

      $sql = "INSERT INTO users(username, password, email)
                    VALUES('$username','$password', '$email')";

      $check = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            
        if(mysqli_num_rows(mysqli_query($conn, $check))>=1){
            $response['error'] = false;
            $response['message'] = "User already exist";
        } else if(mysqli_query($conn, $sql)){
            $response['error'] = false;
            $response['message'] = "Succes register new user";
        } 
        else{
            $response['error'] = true;
            $response['message'] = "Some error occur. Try again";
        }

}else{
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}

echo json_encode($response);
?>