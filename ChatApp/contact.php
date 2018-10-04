<?php
$current_page="contact";
include_once 'phpDocs/header.php';
if(isset($_GET['action']) && $_GET['action']=='err'){
echo '<div class="alert alert-warning" role="alert">
      Message failed, please try again!
    </div>';

}

 ?>
    <a style="margin-left:50%;color:#5c00e6; border: 1px solid;" href="index.php">Homepage</a>

        <form id="contact-form" action="phpDocs/validation/validationContact.php" method="POST">
          <br/><br/>
            <p>Moje
                <label for="your-name">ime</label> je
                <input type="text" name="your-name" id="your-name" minlength="3" placeholder="(your name)" required> i</p>

            <p>my
                <label for="email">email address</label> is
                <input type="email" name="your-email" id="email" placeholder="(your email)" required>
            </p>

            <p> And
                <label for="your-message">my message</label> for you,</p>

            <p>
                <textarea name="your-message" id="your-message" placeholder="(your message)" class="expanding" required></textarea>
            </p>
            <p>
                <button type="submit">
                    <svg version="1.1" class="send-icn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="36px" viewBox="0 0 100 36" enable-background="new 0 0 100 36" xml:space="preserve">
                        <path d="M100,0L100,0 M23.8,7.1L100,0L40.9,36l-4.7-7.5L22,34.8l-4-11L0,30.5L16.4,8.7l5.4,15L23,7L23.8,7.1z M16.8,20.4l-1.5-4.3
        	l-5.1,6.7L16.8,20.4z M34.4,25.4l-8.1-13.1L25,29.6L34.4,25.4z M35.2,13.2l8.1,13.1L70,9.9L35.2,13.2z" />
                    </svg>
                    <small>send</small>
                </button>
            </p>
        </form>


<!-- JAVASCRIPT CODE-->
<script type="text/javascript" src="js/contact.js"></script>
  </body>
</html>
