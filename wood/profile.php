<?php include('session.php');?>

<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
<script src="jquery-1.7.1.min.js"></script>
<script src="jquery-1.7.1.js"></script>

<meta http-equiv="refresh" content="300">

</head>

<body>

<?php
//Create DB Object
$db = new Database;
//Create Query

$query = "SELECT * FROM posts,categories where (posts.category = categories.cid) Order By category ASC, date ASC";

//Run Query
$posts = $db->select($query);

?>
<input type="text" id="search" placeholder="Type to search">
<br>
<br>
<table id="table">

<table class="table table-bordered"  id="table" width="100%" cellspacing="0" >
<thead>
	<tr>	
		<th>PO #</th>
		<th>Company</th>
		<th>Due Date</th>
        <th>Status</th>
	</tr>
</thead>
<tbody>
    
    
    

    
    
    
<?php while($row = $posts->fetch_assoc()) : ?>

<?php

//Below is what causes the colors to change on the rows

$availableqty=$row['category'];
if ($availableqty == 1) {
    
echo '<tr class="record" id="link" bgcolor="#E74C3C" style="color: white !important;" >';
}

else if ($availableqty == 2) {
echo '<tr class="record" bgcolor="#F4D03F" style="color: black;" >';
}

else if ($availableqty == 3) {
echo '<tr class="record" bgcolor="#27AE60" style="color: white;">';
}


else {
echo '<tr class="record">';
}

?>
				
	<td><a href="tools.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
	    <td><?php echo $row['company']; ?></td>
        <td><?php echo formatDate($row['date']); ?></td>
        <td><?php echo $row['name']; ?></td>

			</tr>
		<?php endwhile; ?>
</tbody>
</table>


<div id="apixu-weather-widget-4"></div><script type='text/javascript' 
src='https://www.apixu.com/weather/widget.ashx?loc=2654587&wid=4&tu=2&div=apixu-weather-widget-4' async>
</script><noscript><a href="https://www.apixu.com/weather/q/channelview-texas-united-states-of-america-2654587" 
alt="Hour by hour Channelview, Texas, United States of America weather">10 day hour by hour Channelview, Texas, United States of America weather</a></noscript>


<script>
var $rows = $('#table tr');
$('#search').keyup(function() {
  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase().split(' ');

  $rows.hide().filter(function() {
    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
    var matchesSearch = true;
    $(val).each(function(index, value) {
      matchesSearch = (!matchesSearch) ? false : ~text.indexOf(value);
    });
    return matchesSearch;
  }).show();
});
</script>


<?php include 'includes/footer.php'; ?>	
	     