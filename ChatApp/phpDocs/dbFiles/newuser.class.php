<?php

class Newuser extends Dbh{
  //attributes--------------------------------------------------------------------
    private $username;
    private $email;
    private $password;

    //constructor---------------------------------------------------------------
    function __construct($u, $e, $p){
      $this->username=$u;
      $this->email=$e;
      $this->password=$p;
    }
    public function insertUser(){
      // username exists in table?----------------------------------------------
      $statement1 = $this->connect()->prepare("SELECT * FROM user_basic WHERE username=?;");
      $statement1-> execute([$this->username]);
      if($statement1->rowCount()>0){
        die("<b>Username already exist: ".$this->username." , please try another one</b>");
      }
      //check if e-mail exist --------------------------------------------------
      $statement1 = $this->connect()->prepare("SELECT * FROM user_basic WHERE email=?;");
      $statement1-> execute([$this->email]);
      if($statement1->rowCount()>0){
        die("<b>Postoji uneti e-mail: ".$this->email." , molimo vas probajte neki drugi</b>");
      }
      //hash - pwd--------------------------------------------------------------
      $HashedPwd= password_hash($this->password, PASSWORD_DEFAULT);
      //Put data to database ---------------------------------------------------
      $statement2 = $this->connect()->prepare(
        "INSERT INTO user_basic(username,email,password) VALUES(?,?,?)"
      );
      $statement2->execute([$this->username, $this->email, $HashedPwd]);
      session_start();
      $_SESSION["reg"] = "success";
      header("Location: ../../user.php?action=regsucc");
    }
}
 ?>
