
  <!---  NAV BAR---->

<?php include 'dashHeader.php';
      include 'classes/chat.php';
      $current_page="mainBody_dashboard";
      ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-3"></div><?php // div col---------------------------------- ?>
      <div class="col-lg-6">
          <div class="chat">
            <div class="messages"></div>
            <br/>
            <textarea class="entry" placeholder="ENTER : Send ||  SHIFT+ENTER new row"></textarea>


          </div><!-- end chat--->
    </div>
      <div class="col-lg-3"></div><?php // div col---------------------------------- ?>
    </div> <!-- end row-->
  </div> <!-- end container-->
