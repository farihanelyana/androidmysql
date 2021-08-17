<?php
include_once('conn.php')

class OperationInsert{

   
    /*crud --> code untuk insert data ke table user */

    function createUser($username, $password, $email){
            $password = md5($password);
  

            $sql = "INSERT INTO users ('id', 'username', 'password', 'email') VALUES (NULL, ?, ?, ?)";          

        if(mysqli_query($conn,$sql)){    
            return true;
        }
        else{
            return false;
        }

        }
    
}
?>