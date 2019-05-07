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




<script>

function chango(id) {
    var conf = confirm("Are you sure, do you really want to update status?");

    if (conf == true) {
        $.post("chango.php", {
                id: id
            },
            function (data, status) {
                
        
                // reload Users by using readRecords();
            location.reload();
            }
        );
    }
}


</script>


<?php while($row = $street->fetch_assoc() ): ?>

    <h3><?php echo $row['title']; ?></h3>
	<p><?php echo $row['body']; ?></p>

<?php endwhile; ?>
<br>

<br>
<table class="table table-bordered"  >
<thead>
	<tr>	
		<th>Tool</th>
		<th>Qty</th>
        <th>Status</th>

		<th>Action</th>
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

    <td><button onclick="chango('<?php echo $row['tid']; ?>')" class="btn btn-danger">Action</button></td>

			</tr>

<?php endwhile; ?>

</tbody>
</table>

</div>



<?php include 'includes/footer.php'; ?>
