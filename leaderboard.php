<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Finley Smith - finleys.tk">
    <link rel="shortcut icon" href="favicon.ico">

    <title>Quiz</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style type="text/css">
    body
    {
      min-height: 2000px;
      padding-top: 70px;
    }
    .answers li { 
list-style: upper-alpha; 
} 

label { 
margin-left: 0.5em; 
cursor: pointer;
font-weight: normal;
} 

#results { 
background: #dddada; 
color: 000000; 
padding: 3px; 
text-align: center; 
width: 200px; 
cursor: pointer; 
border: 1px solid gray; 
}

    #results:hover { 
        background: #3d91b8; 
        color: #ffffff; 
        padding: 3px; 
        text-align: center; 
        width: 200px; 
        cursor: pointer; 
        border: 1px solid gray; 
    } 

    #categorylist { 
        margin-top: 6px; 
        display: none; 
    } 

    #category1, #category2, #category3, #category4, #category5, #category6, #category7, #category8, #category9, #category10, #category11 { 
        display: none; 
    }

    #closing {
        display: none;
        font-style: italic;
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
    #countdown {
        margin: 0 0 10px;
        position: relative;
        display: block;
        padding-top: 15px;
        line-height: 20px;
        padding-left: 10px;
        color: #777;
    }

    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

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
            <li><?php 
            $username = $_POST["user"];
            $password = $_POST["password"]; 
            echo('<form method="post" action="main.php">');
            echo('<input type="hidden" name="user" value="');
            echo($username);
            echo('">');
            echo('<input type="hidden" name="password" value="');
            echo($password);
            echo('">');
            echo('<button type="submit" class="btn btn-link" id="quiz">Home</button>');
            echo('</form>');
            ?></li>
            <li class="active"><a href="#">Leaderboards</a></li>          
          </ul>                          
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Leaderboard</h1>
        
      </div>
      <div class="jumbotron">
        <?php
        error_reporting (E_ALL ^ E_NOTICE);
        $username = $_POST["user"];
        $password = $_POST["password"];
   
        $conn = mysqli_connect('localhost', 'root', '', 'quiz');         
        $query1 = "SELECT *
                  FROM login
                  WHERE user = '$username';"; 
        $result1 = mysqli_query($conn, $query1); 
        if(mysqli_num_rows($result1) == 0) // User not found. So, redirect to login_form again.
        {
          header('Location: index.html'); 
        } 
        $userData = mysqli_fetch_array($result1, MYSQL_ASSOC); 
        if($password != $userData['password']) // Incorrect password. So, redirect to login_form again.
        {
          header('Location: index.html');
        }else{



            $query = "SELECT * FROM login ORDER BY totalscore DESC LIMIT 10"; 
            $result = mysqli_query($conn, $query);
            echo("<h2>Total Score</h2>");
            echo('<h4 style="color: gray;">All of your scores combined.</h4>');
            echo('<table class="table table-striped">');
            $isthere = 0;
            $id = 1;
            $temp = 0;
            echo('<tr>');
            echo('<th>Position</th>');
            echo('<th>Username</th>');
            echo('<th>Total Score</th>');
            echo('</tr>');
            while($row = $result->fetch_assoc()){
                if($row['user'] == $username){
                    $isthere = 1;
                    $temp = 1;              

                }
                if($temp == 1){
                    echo('<tr style="font-weight: 400;background: rgb(192, 192, 192);">');
                    
                } else {
                    echo('<tr>');

                }                
                echo('<td>' . $id . '</td>');
                $id++;
                if($temp == 0){
                    echo('<td>' . $row['user'] . '</td>');
                } else {
                    echo('<td>' . $row['user'] . ' (You)' . '</td>');
                }
                
                echo('<td>' . $row['totalscore'] . '</td>');
                echo('</tr>');
                $temp = 0;
                               
            }

            if(!$isthere == 1){
                $query2 = "SELECT * FROM login ORDER BY totalscore DESC"; 
                $result2 = mysqli_query($conn, $query2);
                $id = 1;
                $pos = 0;
                while($row = $result2->fetch_assoc()){                    
                    if($row['user'] = $username){                        
                        $pos = $id;
                        $score1 = $row['totalscore'];                    
                    }           
                    $id++; 
                }

                echo('<tr style="font-weight: 400;background: rgb(192, 192, 192);">');
                echo('<td>' . $pos . '</td>');
                echo('<td>' . $username . ' (You)' . '</td>');
                echo('<td>' . $score1 . '</td>');
                echo('</tr>');
            }
            echo('</table>');


            $query = "SELECT user, password, plays, totalscore, totalscore / plays AS average FROM login ORDER BY average DESC LIMIT 10"; 
            $result = mysqli_query($conn, $query);
            echo("<h2>Average Score</h2>");
            echo('<h4 style="color: gray;">The average of all your scores.</h4>');
            echo('<table class="table table-striped">');
            $isthere = 0;
            $id = 1;
            $temp = 0;
            echo('<tr>');
            echo('<th>Position</th>');
            echo('<th>Username</th>');
            echo('<th>Average Score</th>');
            echo('</tr>');
            while($row = $result->fetch_assoc()){
                if($row['user'] == $username){
                    $isthere = 1;
                    $temp = 1;              

                }
                if($temp == 1){
                    echo('<tr style="font-weight: 400;background: rgb(192, 192, 192);">');
                    
                } else {
                    echo('<tr>');

                }              
                echo('<td>' . $id . '</td>');
                $id++;
                if($temp == 0){
                    echo('<td>' . $row['user'] . '</td>');
                } else {
                    echo('<td>' . $row['user'] . ' (You)' . '</td>');
                }
                
                echo('<td>' . round($row['average'], 1) . '</td>');
                echo('</tr>');
                $temp = 0;
                               
            }
            $query2 = "SELECT user, password, plays, totalscore, totalscore / plays AS average FROM login ORDER BY average DESC"; 
            $result2 = mysqli_query($conn, $query2);

            if(!$isthere == 1){                
                $id = 1;
                $pos = 0;
                while($row = $result2->fetch_assoc()){                    
                    if($row['user'] == $username){                        
                        $pos = $id;
                        $score1 = round($row['average'], 1);             
                    }           
                    $id++; 
                }

                echo('<tr style="font-weight: 400;background: rgb(192, 192, 192);">');
                echo('<td>' . $pos . '</td>');
                echo('<td>' . $username . ' (You)' . '</td>');
                echo('<td>' . $score1 . '</td>');
                echo('</tr>');
            }
            echo('</table>');




            $query = "SELECT * FROM login ORDER BY bestscore DESC LIMIT 10"; 
            $result = mysqli_query($conn, $query);
            echo("<h2>Best Score</h2>");
            echo('<h4 style="color: gray;">Highest score you have achieved</h4>');
            echo('<table class="table table-striped">');
            $isthere = 0;
            $id = 1;
            $temp = 0;
            echo('<tr>');
            echo('<th>Position</th>');
            echo('<th>Username</th>');
            echo('<th>Best Score</th>');
            echo('</tr>');
            while($row = $result->fetch_assoc()){
                if($row['user'] == $username){
                    $isthere = 1;
                    $temp = 1;              

                }
                if($temp ==  0){
                    echo('<tr>');
                } else {
                    echo('<tr style="font-weight: 400;background: rgb(192, 192, 192);">');

                }
                
                echo('<td>' . $id . '</td>');
                $id++;
                if($temp == 0){
                    echo('<td>' . $row['user'] . '</td>');
                } else {
                    echo('<td>' . $row['user'] . ' (You)' . '</td>');
                }
                
                echo('<td>' . $row['bestscore'] . '</td>');
                echo('</tr>');
                $temp = 0;
                               
            }

            if(!$isthere == 1){
                $query2 = "SELECT * FROM login ORDER BY bestscore DESC"; 
                $result2 = mysqli_query($conn, $query2);
                $id = 1;
                $pos = 0;
                while($row = $result2->fetch_assoc()){                    
                    if($row['user'] = $username){                        
                        $pos = $id;
                        $score1 = $row['bestscore'];                    
                    }           
                    $id++; 
                }

                echo('<tr style="font-weight: 400;background: rgb(192, 192, 192);">');
                echo('<td>' . $pos . '</td>');
                echo('<td>' . $username . ' (You)' . '</td>');
                echo('<td>' . $score1 . '</td>');
                echo('</tr>');
            }
            echo('</table>');

























            





            

        
        }
        ?>
      </div>  

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>