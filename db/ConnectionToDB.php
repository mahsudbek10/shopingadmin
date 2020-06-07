<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConnectionToDB
 *
 * @author m.kurvanbayev
 */
class ConnectionToDB {
    //put your code here
    function secured_signin($username,$password){   
        try{
            $connection = new PDO("mysql:host=localhost;dbname=phpproject", "root", "");
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $prepared = $connection->prepare("SELECT COUNT(`users_email`) FROM `users` WHERE `users_email` = :bp_username; ");
            $prepared->bindParam(':bp_username', $username);
//            $prepared->bindParam(':bp_password', $password);       
            $prepared->execute();

            if ($prepared->fetchColumn() == 1)
            $result=true;

            else
            $result=false;
            
            
        } catch(PDOException $x) { 
            die("Secured"); 
            
            
        }
        
        $prepared = null;
        $connection = null;
        return $result;   
    }
}
