<?php
    require 'rb-mysql.php';
    
    R::setup( 'mysql:host=localhost;dbname=shopping','root', '' );
//    R::dispense("users");

//    $result = R::getAll("select * from users");
//    var_dump($result);
//    echo count($result);
//    foreach ($result as $value) {
//        echo $value['users_name'].'<br>';
//    } 
  
    if ( !R::testConnection() )
    {
        exit ('Нет соединения с базой данных');
    }
 
        
        
        
    
    
            
     
 
    
