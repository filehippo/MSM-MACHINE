<?php include 'includes/header.php'; ?>

<?php

	$id = $_GET['id'];

	//Create DB Object
	$db = new Database();

		//Assign Vars
		$tool_name = mysqli_real_escape_string($db->link, $_POST['tool_name']);
		$link_name = mysqli_real_escape_string($db->link, $_POST['link_name']);
        $qty = mysqli_real_escape_string($db->link, $_POST['qty']);
		$stat = mysqli_real_escape_string($db->link, $_POST['stat']);
        $tfk = mysqli_real_escape_string($db->link, $_POST['last_segment']);

			$query = "INSERT INTO tools
					  (tname, tlink, tqty, tstat, tfk) 
				VALUES('$tool_name', '$link_name', '$qty', '$stat', '$tfk' )";
			
			$insert_tool = $db->inserto($query);
?>














