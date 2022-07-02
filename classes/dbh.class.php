<?php

class Dbh
{
	private static $host = "localhost";
	private static $user = "root";
	private static $pwd = "";
	private static $dbName = "oopadd";

	public static function connect()
	{
		$dsn = 'mysql:host=' . Dbh::$host . ';dbname=' . Dbh::$dbName;
		$pdo = new PDO($dsn, Dbh::$user, Dbh::$pwd);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $pdo;
	}
}
