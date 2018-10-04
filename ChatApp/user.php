<?php
session_start();
if( isset($_SESSION["user_basic_id"]) && isset($_SESSION["email"]) && isset($_SESSION["username"]) ){
	header('Location: dashboard.php');
}
$current_page="user";
	include_once 'phpDocs/header.php';
	// function to show error---------------------------------
 function redirectToUserPhp($messageCode = 0) {
		 ob_clean();
		 header('Location: ?err=' . $messageCode);
		 exit();
 }
//our code---------------------------------------------------------------------------
 	$my_API=1208738217983;

// check if variable exist = if true >> show different content------------------
//err?--------------------------------------------------------------------------
if(isset($_GET["err"])){
	include_once 'phpDocs/errorHandler.php';
}

//action?-----------------------------------------------------------------------
	if(isset($_GET["action"])){
		$action = $_GET["action"];
		if($action=="login"){
			include_once'phpDocs/login.php';

		} else if($action=="signup"){
			include_once'phpDocs/register.php';

		}else if($action=="regsucc"){
			session_start();
			if(isset($_SESSION["reg"])){
				echo"<font color='white'><h1>Uspešno ste se registrovali!<br/>";
				echo'<a href="user.php?action=login" style="color:#cccc00">Prijava na sistem</a></font></h1>';
				session_unset();
				session_destroy();
			}else{
				redirectToUserPhp(-1);
			}
		}else{
			redirectToUserPhp(-1);
		}
	}else{
		redirectToUserPhp(-1);
	}
	include_once 'phpDocs/footer.php';

?>
