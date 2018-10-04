<?php

include 'phpDocs/dashboard/dashHeader.php';
$current_page="search_page";


 ?>

 <div class="container" style="color:white;">
   <div class="row">
     <div class="col-lg-1"></div>
     <div class="col-lg-10" style="padding:30px;height: 100%;">
       <h3>Search registered users:</h3>
       <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Search:</span>
          </div>
          <input type="text" id="sInput"class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
        <div id="searchResults">
          <table class="table">
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
            Please Search by: username, first name or last name of the particular user.
        </div>

       <!-- -->
   </div>
     <div class="col-lg-1"></div>
   </div> <!-- end row-->
 </div> <!-- end container-->
