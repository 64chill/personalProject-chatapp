<?php

class Contact extends Dbh{
  private $name;
  private $email;
  private $msg;

  function __construct($n, $e, $m){
    $this->name=$n;
    $this->email=$e;
    $this->msg=$m;
  }

    public function inserContact(){
      $stmt = $this->connect()->prepare(
        "INSERT INTO contact_messages(contact_name,contact_email,msg) VALUES(?,?,?)"
      );
      $stmt->execute([$this->name, $this->email, $this->msg]);

    }
}


 ?>
