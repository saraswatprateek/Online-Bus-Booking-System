<?php 

	if (isset($_POST['insert-bus'])) {
		
		$admin = $_POST['admin'];
		$category = $_POST['category'];
		$source = $_POST['source'];
		$destination = $_POST['destination'];
		$title = $source . " to " . $destination;
		$intermediate = $_POST['intermediate'];
		$date = $_POST['date'];
		$via_time = $_POST['via-time'];
		$bus_detail = $_POST['bus-detail'];

		$image = $_FILES['image']['name'];
		$tmp_image = $_FILES['image']['tmp_name'];

		move_uploaded_file($tmp_image, "images/$image");

		$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_source, post_destination, post_via, post_via_time, post_comment_count) VALUES({$category}, '{$title}', '{$admin}', '{$date}', '{$image}', '{$bus_detail}', '{$source}', '{$destination}', '{$intermediate}', '{$via_time}',4)";

		$bus_entry = mysqli_query($connection,$query);

		if (!$bus_entry) {
			die("Query Failed");
		}
	}

?>


<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="admin">Admin</label>
		<input type="text" class="form-control" name="admin">
	</div>

	<div class="form-group">
		<label for="category">Category</label>
		<input type="text" class="form-control" name="category">
	</div>

	<div class="form-group">
		<label for="source">Source Station</label>
		<input type="text" class="form-control" name="source">
	</div>

	<div class="form-group">
		<label for="destination">Destination Station</label>
		<input type="text" class="form-control" name="destination">
	</div>

	<div class="form-group">
		<label for="bus-date">Bus Date</label>
		<input type="text" class="form-control" name="date" placeholder="DD-MM-YY">
	</div>

	<div class="form-group">
		<label for="intermediate-station">Intermediate Stations</label>
		<input type="text" class="form-control" name="intermediate">
	</div>
	
	<div class="form-group">
		<label for="via-time">Time at which bus reaches each station</label>
		<input type="text" class="form-control" name="via-time" placeholder="All times separated by space">
	</div>

	<div class="form-group">
		<label for="bus-image">Bus Image</label>
		<input type="file" name="image" >
	</div>

	<div class="form-group">
		<label for="bus-detail">Bus Detail</label>
		<textarea class="form-control" name="bus-detail" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="insert-bus" value="Add Bus">
	</div>
</form>





