
<?php //include '../dashHeader.php';
include 'phpDocs/dashboard/dashHeader.php';

include 'phpDocs/dashboard/classes/myprofile.php';

      ?>

      <div class="container">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-10" style="border-style: solid;border-color: #00ff99;padding:30px;background-color:white;">
            <h3>My profile settings:</h3>
            <!-- FORM 1 -->
                <form class="" action="phpDocs/validation/validation_settingsPage.php" method="POST">
                  <input type="hidden"  name="a0" value="1">
                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="validationDefault01">First name</label>
                      <input type="text" class="form-control" name="fName" placeholder="First name"
                          <?php //php start---------------------------------------------------
                          $object = new MyProfile();
                          $niz=$object->getFname($_SESSION['user_basic_id']);
                          if(!is_null($object)){
                            echo 'value="'.$niz[0]['firstName'].'"';
                          }

                           //php end--------------------------------------------------- ?>
                        required>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="validationDefault02">Last name</label>
                      <input type="text" class="form-control" name="lName" placeholder="Last name"
                          <?php //php start---------------------------------------------------
                          $object = new MyProfile();
                          $niz=$object->getLname($_SESSION['user_basic_id']);
                          if(!is_null($object)){
                            echo 'value="'.$niz[0]['lastName'].'"';
                          }

                           //php end--------------------------------------------------- ?>
                       required>
                    </div>
                    <div class="col-md-4 mb-3">
                    <button class="btn btn-primary" type="submit" style="margin-top:29px;">Submit</button>
                    </div>
                </form>
                <?php
                  if(isset($_GET['action']) && $_GET['action']=='succ1'){
                    echo '
                    <div class="alert alert-dismissible alert-success" style="width:100%;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <h4 class="alert-heading">Successful!</h4>
                        <p class="mb-0">UPDATED: your first name and last name </p>
                      </div>';
                  }

                 ?>
                <hr/>
                <!-- Form 2-->
                <form action="phpDocs/validation/validation_settingsPage.php" method="POST">
                  <input type="hidden"  name="a0" value="2">
                  <label for="aboutme">About me</label><br/>
                  <div class="form-row">

                    <textarea name="txtAbout" rows="8" cols="80" placeholder="About me"><?php //php start---------------------------------------------------
                      $object = new MyProfile();
                      $niz=$object->getAboutme($_SESSION['user_basic_id']);
                      if(!is_null($object)){
                        echo $niz[0]['aboutMe'];
                      }
                       //php end--------------------------------------------------- ?></textarea>
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>

                </form>
                <?php
                  if(isset($_GET['action']) && $_GET['action']=='succ2'){
                    echo '
                    <div class="alert alert-dismissible alert-success" style="width:100%;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <h4 class="alert-heading">Successful!</h4>
                        <p class="mb-0">UPDATED: your About Me information </p>
                      </div>';
                  }

                 ?>
            <!-- -->
        </div>
          <div class="col-lg-1"></div>
        </div> <!-- end row-->
      </div> <!-- end container-->
