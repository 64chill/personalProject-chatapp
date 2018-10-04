<?php
session_start();
require '../../phpDocs/dashboard/init.php';
if (isset($_POST["method"]) && !empty($_POST["method"]) ) {
  $chat = new Chat();
  $method = trim($_POST["method"]);

  if($method==="getMyData"){
    //get and receive output

    $messages = $chat->fetchMessages();


    if (empty($messages)) {
      echo 'There are no messages!';
    }else {
      foreach ($messages as $message) {
        ?>
        <hr/>
        <div class="message" <?php echo 'id="'.$message['message_id'].'">'; ?>
          <font color="#00cc00" size="2">[<?php
                                            $message['timestamp']+=7200; // add 7200 to show good time zone
                                            echo gmdate("d-m-Y, H:i", $message['timestamp']) ;
                                            ?>]</font>
          <a href="<?php
          echo 'dashboard.php?page=user&id='.$message['user_basic_id'];
           ?>">
            <?php
              echo $message['username'];
             ?>
          </a> :
          <p> <?php
          echo nl2br($message['message']);
          ?></p>
        </div>

        <?php
      }// end foreach
    }// end else


  } else if ($method==='getMyData' && isset($_POST['poruka'])){
    //throw message into database
    $message = trim($_POST['poruka']);
    if (!empty($message)){
      $chat->throwMessage($_SESSION["user_basic_id"], $message);
    }
  }
  }



 ?>
