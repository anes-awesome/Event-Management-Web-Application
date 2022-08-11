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
	<title>FestHub - Pay</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/pay.css">
</head>
<body>

<div class="container mt-5 px-5">

            <div class="mb-4">

                <h2>Confirm order and pay</h2>
            <span>please make the payment, after that you can enjoy all the features and benefits.</span>
                
            </div>

        <div class="row">

            <div class="col-md-8">
                

                <div class="card p-3">

                    <h6 class="text-uppercase">Payment details</h6>
                    <div class="inputbox mt-3"> <input type="text" name="name" class="form-control" required="required"> <span>Name on card</span> </div>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <i class="fa fa-credit-card"></i> <span>Card Number</span> 


                            </div>
                            

                        </div>

                        <div class="col-md-6">

                             <div class="d-flex flex-row">


                                 <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Expiry</span> </div>

                              <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>CVV</span> </div>
                                 

                             </div>
                            

                        </div>
                        

                    </div>



                    <div class="mt-4 mb-4">

                        <h6 class="text-uppercase">Confirm Payment</h6>

                        <form>
                            <?php 
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo "<div class='row mt-3'>";
                                echo "<div class='col-md-6'>";
                                echo "<div class='inputbox mt-3 mr-2'> <input type='text' name='fname' class='form-control' value='".$row['fname']."' readonly>  </div>";
                                echo "</div>";
                                echo "<div class='col-md-6'>";
                                echo "<div class='inputbox mt-3 mr-2'> <input type='text' name='phone' class='form-control' value='".$row['phone']."' readonly>  </div>";
                                echo "</div>";
                        }
                        ?>
                    
                        </div>

                        <?php 
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='row mt-2'>";
                                echo "<div class='col-md-6'>";
                                echo "<div class='inputbox mt-3 mr-2'> <input type='text' name='image_text' class='form-control' value='".$row['image_text']."' readonly>  </div>";
                                echo "</div>";
                                echo "<div class='col-md-6'>";
                                echo "<div class='inputbox mt-3 mr-2'> <input type='text' name='price' class='form-control' value='".$row['price']."' readonly>  </div>";
                                echo "</div>";
                        }
                        ?>
                            

                        </form>
                            

                        </div>

                    </div>

                </div>


                <div class="mt-4 mb-4 d-flex justify-content-between">


                            <a href="events.php"><span>Cancel and Go to Events Page</span></a>
                            <?php echo "<a class='btn btn-success px-3' href='ticket.php?ID={$ID}'> Pay </a>"; ?>

                        </div>

            </div>

            <div class="col-md-4">

                <div class="card card-blue p-3 color-white mb-3">
                    <img src="./img/pay.png">
                </div>
                
            </div>
            
        </div>
          

      </div>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>