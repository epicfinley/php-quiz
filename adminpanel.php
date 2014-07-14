
<?php
        error_reporting (E_ALL ^ E_NOTICE);
        $username = $_POST["user"];
        $password = $_POST["password"];
        $timer = $_POST['timer'];     
        $conn = mysqli_connect('localhost', 'root', '', 'quiz');         
        $query = "SELECT password
                  FROM login
                  WHERE user = '$username';"; 
        $result = mysqli_query($conn, $query); 
        if(mysqli_num_rows($result) == 0) // User not found. So, redirect to login_form again.
        {
          header('Location: adminlogin.html'); 
        } 
        $userData = mysqli_fetch_array($result, MYSQL_ASSOC); 
        if($password != $userData['password']) // Incorrect password. So, redirect to login_form again.
        {
          header('Location: adminlogin.html');
        }else{
            if($username=='Finley'){
                
            } else {
                echo("is not finley");
                if($username=='Mr Phillips'){
                    echo("Is not Phillips");
                    
                    
                } else{
                    header('Location: adminlogin.html');
                }
            }
        }
        ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Finley Smith - finleys.tk">
    <link rel="shortcut icon" href="favicon.ico">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style type="text/css">
    body
    {
      min-height: 2000px;
      padding-top: 70px;
    }
    #quiz {
        padding-top: 100px;  padding-bottom: 15px;    
        color: #777;
        margin-top: 5px;
        line-height: 20px;
        position: relative;  display: block;  
        padding: 10px 15px;
        text-align: -webkit-match-parent;
    }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php
    //$username = $_POST["user"];
    //$password = $_POST["password"];
    //echo('<form action="main.php" id="frm" method="post" style="display: none;">');
    //echo('<input type="text" name="password" value="' . $password .'" />');
    //echo('<input type="text" name="user" value="'. $username . '/>');
    //echo('</form>');    
    
    ?>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Quiz</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li>
            <?php 
            $username = $_POST["user"];
            $password = $_POST["password"]; 
            echo('<form method="post" action="main.php">');
            echo('<input type="hidden" name="user" value="');
            echo($username);
            echo('">');
            echo('<input type="hidden" name="password" value="');
            echo($password);
            echo('">');
            echo('<button type="submit" class="btn btn-link" id="quiz">Quiz</button>');
            echo('</form>');
            ?></li>
            <li><?php 
            $username = $_POST["user"];
            $password = $_POST["password"]; 
            echo('<form method="post" action="leaderboard.php">');
            echo('<input type="hidden" name="user" value="');
            echo($username);
            echo('">');
            echo('<input type="hidden" name="password" value="');
            echo($password);
            echo('">');
            echo('<button type="submit" class="btn btn-link" id="quiz">Leaderboard</button>');
            echo('</form>');
            ?></li>          
          </ul>                   
        </div><!--/.nav-collapse -->
      </div>
    </div>
    

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->


<form method="post" action="newuser.php" class="form-signin" role="form" id="form" style="
    max-width: 250px;
">
        <h3 class="form-signin-heading">New User</h3>
        <input type="user" id="user" name="user" class="form-control" placeholder="Username" required="" autofocus="" style="
    margin-bottom: 10px;
">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="" style="
    margin-bottom: 10px;
">        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add user</button>
</form>

      
                
          
      
      

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>