<?php
$username = $_POST['user'];
$password = $_POST['password'];
$conn = mysqli_connect('localhost', 'root', '', 'quiz');
$query = "SELECT password
                  FROM login
                  WHERE user = '$username';"; 
$result = mysqli_query($conn, $query); 
if(!mysqli_num_rows($result) == 0) // User found. So, redirect to login_form again.
{
  header('Location: index.html'); 
}else{
	$query = "INSERT INTO login VALUES ('$username', '$password', 0, 0, 0)";
$result = mysqli_query($conn, $query);
header("Location: index1.html");
}
        

?>