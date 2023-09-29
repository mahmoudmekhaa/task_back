<?php

if (!function_exists('pageTitle')){
    function pageTitle()
    {
        $script_name = $_SERVER['SCRIPT_NAME'];
        $array = explode('/',$script_name);
        $title = end($array);
        $new = explode('.',$title);
        if ($new[0] == 'index'){
            $title ="Login";
        }else{
            $title= ucfirst($new[0]);
        }
        return $title;
    }    
}

if (!function_exists('checkRequest')) {
    function checkRequest($request)
    {
        if ($_SERVER['REQUEST_METHOD'] == $request) {
            return true;
        }
        return false;
    }
}

if (!function_exists('redirectTo')){
    function redirectTo($path)
    {
        return header("Location:$path");
    }
}

if (!function_exists('sanitize')){
    function sanitize($input)
    {
        return trim(htmlspecialchars(htmlentities($input)));
    }
}


if(!function_exists('requiredValue')) {
    function requiredValue($input)
    {
        if(empty($input)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('minLength')) {
    function minLength($input,$min)
    {
        if(strlen ($input) <=$min) {
            return true;           
        }
        return false;
    }
}

if (!function_exists('maxLength')) {
    function maxLength($input,$max) 
    {
        if (strlen($input) > $max){
            return true;
        } 
        return false;
    }
}

if (!function_exists('isValidEmail')){
    function isValidEmail($input)
    {
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}


if (!function_exists('getSession')) {
    function getSession($key,$value = null,$type = 'danger')
    {
        if (isset($_SESSION[$key][$value])) {
            echo "<div class=\"alert alert-$type\">";
            echo $_SESSION[$key][$value];
            unset($_SESSION[$key][$value]);
            echo "</div>";
        }
    }
}

if(!function_exists('flashSession')){
    function flashSession($key,$type = 'danger')
    {
        if (isset ($_SESSION[$key])) {
            echo "<div class=\"alert alert-$type\">";
            echo $_SESSION[$key];
            unset ($_SESSION[$key]);
            echo "</div>";
        }
    }
}

if(!function_exists('readFromJsonFile')) {
    function readFromJsonFile($path)
    {
        return json_decode(file_get_contents($path),true);
    }
}

if(!function_exists('isLoggedIn')){
    function isLoggedIn($session_name, $path)
    {
        if(!isset($_SESSION[$session_name])){
            redirectTo($path);
            die;
        }
    }
}
?>