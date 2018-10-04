<?php
include 'phpDocs/dashboard/dashHeader.php';
?>

<div class="container">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10" style="border-style: solid;border-color: #00ff99;padding:30px;background-color:white;">
      <h3>Check my upload:</h3>
      <i><p>Check for extension <strong>.txt</strong> </p></i>

      <form action="dashboard.php?page=uploadCheck" method="POST" enctype="multipart/form-data">
	       Fajl koji želite da prosledite: <input type="file" name="uploadFile"/><br/>
	        <input class="btn btn-primary" type="submit" name="posalji" value="Posalji"/>
      </form>
<?php
try{
			if(isset($_FILES['uploadFile'])){
				if(is_uploaded_file($_FILES['uploadFile']['tmp_name'])){//file upload
					if($_FILES['uploadFile']['type']!='text/plain'){
						 throw new Exception("Dokument mora biti tekstualni fajl!!");
					}
					else{
						echo '<br/><br/><div class="alert alert-dismissible alert-success" style="width:100%;">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4 class="alert-heading">Uspeh</h4>
                      <p class="mb-0">Prosleđeni fajl je tekstualni!</p>
                    </div>';;
					}
				}else {echo '<br/><br/><div class="alert alert-dismissible alert-info" style="width:100%;">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4 class="alert-heading">Problem!</h4>
                  <p class="mb-0">fajl nije prosleđen serveru</p>
                </div>';}

			}else{
				throw new Exception("Nije poslat nijedan fajl!");
			}
	}catch(Exception $e){
    echo '<br/><br/><div class="alert alert-dismissible alert-secondary" style="width:100%;">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4 class="alert-heading">Poruka - exception!</h4>
              <p class="mb-0">'.$e->getMessage().'</p>
            </div>';
	}
 ?>
      <!-- -->
  </div>
    <div class="col-lg-1"></div>
  </div> <!-- end row-->
</div> <!-- end container-->
