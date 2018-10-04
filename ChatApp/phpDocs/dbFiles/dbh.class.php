<?php
//PDO DB access
class Dbh{
	private $servername;
	private $username;
	private $password;
	private $dbname;
	private $charset;

	public function connect(){
		$this->servername	=	"localhost";
		$this->username 	=	"root";
		$this->password 	=	"";
		$this->dbname 		=	"chatapp";
		$this->charset 		=	"utf8mb4";

//---------------------------------------------------try
		try{
//data source name
		$dsn =
		"mysql:host=".$this->servername.
		";dbname=".$this->dbname.
		";charset=".$this->charset;

//PDO conn
		$pdo = new PDO($dsn, $this->username, $this->password);
//PDO exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $pdo;
//------------------------------------------------catch
		} catch(PDOException $e){
			echo "Konekcija ka bazi neuspešna ".$e->getMessage();
		//	exit();
			$file="../dbFiles/errlog.txt";

			$txt =date("Y-m-d"). " | ".
			date("h:i:sa").
			" Konekcija ka bazi neuspešna ".
			$e->getMessage()."\n";

			file_put_contents($file, $txt, FILE_APPEND | LOCK_EX) or header('Location: ../../user.php?err=-1');
			exit();

		}

	}
}

$object = new dbh;
$object->connect();

?>
