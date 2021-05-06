<?php
include('config/database.php');
include('function.php');
if (isset($_POST["operation"])) {
	if ($_POST["operation"] == "Add") {
		$image = '';
		if ($_FILES["image"]["name"] != '') {
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO tbl_product (name, price, image) 
			VALUES (:name, :price, :image)
		");
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["name"],
				':price'	=>	$_POST["price"],
				':image'		=>	$image
			)
		);
		if (!empty($result)) {
			echo 'Donnes inserer avec succes';
		}
	}
	if ($_POST["operation"] == "Edit") {
		$image = '';
		if ($_FILES["user_image"]["name"] != '') {
			$image = upload_image();
		} else {
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE tbl_product 
			SET name = :name, price = :price, image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["name"],
				':price'	=>	$_POST["price"],
				':image'		=>	$image,
				':id'			=>	$_POST["user_id"]
			)
		);
		if (!empty($result)) {
			echo 'Modification avec succes';
		}
	}
}