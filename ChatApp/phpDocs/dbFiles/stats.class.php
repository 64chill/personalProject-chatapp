<?php
/*
*   Stats
*       getNumOfUsers()
*       getNumOfMessages()
*       getNumOfChat()
*       getUserList($tab=-1, $orderby=-1)
*/
class Stats extends Dbh{

  public function getNum($a){
    $stmt= $this->connect()->prepare(
      $a
    );
    $stmt->execute();

    if($stmt->rowCount()>0){
      while($row = $stmt->fetch()){
        return $row['num'];
      }
    }

  }

    public function getNumOfUsers(){
      return  $this->getNum("SELECT count(*) AS num FROM user_basic ;");
  }

    public function getNumOfMessages(){
      return  $this->getNum("SELECT count(*) AS num FROM contact_messages");
    }

    public function getNumOfChat(){
      return  $this->getNum("SELECT count(*) AS num FROM chat_basic;");
    }

    public function getUserList($tab=-1, $orderby=-1){
      if($tab == -1 && $orderby==-1){
                $stmt= $this->connect()->prepare("
                  SELECT username, email, firstName, lastName
                  from user_basic;
                ");
    } // end if tab/orderby
    else {
                $stmt= $this->connect()->prepare("
                  SELECT username, email, firstName, lastName
                  from user_basic
                  ORDER BY ".$tab." ".$orderby.";");

    }

    $stmt->execute();
              if($stmt->rowCount()>0){

          $countNum=0;
                while($row = $stmt->fetch()){
                  $countNum++;
                  echo '<tr>
                <td>'.$countNum."</td><td>".
                  $row['username']."</td><td> ".
                  $row['email']."</td><td> ".
                  $row['firstName']."</td><td> ".
                  $row['lastName']."</td> ";
                }

                echo "</table>";
              }else{
                  echo "No users available.";
              }


    } // end getUserList





}



 ?>
