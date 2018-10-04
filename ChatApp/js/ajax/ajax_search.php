<?php
require '../../phpDocs/dashboard/classes/core.php';
require '../../phpDocs/dashboard/classes/searchUsers.php';
$notFound='
<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Username</th>
<th scope="col">First Name</th>
<th scope="col">Last Name</th>
</tr>
</thead>
</table>
None found.';

if(isset($_POST['method']) && $_POST['method']=='getMyData'){

  if(isset($_POST['txt']) && !empty($_POST['txt'])){

    $object= new SearchUsers();
    $users = $object->searchMyInputForUsers($_POST['txt']);

    if(empty($users)){
      echo $notFound;
    } else{


    ?>
        <table class="table">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        </tr>
        </thead>
        <tbody>
    <?php
    $countNum=0;

    foreach ($users as $user) {
      $countNum++;
      echo '<tr>
      <td scope="row">'.$countNum.'</td>

      <td><a href="dashboard.php?page=user&id='.$user['user_basic_id'].'">
      '.$user['username'].'
      </a></td>
      <td>'.$user['firstName'].'</td>
      <td>'.$user['lastName'].'</td>
      </tr>';

    }
    ?>
        </tbody>
          </table>
    <?php
  }
  } else {echo $notFound;}
} else {echo $notFound;}
 ?>
