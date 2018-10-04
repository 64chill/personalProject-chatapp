<?php //include '../dashHeader.php';
    include 'phpDocs/dashboard/dashHeader.php';


    include 'phpDocs/dashboard/classes/myprofile.php';
    include 'phpDocs/dashboard/classes/friendList.php';

    $u_id=$_GET['id'];

    $object = new MyProfile();
    $objectFriend= new FriendList();
?>

      <div class="container">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-10" style="border-style: solid;border-color: #00ff99;padding:30px;background-color:white;border-radius:4%;">
            <table style="width:500px;">
           <tr>
             <td><u>Username</u></th>
             <td><?php echo $object->getUsername($u_id)[0]['username']; ?></th>
           </tr>
           <tr>
             <td><u>First Name:</u></th>
              <td><?php echo $object->getFname($u_id)[1]['firstName']; ?></th>
           </tr>
           <tr>
              <td><u>Last Name:</u></th>
              <td><?php echo $object->getLname($u_id)[2]['lastName']; ?></th>
           </tr>
           <tr>
              <td><u>About me:</u></th>
              <td><?php echo $object->getAboutme($u_id)[3]['aboutMe']; ?></th>
           </tr>
          </table>
          <br/>
          <?php
          if( $_SESSION['user_basic_id'] != $u_id){

            if($objectFriend->checkIfIsMyFriend($u_id)){
              echo '<form action="phpDocs/validation/validation_settingsPage.php" method="post">
              <input type="hidden"  name="a0" value="4">
              <input type="hidden" name="removeUser" value="'.$u_id.'">
              <button class="btn btn-danger" type="submit" name="button">Remove as friend</button>
              </form>';

            } else {
              echo '
                <form action="phpDocs/validation/validation_settingsPage.php" method="post">
                <input type="hidden"  name="a0" value="3">
                <input type="hidden" name="addUser" value="'.$u_id.'">
                <button class="btn btn-success" type="submit" name="button">Add as friend</button>
              </form>
              ';
            }

          } else {
            echo '<div class="alert alert-info" role="alert">
  <h4 class="alert-heading">My account</h4>
  <p>It is not posible to add or remove yourself as a friend</p>
</div>';
          }
           ?>
           </form>
            <!-- -->
        </div>
          <div class="col-lg-1"></div>
        </div> <!-- end row-->
      </div> <!-- end container-->
