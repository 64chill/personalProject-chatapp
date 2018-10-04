
<?php //include '../dashHeader.php';
include 'phpDocs/dashboard/dashHeader.php';

include 'phpDocs/dashboard/classes/friendList.php';

$object = new FriendList();

      ?>

      <div class="container">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-10" style="border-style: solid;border-color: #00ff99;padding:30px;background-color:white;">
            <h3>My friend list:</h3>
            <p>
              <?php
                $object->printMyFriends();
                ?>
            </p>
            <!-- -->
        </div>
          <div class="col-lg-1"></div>
        </div> <!-- end row-->
      </div> <!-- end container-->
