<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="festhub";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{	
	 $fname = $_POST['fname'];
	 $lname = $_POST['lname'];
	 $dob = $_POST['dob'];
	 $gender = $_POST['gender'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $country = $_POST['country'];

	 $sql_query = "INSERT INTO users (fname,lname,dob,gender,email,phone,country)
	 VALUES ('$fname','$lname','$dob','$gender','$email','$phone','$country')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
	 	echo '<script>alert("Registration Successfull")</script>';
	 	header('Location: http://localhost/FestHubWT/index.php');
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>