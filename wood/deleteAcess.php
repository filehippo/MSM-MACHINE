
<?php include 'includes/header.php'; ?>


<?php

	//Create DB Object
	$db = new Database();

    $rem = mysqli_real_escape_string($db->link, $_POST['id']);

		$query = "DELETE FROM login WHERE id = '$rem' ";
		$delete_tool = $db->deleto($query);
	
?>