<HTML>
<HEAD>
    <TITLE>BAN USER</TITLE>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    body{
        padding: 20px;
    }
    </style>
<?php
	$username = $_POST["user"];
    $password = $_POST["password"];
    
	$ini_array = parse_ini_file("config.ini");
        $conn = mysqli_connect($ini_array['host'], $ini_array['username'], $ini_array['password'], 'quiz');      
    $query = "SELECT *
              FROM login
              WHERE user = '$username';"; 
    $result = mysqli_query($conn, $query);    
        if(mysqli_num_rows($result) == 0) // User not found. So, redirect to login_form again.
        {
          header('Location: index.html'); 
        } 
        $userData = mysqli_fetch_array($result, MYSQL_ASSOC); 
        if($password != $userData['password']) // Incorrect password. So, redirect to login_form again.
        {
          header('Location: index.html');
        }else{
            $ipAddress = $_POST["ban"];   // get the ip
        $list  = file_get_contents('banned.txt');
        $list .= $ipAddress.PHP_EOL;  
        file_put_contents('banned.txt', $list);
        	
               
            



            





        }


?>