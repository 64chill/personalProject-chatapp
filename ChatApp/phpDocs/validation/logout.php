<?php
session_unset();//remove variable
session_destroy(); //destroy session
//remove all cookies if
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);//get all cookie
    foreach($cookies as $cookie) { //get through every cookie
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
header('Location: ../../index.php');
 ?>
