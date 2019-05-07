<?php
include('session.php');
?>

<?php include 'includes/header.php'; ?>
<?php

	//Create DB Object
	$db = new Database();
	
	if(isset($_POST['submit'])){
		
		//Assign Vars
		$title = mysqli_real_escape_string($db->link, $_POST['title']);
		$comp = mysqli_real_escape_string($db->link, $_POST['company']);
		$body = mysqli_real_escape_string($db->link, $_POST['body']);
        $date = mysqli_real_escape_string($db->link, $_POST['date']);
		$category = mysqli_real_escape_string($db->link, $_POST['category']);

        //The Date gets flipped before being displayed 
        $newDate = date("Y-m-d", strtotime($date));

		//Simple Validation
		if($title == '' || $body == '' || $category == '' ){
		//Set Error
		$error = 'Please fill out all required fields';
		} else {
			$query = "INSERT INTO posts
					  (title, company, body, date, category) 
				VALUES('$title', '$comp', '$body', '$newDate', $category)";
			
			$insert_row = $db->insert($query);
		}
	}
?>

<?php
	//Create Query
	$query = "SELECT * FROM categories";
	//Run Query
	$categories = $db->select($query);
?>

<form role="form" method="post" action="add_post.php">
  <div class="form-group">
		<label>PO #:</label>
		<input name="title" type="text" class="form-control" placeholder="Enter PO Name">
	</div>
	<div class="form-group">
		<label>Company:</label>
			<input name="company" type="text" class="form-control" placeholder="Enter Company Name">
				</div>
				<div class="form-group">
			<label>Notes:</label>
		<textarea name="body" class="form-control" placeholder="Enter Details "></textarea>
	</div>
  <div class="form-group">
    <label>Due Date:</label>
        <div class="docs-datepicker">
          <div class="input-group">
            <input type="text" class="form-control docs-date" name="date" placeholder="Pick a date">
            <div class="input-group-append">
              <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger">
                <i class="fa fa-calendar" aria-hidden="false"></i>
              </button>
            </div>
          </div>
          <div class="docs-datepicker-container"></div>
        </div>
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
			<option <?php echo $selected; ?> value="<?php echo $row['cid']; ?>"><?php echo $row['name']; ?></option>
		<?php endwhile; ?>
	</select>
	</div>
	<div class="form-group">
	</div>
	<input name="submit" type="submit" class="btn btn-primary" value="Submit" />
	<a href="profile.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>