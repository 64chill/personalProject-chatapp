<?php
// API to unable the user to get access without GET
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
 ?>

    <form class="form-signin" action="phpDocs/validation/validation.php" method="POST">
      <input type="hidden" name="a0" value="signup">
       <h1 class="h3 mb-3 font-weight-normal">Sign up</h1>

       <input type="text" id="username" name="username" class="form-control" placeholder="username" required autofocus>
       <hr/>
       <?php
           if(isset($_GET["err"])){
             switch (intval($_GET["err"])) {
               case '-5':
                 echo '<font color="#dd2c17" size="2">
                    username should have 3-25 characters
                 </font>';
                 break;
             }
           }
        ?>

       <input type="email" id="inputEmail" name="email1" class="form-control" placeholder="Email address" required>

       <input type="email" id="inputEmail2" name="email2" class="form-control" placeholder="Re-enter Email address" required>
       <?php
           if(isset($_GET["err"])){
             switch (intval($_GET["err"])) {
               case '-6':
                 echo '<font color="#dd2c17" size="2">
                 Invalid email
                 </font>';
                 break;
                case '-7':
                  echo '<font color="#dd2c17" size="2">
                   Email addresses not equal
                  </font>';
                break;
             }
           }
        ?>
       <hr/>

       <input type="password" id="inputPassword" name="pwd1" class="form-control" placeholder="Password" required>

       <input type="password" id="inputPassword2" name="pwd2" class="form-control" placeholder="Re-enter Password" required>
       <?php
           if(isset($_GET["err"])){
             switch (intval($_GET["err"])) {
               case '-8':
                 echo '<font color="#dd2c17" size="2">
                 Please put your password
                 </font>';
                 break;

                case '-9':
                   echo '<font color="#dd2c17" size="2">
                   Passwords not equal
                   </font>';
                   break;
             }
           }
        ?>

       <div class="checkbox mb-3">
         <label>
           <input type="checkbox" name="tos"> I agree to Terms of service
           <br/>
           <input type="checkbox" name="privacy"> I agree to privacy policy
         </label>
         <?php
             if(isset($_GET["err"])){
               switch (intval($_GET["err"])) {
                 case '-10':
                   echo '<font color="#dd2c17" size="2">
                      Pleace accept our terms!
                   </font>';
                   break;
               }
             }
          ?>
       </div>
       <button class="btn btn-lg btn-success btn-block" type="submit">Signup</button>
       <a href="user.php?action=login">Do you want to login instead?</a>
     </form>
