<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validation
 *
 * @author m.kurvanbayev
 */
class Validation {
    
    public $spec = array();
    
    public static function email($email){
        if ( trim($email) == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            return FALSE;
        }
        return TRUE;
    }
    
    public static function input($data) {
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strip_tags($data);
        $data = trim($data);
        return $data;
    }
    
    public static function probel($data){
        if (strripos($data, ' ')){
            return FALSE;
        }
        return TRUE;
    }
    
    

    public static function iin($data){
        if ($data == '' || strripos($data, ' ') || !is_numeric($data) || !preg_match("/^[0-9]+$/u", $data) || strlen($data)!=12){
            return FALSE;
        }
        return TRUE;
    }
}
