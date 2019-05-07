
<?php include 'includes/header.php'; ?>


<?php

	//Create DB Object
	$db = new Database();

       $upid = mysqli_real_escape_string($db->link, $_POST['id']);
       $upname = mysqli_real_escape_string($db->link, $_POST['up_username']);
       $uplink = mysqli_real_escape_string($db->link, $_POST['up_password']);
       $upqty = mysqli_real_escape_string($db->link, $_POST['up_access']);
    



		$query = "UPDATE login SET username = '$upname', password = '$uplink', admin = '$upqty' WHERE id = '$upid' ";
		
		
		$update_tool = $db->updato($query);
	
?>