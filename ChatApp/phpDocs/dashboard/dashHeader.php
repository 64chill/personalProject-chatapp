<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarColor01">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item <?php
    if(!isset($_GET['page'])){
      echo "active";
    }
    ?>">
      <a class="nav-link" href="dashboard.php">Chat </a>
    </li>
    <li class="nav-item <?php
    if(isset($_GET['page']) && $_GET['page']=="settings"){
      echo "active";
    }
    ?>">
      <a class="nav-link" href="dashboard.php?page=settings">Settings</a>
    </li>
    <li class="nav-item <?php
    if(isset($_GET['page']) && $_GET['page']=="friends"){
      echo "active";
    }
    ?>">
      <a class="nav-link" href="dashboard.php?page=friends">See friends</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php?page=search">Search users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php?page=uploadCheck">Check Upload</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php" target="_blank">Contact</a>
    </li>
  </ul>
  <form class="form-inline my-2 my-lg-0" method="POST" action="phpDocs/validation/logout.php">
    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Logout</button>
  </form>
</div>
</nav>
