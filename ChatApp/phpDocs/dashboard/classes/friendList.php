<?php

/**
 * Class FriendList
 *    setFriend       ($u_id)
 *    removeFriend    ($u_id)
 *    listMyFriends   ($u_id)
 *    printMyFriends
 *    checkIfIsMyFriend ($u_id)
 *
 *
 */
class FriendList extends Core{

  public function setFriend($u_id){//setFriend----------------------------------

    $this->query("
    SELECT user_id
    FROM user_friend_list
    WHERE friend_id=".$u_id." AND user_id=".$_SESSION['user_basic_id'].";
    "
    );
    $currentFriends = $this->getRows();
    if(empty($currentFriends)){
      $this->query("
      INSERT INTO user_friend_list (user_id, friend_id)
      VALUES (".$_SESSION['user_basic_id'].",".$u_id." );
      "
      );
    };


  }

  public function removeFriend($u_id){//removeFriend----------------------------

    $this->query("
    DELETE FROM user_friend_list
    WHERE friend_id=".$u_id." AND user_id=".$_SESSION['user_basic_id'].";
    "
    );

  }

  public function listMyFriends(){//listMyFriends-------------------------------

    $this->query("
    SELECT user_friend_list.friend_id, user_basic.username
    FROM user_friend_list
    INNER JOIN user_basic ON user_basic.user_basic_id = user_friend_list.friend_id
    WHERE user_id=".$_SESSION['user_basic_id'].";
    "
    );
    return $this->getRows();
  }
  public function printMyFriends(){//printMyFriends-----------------------------
    $myFriends=$this->listMyFriends();
    if(empty($myFriends)){echo "You don't have any friends at the moment.";}
    else{
    echo '<ul>';
    foreach ($myFriends as $friend) {
      ?>
      <li><h4><a href="<?php
      echo 'dashboard.php?page=user&id='.$friend['friend_id'];
       ?>">
        <?php
          echo $friend['username'];
         ?>
      </a></li></h4>
      <?php
    }
    echo '</ul>';
}
  }

  public function checkIfIsMyFriend($u_id){//checkIfIsMyFriend------------------

    $this->query("
    SELECT user_id
    FROM user_friend_list
    WHERE friend_id=".$u_id." AND user_id=".$_SESSION['user_basic_id'].";
    "
    );
    $isItMyFriend=$this->getRows();
    if(!empty($isItMyFriend)){
      return true;
    } else {
      return false;
    }
  }
}



 ?>
