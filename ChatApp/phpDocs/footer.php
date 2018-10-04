<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<script src="js/jquery.js"  type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php




if ($current_page=="mainBody_dashboard") {
 echo '<script type="text/javascript" src="js/chat.ajax.js"></script>';
}
if($current_page=="search_page"){
   echo '<script type="text/javascript" src="js/search.ajax.js"></script>';
}
 ?>
</body>
</html>
