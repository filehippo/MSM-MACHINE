
<?php include 'includes/header.php'; ?>


<?php

	//Create DB Object
	$db = new Database();

       $upid = mysqli_real_escape_string($db->link, $_POST['id']);
       $upname = mysqli_real_escape_string($db->link, $_POST['up_tool_name']);
       $uplink = mysqli_real_escape_string($db->link, $_POST['up_link_name']);
       $upqty = mysqli_real_escape_string($db->link, $_POST['up_qty']);
       $upstat = mysqli_real_escape_string($db->link, $_POST['up_stat']);



		$query = "UPDATE tools SET tname = '$upname', tlink = '$uplink', tqty = '$upqty', tstat = '$upstat' WHERE tid = '$upid' ";
		
		
		$update_tool = $db->updato($query);
	
?>