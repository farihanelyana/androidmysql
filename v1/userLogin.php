<?php

require_once '../includes/conn.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    
        
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //  $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
    //     session_register("myusername");
    //     $_SESSION['login_user'] = $myusername;
         $response['error'] = false;
         $response['id'] = $row['id'];
         $response['username'] = $row['username'];
         $response['email'] = $row['email'];
        
        
      }else {
         $response['error'] = true;
         $response['message'] = "Your Login Name or Password is invalid";
      }

}

echo json_encode($response);