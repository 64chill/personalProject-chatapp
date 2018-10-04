<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
     <link rel="stylesheet" href="css\bootstrap.css"/>
     <?php
         if($current_page=="index"){//user------------------------------------------------
           echo '
           <link href="css/bootstrap.css" rel="stylesheet">
           <link href="css/the-big-picture.css" rel="stylesheet">';
         }

          if($current_page=="user"){//user------------------------------------------------
            echo '<link rel="stylesheet" href="css/login.css"/>';
          }

          if($current_page=="dashboard"){//dashboard//////////////////////////////////////
            echo '<link rel="stylesheet" href="css/dashboard.css"/>';
          }

          if($current_page=="contact"){
            echo '<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="css/contact.css" type="text/css">';
          }
      ?>
    <meta charset="utf-8">

    <title><?php echo $current_page;?></title>

  </head>
  <body>
