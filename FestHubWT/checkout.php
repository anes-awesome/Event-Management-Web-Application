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
	<title>FestHub - CheckOut</title>
	<link rel="stylesheet" type="text/css" href="./css/checkout.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container rounded bg-white">
    <div class="bg row d-flex justify-content-center pb-5">
        <div class="col-sm-4 col-md-4 ml-1">
            <div class="py-4 pl-6 d-flex flex-row">
                <h5><span class="fa fa-check-square-o"></span><b>FESTHUB</b> |  </h5><span class="pl-2"> Pay</span>
            </div>
            <div class="bg-white p-5 d-flex flex-column" style="border-radius:14px;">
            	<?php
            	while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='text-center mt-4'> <img class='img-fluid' src='./img/".$row['image']."' width='400' height='400'/> </div>";
                echo "<br>";
                echo "<h5>".$row['image_text']."</h5>";
                echo "<p>".$row['image_desc']."</p>";
                echo "<h4 class='green'>".$row['price']."</h4>";
            echo "</div>";	
        echo "</div>";

        echo "<div class='col-sm-5 col-md-6 mobile'>";   
        	echo "<div class='py-4 d-flex justify-content-end'>";
            	echo "<h6><a href='events.php'>Cancel and return to website</a></h6>";
            echo "</div>";
            echo "<div class='bg-white p-3 d-flex flex-column' style='border-radius:14px'>";
            	echo "<div class='pt-2'>";
            		echo "<h5>Event Details</h5>";
            	echo "</div>";
                	echo "<div class='d-flex'>";
                		echo "<div class='col-8'>Location</div>";
                		echo "<div class='ml-auto'><b>".$row['location']."</b></div>";
                	echo "</div>";
                	echo "<div class='d-flex'>";
                		echo "<div class='col-8'>Date</div>";
                		echo "<div class='ml-auto'><b>".$row['edate']."</b></div>";
                	echo "</div>";
                	echo "<div class='d-flex'>";
                		echo "<div class='col-8'>Time</div>";
                		echo "<div class='ml-auto'><b>".$row['etime']."</b></div>";
                	echo "</div>";

                	echo "<div class='pt-2'>";
                		echo "<h5>Payment details</h5>";
                	echo "</div>";

                	echo "<div class='d-flex'>";
                		echo "<div class='col-8'>Price</div>";
                		echo "<div class='ml-auto green'>".$row['price']."</div>";
                	echo "</div>";
                	echo "<br>";
                	echo "<div class='d-flex'>";
                		echo "<div class='col-8'>Total Amount</div>";
                		echo "<div class='ml-auto green'>".$row['price']."</div>";
                	echo "</div>";
                	}
                	?>
                <div class="pt-2">
                    <div class="border-top px-4 mx-8 pt-2"></div>
                </div><br>
                <div class="d-flex flex-row">
                    <h5 class="pl-2"><span class="fa fa-check-square-o"></span><b>FESTHUB</b> | </h5><span class="pl-2">Pay</span>
                </div>
                <div class="pl-2">
                	<?php
            		while ($row = mysqli_fetch_array($result1)) {
                    echo "<div>".$row['fname']."</div>";
                    echo "<div class='pb-2'><b>".$row['phone']."</b></div>";
                	}
                	?>
                </div>
               <?php echo "<a class='btn mt-4 btn-primary btn-block' href='pay.php?ID={$ID}'> Pay </a>"; ?>
                <!-- <a class=" btn mt-4 btn-primary btn-block" style="border-radius:100px; background-color:#2447f9;" href="pay.php"> -->
                
                </a>
                <div class="text-center p-3"> <a class="text-link " href="events.php">Cancel and Go Back</a> </div>
            </div>
            <div class="bg-white mt-4 p-3 d-flex flex-column" style="border-radius:14px">
                <div class="pt-2">
                    <h5>Information!...</h5>
                </div>
                <div class="pl-2">
                    <div>If any Transaction Error or Amount Debited and not showing Paid Error Found, Contact Admin </div>
                </div>
                <div class="pt-2">
                    <h5>ANES J</h5>
                </div>
                <div class="d-flex">
                    <div class="col-8">Contact:</div>
                    <div class="ml-auto"><b>+91 1234567890</b></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>