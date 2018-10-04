<?php
include_once('../dbFiles/dbh.class.php');
include_once('../dbFiles/contact.class.php');

if(!isset($_POST['your-name']) AND empty($_POST['your-name']) AND !isset($_POST['your-email']) AND empty($_POST['your-email']) AND !isset($_POST['your-message']) AND empty($_POST['your-message']) ){
  header('Location: ../../contact.php?action=err');
  exit();
} else {
  $name=$_POST['your-name'];
  $email=$_POST['your-email'];
  $msg=$_POST['your-message'];

  $msg_regx="/^.{10,300}$/";


  if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match($msg_regx ,$msg) ) {
    header('Location: ../../contact.php?action=err');
    exit();
  }

  $object = new Contact($name, $email, $msg );
  $object->inserContact();

echo " <p>Message send with this data:</p>
<p>Ime:<b> ".$name."</b></p>
<p>e-mail:<b> ".$email."</b></p>
<p>Poruka:<b> ".$msg."</b></p>
";
}


 ?>
