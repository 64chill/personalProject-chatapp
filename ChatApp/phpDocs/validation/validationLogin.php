<?php

//get class to work with db ----------------------------------------------------
include '../dbFiles/dbh.class.php';
include '../dbFiles/checkLogin.class.php';

//functions---------------------------------------------------------------------
function redirectToUserLogin($messageCode = 0) {
    ob_clean();
    header('Location: ../../user.php?action=login&err=' . $messageCode);
    exit();
}
//code -> check ----------------------------------------------------------------

$inputFirst     = checkAll("inputFirst" ,-1 );
//check email
if(!filter_var($inputFirst, FILTER_VALIDATE_EMAIL)){
  //check username
    if(!preg_match("/^[A-Za-z0-9]{3,25}$/" ,$inputFirst)){
      redirectToUserLogin(-4);
    }
}
$inputPassword  = checkAll("inputPassword" ,-1);
$object = new checkLogin($inputFirst, $inputPassword);
//CHECKBOX?---------------------------------------------------------------------
if (isset($_POST["remember"]) && $_POST["remember"] == "remember-me"){
    $object->startSessionIfUserExists(1);
} else{
  //check and login  -----------------------------------------------------------
    $object->startSessionIfUserExists();
}
 ?>
