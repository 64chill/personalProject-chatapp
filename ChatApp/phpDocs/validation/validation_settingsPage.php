<?php
session_start();
include '../dashboard/classes/core.php';
include '../dashboard/classes/myprofile.php';
include '../dashboard/classes/friendList.php';

$object=new MyProfile();
$objectFriend= new FriendList();

  function ifExist($name){
    $name = trim($name);
    If(isset($name) && !empty($name)){
      return true;
    } else{
      die("error with input!");
    }
  }

$pattern ='/^.+$/' ;
ifExist($_POST['a0']);

switch ($_POST['a0']) {
  case '1': // case first and last name------------------------------------
    if(ifExist($_POST['fName']) && ifExist($_POST['lName'])){
      if(preg_match($pattern, $_POST['fName']) && preg_match($pattern, $_POST['lName'])){
          $object->setFLname($_SESSION['user_basic_id'],$_POST['fName'],$_POST['lName']);
          header('Location: ../../dashboard.php?page=settings&action=succ1');
      }
    }
    break;
  case '2':// case about me-----------------------------------------------
  if(ifExist($_POST['txtAbout'])){
      if(preg_match($pattern, $_POST['txtAbout'])){
          $object->setAboutme($_SESSION['user_basic_id'],$_POST['txtAbout']);
          header('Location: ../../dashboard.php?page=settings&action=succ2');
      }
    }
  break;
  // VALIDATION FOR USER - ADD/REMOVE FRIEND-------------------------------------
  case '3'://addUser------------------------------------------------------------
    if(ifExist($_POST['addUser'])){
      $objectFriend->setFriend($_POST['addUser']);
      header('Location: ../../dashboard.php?page=user&id='.$_POST['addUser']);
    }
    break;

  case '4': //removeUser--------------------------------------------------------
    if(ifExist($_POST['removeUser'])){
      $objectFriend->removeFriend($_POST['removeUser']);
      header('Location: ../../dashboard.php?page=user&id='.$_POST['removeUser']);
    }
    break;
}









 ?>
