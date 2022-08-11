<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "festhub");

  // Initialize message variable
  $msg = "";
  $ID=$_GET['ID'];

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
    $image_desc = mysqli_real_escape_string($db, $_POST['image_desc']);
    $edate = mysqli_real_escape_string($db, $_POST['edate']);
    $etime = mysqli_real_escape_string($db, $_POST['etime']);
    $location = mysqli_real_escape_string($db, $_POST['location']);
    $price = mysqli_real_escape_string($db, $_POST['price']);


    // image file directory
    $target = "./img/".basename($image);

    $sql = "INSERT INTO events (image, image_text, image_desc, edate, etime, location, price) VALUES ('$image', '$image_text', '$image_desc', '$edate', '$etime', '$location' ,'$price')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }
  $result = mysqli_query($db, "SELECT * FROM events where image_id = $ID");
  $result1 = mysqli_query($db,"SELECT * FROM users ORDER BY user_id DESC LIMIT 1");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FestHub - Pass</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<link rel="stylesheet" type="text/css" href="./css/ticket.css">
</head>
<body>
<div class="ticket">
	<div class="left">
		<?php 
		while ($row = mysqli_fetch_assoc($result)) {
		echo "<div class='image'>";	
			echo "<image src='./img/".$row['image']."' width='250' height='250'>";
		echo "</div>";
		echo "<div class='ticket-info'>";
			echo "<p class='date'><span class='june-29'>".$row['edate']."</span></p>";
			echo "<div class='show-name'><h1>".$row['image_text']."</h1><h2>Generated in FestHub</h2></div>";
			echo "<div class='time'><p>".$row['etime']."</p></div>";
			echo "<p class='location'><span>Amount Paid</span><span class='separator'><i class='far fa-smile'></i></span><span>".$row['location']."</span></p>";
		echo "</div>";
		}
		?>
	</div>
</div>
<center><h2>Your Payment Done Successfully.. Please Download the Generated Ticket</h2></center>
<center><h2><a href="events.php">Back to Events</a></h2></center>

</body>
</html>