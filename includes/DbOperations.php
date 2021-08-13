<?php

    class DbOperations{

        private $con;

        function _construct(){

            require_once dirname(__FILE__).'/DbConnect.php';

            $db = new DbConnect();

            $this->con = $db->connect();
        }

        /*crud --> code untuk insert data ke table user */

        function createUser($username, $password, $email){
            $password = md5($password);
      
            $stmt = $this->con->prepare("INSERT INTO 'users' ('id', 'username',
                    'password', 'email') VALUES (NULL, ?, ?, ?);");
         
            $stmt->bind_param("sss",$username,$password,$email);

            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }

            }
        
    }
    ?>
    