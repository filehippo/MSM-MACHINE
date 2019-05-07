<?php include 'config/config.php'; ?>
<?php include 'libraries/Database.php'; ?>
<?php

	//Create DB Object
	$db = new Database();
    $user_id = mysqli_real_escape_string($db->link, $_POST['id']);

    // Get User Details
    $query = "SELECT * FROM login WHERE id = '$user_id'";
    $response = array();
           $row = $db->select($query)->fetch_assoc();
            $response = $row;
    // display JSON data
    echo json_encode($response);
?>

