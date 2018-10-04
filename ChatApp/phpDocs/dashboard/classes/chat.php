<?php

Class Chat extends Core{

  public function fetchMessages(){

    $this->query("
    SELECT chat_basic.message, user_basic.username, user_basic.user_basic_id , chat_basic.`timestamp`, chat_basic.message_id
    FROM chat_basic
    INNER JOIN user_basic
    ON user_basic.user_basic_id = chat_basic.user_id
    ORDER BY chat_basic.timestamp DESC
    LIMIT 0,8;
  "
);
   return $this->getRows();
  }

  public function throwMessage($u_id, $message){
    $this->query("
    INSERT INTO chat_basic (user_id,message, timestamp)
    VALUES (". (int)$u_id.",'". $this->db->real_escape_string(htmlentities($message)) ."', UNIX_TIMESTAMP())
    ");//+7200 for 2h for timezone
  }
}

 ?>
