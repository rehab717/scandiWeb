 <?php

class Dbh {

	private $host = "sql102.epizy.com" ;
	private $user = "epiz_31724380" ;
	private $pwd = "QSzLKLdqqrxA" ;
	private $dbName = "epiz_31724380_oopAdd" ;

	protected function connect(){

		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
		$pdo = new PDO ($dsn, $this->user, $this->pwd);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $pdo;

	}

}
