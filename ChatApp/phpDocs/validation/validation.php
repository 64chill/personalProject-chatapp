<?php
//func----------------------------------------------------------------------
function redirectToUserPhp($messageCode = 0) {
    ob_clean();
    header('Location: ../../user.php?err=' . $messageCode);
    exit();
}
function checkAll($th , $moj_regx){
  	if(isset($_POST[$th]) && !empty($_POST[$th])){
      if($moj_regx != -1){ //for fields without REGEX
                if(preg_match($moj_regx ,$_POST[$th])){
          	       return $_POST[$th];
                 }else{
                   redirectToUserPhp(-2);
                }
      } else{
        return $_POST[$th];
      }
    }else{
      redirectToUserPhp(-3);
      exit();
    }
};

/*------------------------------------------------------------------------------
Switch  - -- HIDDEN FIELD
------------------------------------------------------------------------------*/
$a0 = checkAll("a0" , -1);

switch ($a0) {
  case 'login':
    include_once("validationLogin.php");
    break;
    case 'signup':
      include_once("validationRegister.php");
      break;

  default:
    redirectToUserPhp(-1);
    break;
}
 ?>
