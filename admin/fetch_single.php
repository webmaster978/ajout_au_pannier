<?php
include('config/database.php');
include('function.php');
if (isset($_POST["user_id"])) {
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_product 
		WHERE id = '" . $_POST["id"] . "' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach ($result as $row) {
		$output["name"] = $row["name"];
		$output["price"] = $row["price"];
		if ($row["image"] != '') {
			$output['image'] = '<img src="../images/' . $row["image"] . '" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="' . $row["image"] . '" />';
		} else {
			$output['image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}