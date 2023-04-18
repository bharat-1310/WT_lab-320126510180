<?php
$host='localhost';
$conn=mysqli_connect($host,'root','','exp2');
if (!$conn){
    die('Connection failed:'.mysqli_connect_error());
}
$firstname=$_POST["nm"];
$lastname=$_POST["un"];
$emailid=$_POST["em"];
$password= $_POST["pwd"];
$dob= $_POST["dob"];
$gender=$_POST["gn"];
if(isset($_FILES['photo']) && !empty($_FILES['photo'])){
    $photo = $_FILES['photo'];
    // your code here
 }else{
    echo "Please select a photo.";
    header("Location:register.html");
 }
$photo_name = $photo['name'];
$photo_temp = $photo['tmp_name'];
$photo_error = $photo['error'];
$photo_size = $photo['size'];

if($photo_error === UPLOAD_ERR_OK){
   $photo_ext = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));
   $photo_new_name = uniqid() . '.' . $photo_ext;
   $photo_dest = 'uploads/' . $photo_new_name;

   if(!is_dir('uploads')){
      mkdir('uploads');
   }

   if(move_uploaded_file($photo_temp, $photo_dest)){
      // your code here
   }else{
      echo "Error moving photo.";
   }
}else{
   echo "Error uploading photo.";
}

	// Validate form data
	if ($photo_error != UPLOAD_ERR_OK) {
		die('Error uploading photo');
	}
	if ($photo_size > 1000000) {
		die('Photo must be less than 1 MB');
	}

	// Move photo to server
	$photo_ext = pathinfo($photo_name, PATHINFO_EXTENSION);
	$photo_filename = uniqid() . '.' . $photo_ext;
	$photo_path = 'uploads/' . $photo_filename;
	if (!move_uploaded_file($photo_temp, $photo_path)) {
		die('Error moving photo');
	}

$sql="INSERT INTO users(Name,User name,Email,Password,DOB,Gender,image) VALUES('$firstname','$lastname','$emailid','$password','$dob','$gender','$photo_filename')";
if(mysqli_query($conn,$sql))
{
    header('Location:login.html');}
else{
    echo'Error ading record to table:'.mysqli_error($conn);
}
mysqli_close($conn);
?>