<?php
include('session.php');
?>

<?php include 'includes/header.php'; ?>


<?php
	$id = $_GET['id'];

	//Create DB Object
	$db = new Database();
	//Create Query
	$query = "SELECT * FROM posts WHERE id = ".$id;
	//Run Query
	$post = $db->select($query)->fetch_assoc();
	

	//Create Query
	$query = "SELECT * FROM categories";
	//Run Query
	$categories = $db->select($query);


        //Create Query
        $skuah = "SELECT * FROM tools where (tfk = '$id')";
        //Run Query
        $posts = $db->select($skuah);

?>


<?php
	if(isset($_POST['submit'])){
		//Assign Vars
		$title = mysqli_real_escape_string($db->link, $_POST['title']);
		$company = mysqli_real_escape_string($db->link, $_POST['company']);
		$body = mysqli_real_escape_string($db->link, $_POST['body']);
                $date= mysqli_real_escape_string($db->link, $_POST['date']);
		$category = mysqli_real_escape_string($db->link, $_POST['category']);

                $rip = date("Y-m-d", strtotime($date));

		//Simple Validation
		if($title == '' || $body == '' || $category == '' ){
			//Set Error
			$error = 'Please fill out all required fields';
		} else {
			$query = "UPDATE posts 
					SET 
					title = '$title',
					company = '$company',
					body = '$body',
                    date= '$rip',
					category = '$category'
					WHERE id =".$id;

			$update_row = $db->update($query);
		}
	}
?>


<?php
	if(isset($_POST['delete'])){
		
		$query1 = "DELETE FROM tools WHERE tfk = ".$id;
		$query = "DELETE FROM posts WHERE id = ".$id;
		
		$delete_row = $db->delete($query,$query1) ;
	}
?>

<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    
    <a class="btn btn-outline-success" href="tools.php?id=<?php echo $id; ?>" role="button">Add/View Tools </a>

  </form>
</nav>

<br>


<form role="form" method="post" action="edit_post.php?id=<?php echo $id; ?>">

  <div class="form-group">
    <label>PO #:</label>
    <input name="title" type="text" class="form-control" placeholder="Enter po#" value="<?php echo $post['title']; ?>">
  </div>
  
  
    <div class="form-group">
    <label>Company</label>
    <input name="company" type="company" class="form-control" placeholder="Enter company name" value="<?php echo $post['company']; ?>">
  </div>
  
  
  
  <div class="form-group">
    <label>Notes:</label>
<textarea rows="5"name="body"class="form-control"placeholder="">
<?php echo $post['body']; ?></textarea>
  </div>
<div class="form-group">
    <label>Due Date: (mm/dd/yyyy)</label>

<?php $real = $post['date']; ?>

<?php $reverseDate = date("m/d/Y", strtotime($real)); ?>

    <input name="date" type="text" class="form-control" placeholder="Enter Due Date" value="<?php echo $reverseDate; ?>">
  </div>

  <div class="form-group">
    <label>Category:</label>
    <select name="category" class="form-control">
		<?php while($row = $categories->fetch_assoc()) : ?>
			<?php if($row['cid'] == $post['category']){
				$selected = 'selected';
			} else {
				$selected = '';
			}
			?>	
			<option value="<?php echo $row['cid']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
		<?php endwhile; ?>
	</select>
  </div>
	<input name="submit" type="submit" class="btn btn-success" value="Submit" />
	<a href="profile.php" class="btn btn-default">Cancel</a>
	<input name="delete" type="submit" class="btn btn-danger" value="Delete" />

</form>
</div>
	</div>

<?php include 'includes/footer.php'; ?>

