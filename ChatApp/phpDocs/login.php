<?php
//API to unable the user to get access without GET
 if(!(isset($my_API)) || !($my_API==1208738217983)){
    die("You can't do that!");
 }
 //check login = true/false?----------------------------------------------------
 include 'dbFiles/dbh.class.php';
 include 'dbFiles/checkLogin.class.php';
 $object = new checkLogin();
 $bol = $object->startSessionIfCookie();
 if($bol==1){
   header('Location: dashboard.php');
 }

 //html below-------------------------------------------------------------------
 ?>
    <div class="container">
    <div class="row">
    <div class="col-sm">
    <form class="form-signin" action="phpDocs/validation/validation.php" method="POST">
      <input type="hidden"  name="a0" value="login">
       <h1 class="h3 mb-3 font-weight-normal">Please login</h1>
       <label for="inputEmail" class="sr-only">Email address or username</label>
       <input type="text" id="inputFirst" name="inputFirst" class="form-control" placeholder="Email address or username" required autofocus>
       <?php
           if(isset($_GET["err"])){
             switch (intval($_GET["err"])) {
               case '-4':
                 echo '<font color="#dd2c17" size="2">
                 invalid input : username/email or/and password <BR/>
                 </font>';
                 break;
             }
           }
        ?>
       <label for="inputPassword" class="sr-only">Password</label>
       <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>

       <div class="checkbox mb-3">
         <label>
           <input type="checkbox" value="remember-me" name="remember" id="rm"> Remember me
         </label>
       </div>
       <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
       <a href="user.php?action=signup">Don't have an account?</a>
     </form>
    </div>
    </div>
    </div>
