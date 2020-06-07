<?php
require './db/ConnectionToDB.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$user = new Select();
//
//$result = $user->findByColumn("users", "users_email", "mahsudbek95@gmail.com");

$result = new ConnectionToDB();
$result = $result->secured_signin("mahsudbek95@gmail.com", "123");
if($result===TRUE){
    echo 'fddsafsaf';
}
