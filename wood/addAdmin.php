<?php include 'includes/header.php'; ?>

<?php



	//Create DB Object
	$db = new Database();

		//Assign Vars
		$tool_name = mysqli_real_escape_string($db->link, $_POST['admin_username']);
		$link_name = mysqli_real_escape_string($db->link, $_POST['admin_password']);
        $qty = mysqli_real_escape_string($db->link, $_POST['access']);
		
		

			$query = "INSERT INTO login
					  (username, password, admin) 
				VALUES('$tool_name', '$link_name', '$qty' )";
			
			$insert_tool = $db->inserto($query);
?>














