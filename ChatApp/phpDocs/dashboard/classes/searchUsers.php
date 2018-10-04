<?php

/**
 *
 */
class SearchUsers extends Core{

    public function searchMyInputForUsers($inputText){
      $this->query("
      SELECT * FROM user_basic
      WHERE username LIKE '".$inputText."%'
         OR firstName LIKE '".$inputText."%'
         OR lastName LIKE '".$inputText."%'
      ;");
      return $this->getRows();

    }
}



 ?>
