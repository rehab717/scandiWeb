<?php

class Posts extends Dbh {

	public function getPost() {
	    $sql = "SELECT * FROM prAdd";
	    $stmt = $this->connect()->prepare($sql);
	    $stmt->execute();

	    while($result = $stmt->fetchAll()) {
	      return $result;
	    };
	  }

	public function addPost($SKU, $firstname, $theprice,$ProductType,$Size,$Height,$Width,$Length,$Weight) {
		$sql = "INSERT INTO prAdd(SKU, Name, Price,ProductType, Size, Height, Width, Length, Weight) VALUES (?,?,?,?,?,?,?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$SKU, $firstname, $theprice,$ProductType,$Size,$Height,$Width,$Length,$Weight]);
	}

	public function delPost($id) {
	    $sql = "DELETE FROM prAdd WHERE id = ? ";
	    $stmt = $this->connect()->prepare($sql);
	    $stmt->execute([$id]);
	  }

}
