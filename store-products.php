<?php

require 'includes/connection.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($connection, $sql);

$outp = "[";
$outp2 = "";

if (mysqli_num_rows($result) > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result)) {
		if ($outp != "[") {
			$outp .= ",";
		}

		$outp .= '{"name":"' . $row["name"] . '",';
		$outp .= '"description":"' . $row["description"] . '",';
		$outp .= '"shine":"' . $row["shine"] . '",';
		$outp .= '"price":"' . $row["price"] . '",';
		$outp .= '"rarity":"' . $row["rarity"] . '",';
		$outp .= '"color":"'. $row["color"] . '",';

		$sql2 = "SELECT images.image
		         FROM images
		         INNER JOIN products
		         ON images.product_id = products.id
		         WHERE images.product_id = '" . $row["id"] . "'";

		$result2 = mysqli_query($connection, $sql2);

		if (mysqli_num_rows($result2) > 0) {
			while($row2 = mysqli_fetch_assoc($result2)) {
				$outp2 .= '"' . $row2["image"] . '",';
			}
		}

		$outp2 = trim($outp2, ',');

		$outp .= '"images": [' . $outp2 . '],';

		$outp .= '"faces":"'. $row["faces"] . '"}';

		$outp2 = ""; // reset value
	}
} else {
	echo "0 results";
}

$outp .="]";

mysqli_close($connection);

echo($outp);