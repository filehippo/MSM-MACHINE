<?php
include('session.php');
?>

<?php include 'includes/header.php'; ?>

<?php

	$db = new Database;

        //Create Query
        $skuah = "SELECT * FROM login,rep WHERE (login.admin = rep.adp)";
        //Run Query
        $toolss = $db->select($skuah);
				
?>

<h3>User Access</h3>

<!-- Content Section -->
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="pull-right">
<button class="btn btn-primary" data-toggle="modal" data-target="#add_new_user">Add New User</button>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">

<div class="records_content"></div>
</div>
</div>
</div>
<!-- /Content Section -->


<script>

// Add Record 
function addUser() {
    
    // get values
    var admin_username = $("#admin_username").val();
    var admin_password = $("#admin_password").val();
    var access = $("#access").val();


    // Add record
    $.post("addAdmin.php", {
        admin_username: admin_username,
        admin_password: admin_password,
        access: access
       
    }, function (data, status) {
        // close the popup
        $("#add_new_user").modal("hide");

  
   // clear fields from the popup
        $("#admin_username").val("");
        $("#admin_password").val("");
        $("#access").val("");
      
 
    location.reload();

    });
}


function DeleteAccess(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");

    if (conf == true) {
        $.post("deleteAcess.php", {
                id: id
            },
            function (data, status) {
                
        
                // reload Users by using readRecords();
            location.reload();
            }
        );
    }
}


function GetUserAccess(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ReaderUser.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data

            var user = JSON.parse(data);

            // Assing existing values to the modal popup fields
            $("#update_admin_username").val(user.username);
            $("#update_admin_password").val(user.password);
            $("#update_access").val(user.admin);

        }
    );
    // Open modal popup
    $("#updateaccessmodal").modal("show");
}


function UpdateUserDetails() {
    // get values
    var up_username = $("#update_admin_username").val();
    var up_password = $("#update_admin_password").val();
    var up_access = $("#update_access").val();
  

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("updateUserAccess.php", {
            id: id,
            up_username: up_username,
            up_password: up_password,
            up_access: up_access
        
        },
        function (data, status) {
            // hide modal popup
            $("#updateaccessmodal").modal("hide");
            // reload Users by using readRecords();
            location.reload();
        }
    );
}

</script>



<br>
<table class="table table-bordered"  >
<thead>
	<tr>	
		<th>Username</th>
		<th>Password</th>
        <th>Status</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
</thead>
<tbody>


<?php
if($toolss->num_rows == 0){
    
echo "<p class='lead'><em>No records were found.</em></p>";
echo "<td class='lead'><em>n/a</em></td>";
echo "<td class='lead'><em>n/a</em></td>";
echo "<td class='lead'><em>n/a</em></td>";
echo "<td class='lead'><em>n/a</em></td>";
echo "<td class='lead'><em>n/a</em></td>";

echo "</tbody>";
echo "</table>";
echo "</div>";

include ('includes/footer.php');

}

?>


<?php while($row = $toolss->fetch_assoc() ): ?>


		

	
	<td><?php echo $row['username']; ?></td>
    <td><?php echo $row['password']; ?></td>
    <td><?php echo $row['adname']; ?></td>
	<td><button onclick="GetUserAccess('<?php echo $row['id']; ?>')" class="btn btn-warning">Update</button></td> 
    <td><button onclick="DeleteAccess('<?php echo $row['id']; ?>')" class="btn btn-danger">Delete</button></td>

			</tr>

<?php endwhile; ?>

</tbody>
</table>

</div>



<?php include 'includes/footer.php'; ?>
