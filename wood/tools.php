<?php
include('session.php');
?>

<?php include 'includes/header.php'; ?>

<?php
	$id = $_GET['id'];
	//Create DB Object
	$db = new Database();
	
        //Create Query
        $skuah = "SELECT * FROM tools,status where (tfk = '$id')and (tools.tstat = status.rid)";
        //Run Query
        $toolss = $db->select($skuah);
		

		
		
		
		  //Create Query
        $nano = "SELECT * FROM posts where id = '$id' ";

		//Run Query
		$street = $db->select($nano);
		
		

?>






<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
<a class="btn btn-outline-success" href="edit_post.php?id=<?php echo $id; ?>" role="button">Edit/View Order Details </a>
  </form>
</nav>
<br>
<?php while($row = $street->fetch_assoc() ): ?>

    <h3><?php echo $row['title']; ?></h3>

<?php endwhile; ?>


<!-- Content Section -->
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="pull-right">
<button class="btn btn-primary" data-toggle="modal" data-target="#add_new_record_modal">Add New Record</button>
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
function addRecord() {
    
    // get values
    var tool_name = $("#tool_name").val();
    var link_name = $("#link_name").val();
    var qty = $("#qty").val();
    var stat = $("#stat").val();
    var tfk = $("#tfk").val();
    
var full_url = document.URL; // Get current url
var url_array = full_url.split('=') // Split the string into an array with / as separator
var last_segment = url_array[url_array.length-1];  // Get the last part of the array (-1)

    // Add record
    $.post("addRecord.php", {
        tool_name: tool_name,
        link_name: link_name,
        stat: stat,
        qty: qty,
        last_segment: last_segment
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

  
   // clear fields from the popup
        $("#tool_name").val("");
        $("#link_name").val("");
        $("#qty").val("");
         $("#stat").val("");
 
    location.reload();

    });
}


function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");

    if (conf == true) {
        $.post("deleteUser.php", {
                id: id
            },
            function (data, status) {
                
        
                // reload Users by using readRecords();
            location.reload();
            }
        );
    }
}


function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("Reader.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data

            var user = JSON.parse(data);

            // Assing existing values to the modal popup fields
            $("#update_tool_name").val(user.tname);
            $("#update_link_name").val(user.tlink);
            $("#update_qty").val(user.tqty);
            $("#update_stat").val(user.tstat);
        }
    );
    // Open modal popup
    $("#updateusermodal").modal("show");
}


function UpdateUserDetails() {
    // get values
    var up_tool_name = $("#update_tool_name").val();
    var up_link_name = $("#update_link_name").val();
    var up_qty = $("#update_qty").val();
    var up_stat = $("#update_stat").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("updateUserDetails.php", {
            id: id,
            up_tool_name: up_tool_name,
            up_link_name: up_link_name,
            up_qty: up_qty,
            up_stat: up_stat
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
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
		<th>Tool</th>
		<th>Qty</th>
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


<?php

//Below is what causes the colors to change on the rows
$availableqty=$row['tstat'];

if ($availableqty == 1) {
echo '<tr class="record" bgcolor="#27AE60" style="color: white;">';
}


else {
echo '<tr class="record">';
}

?>			

	<td><a href="<?php echo $row['tlink']; ?>"target="_blank"><?php echo $row['tname']; ?></a></td>
    <td><?php echo $row['tqty']; ?></td>
    <td><?php echo $row['namestat']; ?></td>
	<td><button onclick="GetUserDetails('<?php echo $row['tid']; ?>')" class="btn btn-warning">Update</button></td> 
    <td><button onclick="DeleteUser('<?php echo $row['tid']; ?>')" class="btn btn-danger">Delete</button></td>

			</tr>

<?php endwhile; ?>

</tbody>
</table>

</div>



<?php include 'includes/footer.php'; ?>
