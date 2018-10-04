<?php

switch (intval($_GET["err"])) {
//  case -1 --------------------------------------------------------------------
  case '-1':
    echo '<font color="white" align="center"><h1><b>
    ERORR CODE: -1			</br>
    Something went wrong, <br/>
    Please contact webmaster
    </b></h1></font>';
    exit();
    break;
// case -2 ---------------------------------------------------------------------
    case '-2':
      echo
      '<font color="white" align="center"><h1><b>
      ERROR! Invalid input of data
      </b></h1></font>';
      exit();
      break;

// case -3 ---------------------------------------------------------------------
    case '-3':
      echo
      '<font color="white" align="center"><h1><b>
      Invalid input,<br/>
      Please try again!
      </b></h1></font>';
      exit();
      break;
// reddirect to user.php------------------------------------------
    case '-4': // login.php ->
    //below all for singup
    case '-5'://username
    case '-6'://email
    case '-7'://email 1 and 2 not equal
    case '-8'://pwd
    case '-9'://pwd 1 and 2 not equal
    case '-10': // TOS/privacyPolicy

    break;
    case '-11':
      echo '<font color="white" align="center"><h1><b>
      ERROR CODE: -11 </br>
      You have to be login!
      </b></h1></font>';
      exit();
    break;


// default----------------------------------------------------------------------
    default:
    echo
    '<font color="white" align="center"><h1><b>
    ERROR CODE : -1000
    </b></h1></font>';
    exit();

}


 ?>
