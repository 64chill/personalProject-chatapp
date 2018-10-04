<?php
$current_page="index";
include_once 'phpDocs/header.php';
 ?>
 <!DOCTYPE html>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-bottom">
      <div class="container">
        <a class="navbar-brand text-warning" href="index.php">Chatapp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
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
              <a class="nav-link" href="stats.php">Statistics</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-6" style="color:white;">
            <h1 class="mt-5">Chat app</h1>
          </div>
        </div>
      </div>
    </section>
<?php include_once 'phpDocs/footer.php'; ?>
