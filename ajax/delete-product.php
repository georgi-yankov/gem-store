<?php 

require '../includes/connection.php';

if(isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "DELETE FROM `products` WHERE `id`='$id'";

	$result = mysqli_query($connection, $sql);
}