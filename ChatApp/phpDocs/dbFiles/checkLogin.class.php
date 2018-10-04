<?php
/*
*   checkLogin
*       generateRandomString($lenght)
*       set_cookiee($u_id)
*       startSessionIfUserExists($var_cookie=0) // ukoliko je unos 1 poziva set_cookie
*       startSessionIfCookie()
*/

class checkLogin extends Dbh{
  //atributes--------------------------------------------------------------------
    private $firstInput;
    private $password;

    //constructor---------------------------------------------------------------
    function __construct($fi="-1",$p="-1"){
      $this->firstInput=$fi;
      $this->password=$p;
    }
    /*--------------------------------------------------------------------------
                            random string
    --------------------------------------------------------------------------*/
    public function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
  }

    /*--------------------------------------------------------------------------
                            PUT Cooike
    --------------------------------------------------------------------------*/
        public function set_cookiee($u_id){
          /*check cookie exist?
          and is it in table user_login_cookie*/
          $stmtC = $this->connect()->prepare(
                    "SELECT *
                    FROM user_login_cookie
                    WHERE user_basic_id=? ;"
                  );
          $stmtC-> execute([$u_id]);
          if($stmtC->rowCount()>0){

            while($row = $stmtC->fetch()){//change token
                  $newToken=$this->generateRandomString(20);
                    $statement1 = $this->connect()->prepare(
                      "UPDATE user_login_cookie
                      SET cookie_token =?
                      WHERE series_identifier=? AND
                      user_basic_id=?
                      ;"
                    );
                    $statement1->execute([$newToken,$row["series_identifier"],$u_id]);
                    //cookie 1
                    $cookie_name="series_identifier";
                    if(!isset($_COOKIE[$cookie_name])) {setcookie($cookie_name, "", time() - 3600);}
                    setcookie($cookie_name, $row["series_identifier"], time() + (86400 * 15), "/"); // 15days

                    //cookie 2
                    $cookie_name="cookie_token";
                    if(!isset($_COOKIE[$cookie_name])) {setcookie($cookie_name, "", time() - 3600);}
                    setcookie($cookie_name, $newToken, time() + (86400 * 15), "/"); // 15days
                }//end while

          } else{//real record in table
              $statement2 = $this->connect()->prepare(
                "INSERT INTO user_login_cookie(user_basic_id,series_identifier,cookie_token) VALUES(?,?,?)"
              );
              $a1=$this->generateRandomString(30);//series_identifier
              $a2=$this->generateRandomString(30);//cookie_token
              $statement2->execute([$u_id, $a1,$a2]);
              //PUT cookie -----------------------------------------------------
              //cookie 1
              $cookie_name = "series_identifier";
              $cookie_value = $a1;
              setcookie($cookie_name, $cookie_value, time() + (86400 * 15), "/"); // 15dana

              //cookie 2
              $cookie_name = "cookie_token";
              $cookie_value = $a2;
              setcookie($cookie_name, $cookie_value, time() + (86400 * 15), "/"); // 15dana
            }

        }
    /*--------------------------------------------------------------------------
                                startSessionIfUserExists
    --------------------------------------------------------------------------*/
    public function startSessionIfUserExists($var_cookie=0){
      $stmt = $this->connect()->prepare(
                "SELECT *
                FROM user_basic
                WHERE username=? OR email=? ;"
              );
      $stmt-> execute([$this->firstInput, $this->firstInput]);
      if($stmt->rowCount()>0){
        while($row = $stmt->fetch()){
          $u_id=$row["user_basic_id"];
          $u_email=$row["email"];
          $u_username=$row["username"];
          $u_pwd=$row["password"];

          if(password_verify($this->password, $u_pwd)){ //pwd
          session_start();
          $_SESSION["user_basic_id"] = $u_id;
          $_SESSION["email"] = $u_email;
          $_SESSION["username"] = $u_username;
          if($var_cookie==1){
            $this->set_cookiee($u_id);
          }
          header("Location: ../../dashboard.php");
          }else{
              header('Location: ../../user.php?action=login&err=-4');
          }
        }// END while
      }else{
        header('Location: ../../user.php?action=login&err=-4');
      }
    }
    /*--------------------------------------------------------------------------
                                startSessionIfCookie
    --------------------------------------------------------------------------*/
    public function startSessionIfCookie(){
      if(!(isset($_COOKIE["series_identifier"]) && isset($_COOKIE["cookie_token"]))) {
        return false;
      }
      // if exist get values in variables
      $si = $_COOKIE["series_identifier"];//series_identifier
      $cookiet = $_COOKIE["cookie_token"];//cookie_token
      ///////////////////////////////////////////////////////////////////////
      $stmtC = $this->connect()->prepare(
                /*"SELECT *
                FROM user_login_cookie
                WHERE series_identifier=? AND cookie_token=? ;"*/
                "SELECT    user_login_cookie.user_basic_id, user_login_cookie.Series_identifier, user_login_cookie.cookie_token, user_basic.username, user_basic.email
                FROM       user_login_cookie
                INNER JOIN user_basic
                ON         user_basic.user_basic_id = user_login_cookie.user_basic_id
                WHERE      series_identifier=? AND cookie_token=?;"
              );
      $stmtC-> execute([$si, $cookiet]); // get data from database if parameters exist
      if($stmtC->rowCount()>0){

        while($row = $stmtC->fetch()){//change token and create session
          //new token and new cookie--------------------------------------------
              $cookiet=$this->generateRandomString(20); // new token random
                $statement1 = $this->connect()->prepare(
                  "UPDATE user_login_cookie
                  SET cookie_token =?
                  WHERE series_identifier=? AND
                  user_basic_id=?
                  ;"
                );//end prepare
                $statement1->execute([$cookiet,$si,$row["user_basic_id"]]);

                //cookie 1
                $cookie_name="series_identifier";
                if(!isset($_COOKIE[$cookie_name])) {setcookie($cookie_name, "", time() - 3600);}
                setcookie($cookie_name, $si, time() + (86400 * 15), "/"); // 15days

                //cookie 2
                $cookie_name="cookie_token";
                if(!isset($_COOKIE[$cookie_name])) {setcookie($cookie_name, "", time() - 3600);}
                setcookie($cookie_name, $cookiet, time() + (86400 * 15), "/"); // 15days

                //PUT $_SESSION----------------------------------------------------------------------------------
                session_start();
                $_SESSION["user_basic_id"]  = $row["user_basic_id"];
                $_SESSION["email"]          = $row["email"];
                $_SESSION["username"]       = $row["username"];

                return true;
            } //end while
          } // end if ->rowCount
          else{
            return false;
          }
      //////////////////////////////////////////////////////////////////////
    }//END startSessionIfUserExists
  }//END klase
?>
