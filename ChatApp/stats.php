<?php
$current_page="stats";
include_once 'phpDocs/header.php';

include_once 'phpDocs/dbFiles/dbh.class.php';
include_once 'phpDocs/dbFiles/stats.class.php';
session_start();
 ?>
 <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="navbar-brand" href="index.php">Chatapp</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="user.php?action=login">Login
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="user.php?action=signup">Singup/Register</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-warning" href="stats.php">Statistics</a>
    </li>

    <?php
    if( isset($_SESSION["user_basic_id"]) && isset($_SESSION["email"]) && isset($_SESSION["username"]) ){
    echo'<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        My profile
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="dashboard.php">Dashboard</a>
        <a class="dropdown-item" href="phpDocs/validation/logout.php">logout</a>
      </div>
    </li>';
  }
    ?>
  </ul>
</nav>


<?php
    $object = new Stats();
    echo '<div class="container" style="margin-top: 50px;"><div class="row">
    <div class="col">
    <div class="card border-primary mb-3" style="max-width: 20rem;">
    <div class="card-header">Number of registered users</div>
    <div class="card-body">
    <h4 class="card-title">'.$object->getNumOfUsers().'</h4>
    </div>
    </div>
    </div>

    <div class="col">
    <div class="card border-primary mb-3" style="max-width: 20rem;">
    <div class="card-header">Number of contact messages</div>
    <div class="card-body">
    <h4 class="card-title">'.$object->getNumOfMessages().'</h4>
    </div>
    </div>
    </div>

    <div class="col">
    <div class="card border-primary mb-3" style="max-width: 20rem;">
    <div class="card-header">Number of chat messages</div>
    <div class="card-body">
    <h4 class="card-title">'.$object->getNumOfChat().'</h4>
    </div>
    </div>
    </div>
    </div>';
    ?>

        <div class="row"><h2>User list:</h2></div>
        <table class="table">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">email</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
        </tr>
        </thead>
        <tr>
          <td scope="col"></th>
          <td scope="col"> <!-- username -->
            <a href="stats.php?tab=username&orderby=ASC">ASC</a> |
             <a href="stats.php?tab=username&orderby=DESC">DESC</a>
          </td>
          <td scope="col"><!-- email --> 
            <a href="stats.php?tab=email&orderby=ASC">ASC</a> |
             <a href="stats.php?tab=email&orderby=DESC">DESC</a>
          </td>
          <td scope="col"> <!-- first name -->
            <a href="stats.php?tab=firstname&orderby=ASC">ASC</a> |
             <a href="stats.php?tab=firstname&orderby=DESC">DESC</a>
          </td>
          <td scope="col"> <!-- last name -->
            <a href="stats.php?tab=lastname&orderby=ASC">ASC</a> |
             <a href="stats.php?tab=lastname&orderby=DESC">DESC</a>
          </td>
        </tr> 
<?php 
    if(isset($_GET['tab']) and isset($_GET['orderby'])){
        if( ($_GET['tab'] == 'username' || $_GET['tab'] == 'email' || $_GET['tab'] == 'firstname' || $_GET['tab'] == 'lastname') && ($_GET['orderby']=="DESC" || $_GET['orderby']=="ASC") ){
            echo '<div class="row">'.$object->getUserList($_GET['tab'], $_GET['orderby'] ).'</div>';
        }
      } else{
            echo '<div class="row">'.$object->getUserList().'</div>';
        }





      echo '</div>'; // end container




 ?>

<?php include_once 'phpDocs/footer.php';?>
