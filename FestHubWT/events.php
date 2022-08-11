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
  $result1 = mysqli_query($db, "SELECT * FROM familyfunction");
  $result2 = mysqli_query($db, "SELECT * FROM partyconcert");
  $result3 = mysqli_query($db, "SELECT * FROM events");
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>FestHub - Events</title>
  <link rel="stylesheet" href="./css/events.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
  <script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>
  <div class="container-fluid px-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed">
        <div class="container-fluid d-flex"> <a class="navbar-brand" href="index.php"><- Home</a>
          
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Family Functions</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Parties/Live Concerts</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Create Event</a> </li>
            </ul>
        </div>
    </nav>
</div>
<div class="container-fluid mt-2 mb-5">
    <div class="products">
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="d-flex justify-content-between p-3 bg-white mb-3 align-items-center"> <span class="font-weight-bold text-uppercase">Family Functions</span>
                    <div> <input type="text" id="fname" name="fname" placeholder="Search" onkeyup="showHint(this.value)"><p>Suggestions: <p id="txtHint"></p></p> </div>
                </div>
                <div class="row g-3">
                    <!--<div class="col-md-4">
                        <div class="card"> <img src="https://i.imgur.com/SOMPPzU.jpg" class="card-img-top">
                            <div class="card-body">
                                <div class="d-flex justify-content-between"> <span class="font-weight-bold">Wood Sofa set-3</span> <span class="font-weight-bold">Rs. 550</span> </div>
                                <p class="card-text mb-1 mt-1">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="text-right buttons"> <button class="btn btn-dark">Get Ticket</button> </div>
                            </div>
                        </div>
                    </div>-->
                    <?php
                      while ($row = mysqli_fetch_array($result1)) {
                      echo "<div class='col-md-4'>";
                        echo "<div class='card'>";
                          echo "<img src='./img/".$row['image']."' class='card-img-top'>";
                          echo "<div class='card-body'>";

                            echo "<div class='d-flex justify-content-between'> <span class='font-weight-bold'>".$row['image_text']."</span> <span class='font-weight-bold'>".$row['price']."</span> </div>";

                            echo "<div class='d-flex justify-content-between'> <p class='card-text mb-1 mt-1'>".$row['image_desc']."</p> <p class='card-text mb-1 mt-1'>Time: ".$row['etime']."</p> </div>";

                            echo "<div class='d-flex justify-content-between'> <span class='font-weight-bold'>Location : ".$row['location']."</span> <span class='font-weight-bold'>Date: ".$row['edate']."</span> </div> ";
                            
                          echo "</div>";  
                          echo "<hr>";
                          echo "<div class='card-body'>";
                            echo "<div class='text-right buttons'> <a href='checkout.php?ID={$row['image_id']}'> <button class='btn btn-dark'>Get Ticket</button> </a> </div>";
                          echo "</div>";
                        echo "</div>";
                      echo "</div>";
                      }
                    ?>
                </div>
              </div>
                
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <!--Chairs-->
                <div class="d-flex justify-content-between p-3 bg-white mb-3 align-items-center"> <span class="font-weight-bold text-uppercase">Parties/Live Concerts</span>
                    <div> <input type="text" id="fname" name="fname" placeholder="Search" onkeyup="showHint(this.value)"><p>Suggestions: <span id="txtHint"></span></p> </div>
                </div>
                <div class="row g-3">
                    <!--<div class="col-md-4">
                        <div class="card"> <img src="https://i.imgur.com/2ldaKjy.jpg" class="card-img-top">
                            <div class="card-body">
                                <div class="d-flex justify-content-between"> <span class="font-weight-bold">Wodden chairs set-2</span> <span class="font-weight-bold">Rs. 1500</span> </div>
                                <p class="card-text mb-1 mt-1">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="text-right buttons"> <button class="btn btn-dark">Get Ticket</button> </div>
                            </div>
                        </div>
                    </div>-->
                    <?php
                      while ($row = mysqli_fetch_array($result2)) {
                      echo "<div class='col-md-4'>";
                        echo "<div class='card'>";
                          echo "<img src='./img/".$row['image']."' class='card-img-top'>";
                          echo "<div class='card-body'>";

                            echo "<div class='d-flex justify-content-between'> <span class='font-weight-bold'>".$row['image_text']."</span> <span class='font-weight-bold'>".$row['price']."</span> </div>";

                            echo "<div class='d-flex justify-content-between'> <p class='card-text mb-1 mt-1'>".$row['image_desc']."</p> <p class='card-text mb-1 mt-1'>Time: ".$row['etime']."</p> </div>";

                            echo "<div class='d-flex justify-content-between'> <span class='font-weight-bold'>Location : ".$row['location']."</span> <span class='font-weight-bold'>Date: ".$row['edate']."</span> </div> ";
                            
                          echo "</div>";  
                          echo "<hr>";
                          echo "<div class='card-body'>";
                            echo "<div class='text-right buttons'> <a href='checkout.php?ID={$row['image_id']}'> <button class='btn btn-dark'>Get Ticket</button> </a> </div>";
                          echo "</div>";
                        echo "</div>";
                      echo "</div>";
                      }
                    ?>
                </div>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <!--Dining-->
                <div class="d-flex justify-content-between p-3 bg-white mb-3 align-items-center"> <span class="font-weight-bold text-uppercase">Upload Your Own Event</span>
                    <div> <input type="text" id="fname" name="fname" placeholder="Search" onkeyup="showHint(this.value)"><p>Suggestions: <span id="txtHint"></span></p> </div>
                </div>
                <div class="row g-3">
                    <!--<div class="col-md-4">
                        <div class="card"> <img src="./img/test.jpg" class="card-img-top">
                            <div class="card-body">
                                <div class="d-flex justify-content-between"> <span class="font-weight-bold">Event DB Test</span> <span class="font-weight-bold">Rs. 500</span> </div>
                                <div class="d-flex justify-content-between"> <p class="card-text mb-1 mt-1">This is Test....</p> <p class="card-text mb-1 mt-1">Time : Test</p> </div>
                                <div class="d-flex justify-content-between"> <span class="font-weight-bold">Location : Test</span> <span class="font-weight-bold">Date : Test</span> </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="text-right buttons"> <button class="btn btn-dark">Get Ticket</button> </div>
                            </div>
                        </div>
                    </div>-->
                    <?php
                      while ($row = mysqli_fetch_array($result3)) {
                      echo "<div class='col-md-4'>";
                        echo "<div class='card'>";
                          echo "<img src='./img/".$row['image']."' class='card-img-top'>";
                          echo "<div class='card-body'>";

                            echo "<div class='d-flex justify-content-between'> <span class='font-weight-bold'>".$row['image_text']."</span> <span class='font-weight-bold'>".$row['price']."</span> </div>";

                            echo "<div class='d-flex justify-content-between'> <p class='card-text mb-1 mt-1'>".$row['image_desc']."</p> <p class='card-text mb-1 mt-1'>Time: ".$row['etime']."</p> </div>";

                            echo "<div class='d-flex justify-content-between'> <span class='font-weight-bold'>Location : ".$row['location']."</span> <span class='font-weight-bold'>Date: ".$row['edate']."</span> </div> ";
                            
                          echo "</div>";  
                          echo "<hr>";
                          echo "<div class='card-body'>";
                            echo "<div class='text-right buttons'> <a href='checkout.php?ID={$row['image_id']}'> <button class='btn btn-dark'>Get Ticket</button> </a> </div>";
                          echo "</div>";
                        echo "</div>";
                      echo "</div>";
                      }
                    ?>
                    

              </div>

              <br>
              <br>
              <hr>
              <br>
              <br>

              <center><span class="font-weight-bold text-uppercase">Upload Your Own Event</span></center>
              <div class="bg-white-300 px-2">
                <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                  <div class="md:flex">
                    <div class="w-full px-4 py-6 ">
                      <form method="POST" action="events.php" enctype="multipart/form-data">
                      <div class="mb-1">
                        <input type="text" name="image_text" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600" placeholder="Event Name">
                      </div>
                      <br>
                      <div class="mb-1">
                        <textarea type="text" id="text" name="image_desc" class="h-24 py-1 px-3 w-full border-2 border-blue-400 rounded focus:outline-none focus:border-blue-600 resize-none" placeholder="Event Description"></textarea>
                      </div>
                      <br>
                      <div class="mb-1">
                        <input type="date" name="edate" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600" placeholder="Event Date">
                      </div>
                      <br>
                      <div class="mb-1">
                        <input type="time" name="etime" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600" placeholder="Event time">
                      </div>
                      <br>
                      <div class="mb-1">
                        <input type="text" name="location" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600" placeholder="Event Location">
                      </div>
                      <br>
                      <div class="mb-1">
                        <input type="text" name="price" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600" placeholder="Event Price">
                      </div>
                      <br>
                      <div class="mb-1">
                        <div class="relative border-dotted h-32 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                          <div class="absolute">
                              <div class="flex flex-col items-center"> <i class="fa fa-folder-open fa-3x text-blue-700"></i> <span class="block text-gray-400 font-normal">Attach the Image of Your Event</span> 
                              </div>
                          </div> 
                          <input type="file" class="h-full w-full opacity-0" name="image">
                        </div>
                      </div>
                        <div class="mt-3 text-right">
                          <button type="submit" class="ml-2 h-10 w-32 bg-blue-600 rounded text-white hover:bg-blue-700" name="upload">Upload</button>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>

