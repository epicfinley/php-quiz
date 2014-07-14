<HTML>
<HEAD>
    <TITLE>New Score</TITLE>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    body{
        padding: 20px;
    }
    </style>
<?php
	$username = $_POST["user"];
    $password = $_POST["password"];
    $score = $_POST['score'];
	$conn = mysqli_connect('localhost', 'root', '', 'quiz');      
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
        	//$score = $_POST['score'];
        	//$query = "UPDATE login SET bestscore='$score' WHERE user='$username';";
            //$result = mysqli_query($conn, $query);
            //echo("<title>Success</title>");
            //echo("<p>Successfully added your score to leaderboard</p>");
            //echo('<form method="post" action="leaderboard.php">');
            //echo('<input type="hidden" name="user" value="');
            //echo($username);
            //echo('">');
            //echo('<input type="hidden" name="password" value="');
            //echo($password);
            //echo('">');            
            //echo('<button type="submit" class="btn btn-success" id="submit">Go to leaderboard</button>');
            //echo('</form>');
            echo("This is no longer used.");
               
            



            





        }


?>