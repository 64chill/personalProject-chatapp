 <?php
 //get CLASS to work with db ---------------------------------------------------
include '../dbFiles/dbh.class.php';
include '../dbFiles/newuser.class.php';

//fuct -------------------------------------------------------------------------
function redirectToUserRegister($messageCode = 0) {
    ob_clean();
    header('Location: ../../user.php?action=signup&err=' . $messageCode);
    exit();
}

  //chech input fields
  //$username = checkAll("username", "/^[A-Za-z0-9]{3,25}$/");
  //username--------------------------------------------------------------------
  $moj_regx="/^[A-Za-z0-9]{3,25}$/";
  if(isset($_POST["username"]) && !empty($_POST["username"])){
    if($moj_regx != -1){ //for field without regex
              if(preg_match($moj_regx ,$_POST["username"])){
                 $username=$_POST["username"];
               }else{
                 redirectToUserRegister(-5);
              }
    } else{
      return $_POST[$th];
    }
  }else{
    redirectToUserRegister(-5);
    exit();
  }
  //email-----------------------------------------------------------------------
  if(isset($_POST["email1"]) && !empty($_POST["email1"])){
  if (!filter_var($_POST["email1"], FILTER_VALIDATE_EMAIL)) {
    redirectToUserRegister(-6);
  }else{
    //email equals? ------------------------------------------------------------
    $emailCheckEq=strcmp($_POST["email1"],$_POST["email2"]);
    if($emailCheckEq != 0){
      redirectToUserRegister(-7);
    }
  }
} else{
  redirectToUserRegister(-6);
}
//password----------------------------------------------------------------------
if ((!isset($_POST["pwd1"]) && !isset($_POST["pwd2"])) || empty($_POST["pwd1"])&&empty($_POST["pwd2"])) {
  redirectToUserRegister(-8);
}
  $pwd1     = $_POST["pwd1"];
  $pwd2     = $_POST["pwd2"];
  if(strcmp($pwd1,$pwd2)!=0){
    redirectToUserRegister(-9);
  }

  if(!isset($_POST["tos"]) || !isset($_POST["privacy"])){
    redirectToUserRegister(-10);
  }

//Conn to db and input the user ------------------------------------------------
$object = new Newuser($username, $_POST["email1"],$pwd1);
$object->insertUser();

 ?>
