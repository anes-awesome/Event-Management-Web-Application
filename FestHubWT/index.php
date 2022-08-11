<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "festhub");

  // Initialize message variable
  $msg = "";

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
  $result = mysqli_query($db, "SELECT * FROM events ORDER BY image_id LIMIT 1");
  $result1 = mysqli_query($db,"SELECT * FROM users ORDER BY user_id DESC LIMIT 1");
?>

<html>
  <head>
    <title>FestHub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/main.css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="parallax__group hero-container">
        <div class="parallax__layer sky"></div>
        <div class="parallax__layer bushes"></div>
        <div class="parallax__layer water"></div>
        <div class="parallax__layer people1"></div>
        <div class="parallax__layer people2"></div>
        <div class="parallax__layer people3"></div>
        <div class="parallax__layer hero-text">
          <h2>FestHub</h2>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="events.php">Events/Concerts</a></li>
            <li><a href="admin.html" target="blank">Admin Login</a></li>
            <?php while ($row = mysqli_fetch_array($result1)) {
                    echo "<li><a href='#'' class='btn'>Welcome : ".$row['fname']."</a></li>";
              } 
            ?>
          </ul>
          <div class="hero__text">
            <h1>Lets Celeberate with Us!</h1>
          </div>
        </div>
      </div>
      <div class="parallax__group info-container">
        <img src="./img/concert.jpg" alt="Lively and colourful concert" />
        <div class="text-container">
          <h2>Plan your Events form FestHub</h2>
          <p>If you are new to our site click to Register...</p>
          <br>
          <a href="events.php" class="btn">Lets Create your Event</a>
        </div>
      </div>
    </div>

  </body>
</html>
