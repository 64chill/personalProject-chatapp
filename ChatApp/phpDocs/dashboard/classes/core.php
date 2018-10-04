<?php

/*******************************************************************************
  OOP mysqli
  *   query ($sql)
  *   getRows
*******************************************************************************/

class Core{
  protected $db;      //connection to db
  protected $result;  //result of query
  protected $dbName;
  private $rows;      //get rows from table



  function __construct(){
    //db ----------------------------------------------------------------------
    $servername  =  'localhost';
    $dbUser      =  'root';
    $dbUserPwd   =  '';
    $dbName      =  'chatapp';

    $this->db    = new mysqli($servername,$dbUser,$dbUserPwd,$dbName);
  }

  public function query($sql){
    $this->result = $this->db->query($sql);
  }//end query

  public function getRows(){

    for ($i=1; $i <= $this->db->affected_rows ; $i++) {
          $this->rows[]=$this->result->fetch_assoc();
      }
    return $this->rows;//return array
  }//end ROWS
}



 ?>
