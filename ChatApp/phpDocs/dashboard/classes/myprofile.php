<?php

/**
 * Class MyProfile
 *    setFLname   ($u_id, $f_name, $l_name)
 *    setAboutme  ($u_id, $about_me)
 *    getFname    ($u_id)  return rows
 *    getLname    ($u_id)  return rows
 *    getAboutme  ($u_id)  return rows
 *    getUsername ($u_id)  return rows
 */
class MyProfile extends Core{

//puni bazu---------------------------------------------------------------------
    public function setFLname($u_id, $f_name, $l_name){ //ADD name, surnmae to table for user
        $this->query('
        UPDATE user_basic
        SET firstName ="'.$f_name.'" , lastName ="'.$l_name.'"
        WHERE user_basic_id='.$u_id.';
        ');
    }//end setFLname

    public function setAboutme($u_id, $about_me){ //ADD to about me
      $this->query('
      UPDATE user_basic
      SET aboutMe ="'.$about_me.'"
      WHERE user_basic_id='.$u_id.';
      ');
  }//edn setAboutme



// iz get data------------------------------------------------------------------
    public function getFname($u_id){//getFname----------------------------------
      $this->query("
      SELECT firstName
      FROM user_basic
      WHERE user_basic_id=".$u_id.";"
  );
     return $this->getRows();
   }//end getFname

    public function getLname($u_id){//getLname----------------------------------
      $this->query("
      SELECT lastName
      FROM user_basic
      WHERE user_basic_id=".$u_id.";
    "
  );
     return $this->getRows();
  }// end getlname

    public function getAboutme($u_id){//getAboutme------------------------------
      $this->query("
      SELECT aboutMe
      FROM user_basic
      WHERE user_basic_id=".$u_id.";
      "
      );
      return $this->getRows();

    }//end getAboutme

    public function getUsername($u_id){
      $this->query("
      SELECT username
      FROM user_basic
      WHERE user_basic_id=".$u_id.";
      "
      );
      return $this->getRows();
    }//end getIDfromUsername************************************************************************/
}//end class MyProfile
?>
