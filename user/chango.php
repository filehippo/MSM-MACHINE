<?php include 'includes/header.php'; ?>

<?php

	//Create DB Object
	$db = new Database();

    $rem = mysqli_real_escape_string($db->link, $_POST['id']);

    $mono = "SELECT tstat FROM tools WHERE tid = '$rem' ";
    $post = $db->select($mono)->fetch_assoc();
    $nofox= $post['tstat'];
    
	//This is the code that changes the status of the action button in the user profile
	
   if($nofox == 1)
  {
      
      $nofox = 2;
      	$query = "UPDATE tools SET tstat = '$nofox' WHERE tid = '$rem'  ";
      	$update_tool = $db->updato($query);
      
  }   

  if($nofox == 2){
        
 $nofox =1;
 	$query = "UPDATE tools SET tstat = '$nofox' WHERE tid = '$rem'  ";
 $update_tool = $db->updato($query);
  }
  

?>