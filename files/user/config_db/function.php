


<?php

function upload_image()
{
	if(isset($_FILES["photo"]))
	{
		$extension = explode('.', $_FILES['photo']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = '../CRUD1/pictures/bul/' . $new_name;
		move_uploaded_file($_FILES['photo']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($oeuvre_id)
{
	include('config/config.php');
	$statement = $db->prepare("SELECT photo FROM product WHERE id = '$oeuvre_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["photo"];
	}
}

function get_total_all_records()
{
	include('config/config.php');
	$statement = $db->prepare("SELECT * FROM product");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>