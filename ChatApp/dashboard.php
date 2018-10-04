<?php
$current_page="dashboard";
include_once 'phpDocs/header.php';
include_once 'phpDocs/dashboard/classes/core.php';
//provera-----------------------------------------------------------------------
function dashboardRedirect($broj){
  ob_clean();
  header('Location: dashboard.php?err=' . $broj);
  exit();
}
if(isset($_GET["err"])){
	include_once 'phpDocs/errorHandler.php';
}

//check login = true/false?-----------------------------------------------------
include 'phpDocs/dbFiles/dbh.class.php';
include 'phpDocs/dbFiles/checkLogin.class.php';
$object = new checkLogin();
$bol = $object->startSessionIfCookie();
if($bol!=1){
  session_start();
}

//provera da li uopste postoji sesija-------------------------------------------
if (!(isset($_SESSION["user_basic_id"]) && isset($_SESSION["email"]) && isset($_SESSION["username"]))) {
dashboardRedirect(-11);
}

// $_GET['page']??------------------------------------------------------------
if(isset($_GET['page']) && !empty($_GET['page'])){

  if($_GET['page']=="settings"){//settings--------------------------------------
      require 'phpDocs/dashboard/getPage/settings.page.php';

  } else if ($_GET['page']=="friends"){//friends--------------------------------
      require 'phpDocs/dashboard/getPage/friends.page.php';

  }else if ($_GET['page']=="search"){//search-----------------------------------
      require 'phpDocs/dashboard/getPage/search.page.php';

  } else if($_GET['page']=="uploadCheck"){
    require 'phpDocs/dashboard/getPage/uploadCheck.page.php';
  }
  else if ($_GET['page']=="user" && (isset($_GET['id']) && !empty($_GET['id']))) {//friends
    //proverava da li opste postoji odredjen user
      $object= new Core();
      $object->query('
      SELECT user_basic_id FROM user_basic WHERE user_basic_id='.$_GET['id'].' ;
      ');

      if(empty($object->getRows())){dashboardRedirect(-1);}
      require 'phpDocs/dashboard/getPage/user.page.php';
    } else{ // end page,id
      dashboardRedirect(-1);
    }
}else{
   require 'phpDocs/dashboard/mainBody.php';
  }
  //}// end $_GET['page'] ELSE




include_once 'phpDocs/footer.php';//footer--------------------------------------
 ?>
