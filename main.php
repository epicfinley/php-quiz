<?php
$username = $_POST["user"];
      $password = $_POST["password"];

 
      $conn = mysqli_connect('localhost', 'root', '', 'quiz');
      
      
      
      $query = "SELECT password
                FROM login
                WHERE user = '$username';";
 
      $result = mysqli_query($conn, $query);
 
      if(mysqli_num_rows($result) == 0) // User not found. So, redirect to login_form again.
      {
        header('Location: index.html');
        echo("<h1>USER NOT FOUND</H1>");
      }
 
      $userData = mysqli_fetch_array($result, MYSQL_ASSOC);
 
      if($password != $userData['password']) // Incorrect password. So, redirect to login_form again.
      {
        header('Location: index.html');
        echo('<h1>PASSWORD Incorrect</h1>');
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

label { 
margin-left: 0.5em; 
cursor: pointer;
font-weight: normal;
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
            <li class="active"><a href="#">Home</a></li>
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
          <ul class="nav navbar-nav navbar-right">            
            <li class="active" style=" position: relative; display: block; line-height: 20px; padding-left: 10px; color: #777; background-color: #e7e7e7; padding-right: 15px; padding-bottom: 5px; "><p id="countdown"></p></li>
          </ul>                 
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Quiz</h1>
        <p>The quiz has 20 questions. You get points for answering each question, and a time bonus for. You can also get a time bonus so go!</p>
        <p>If you want to reset the time or generate new questions, just click below</p>
        <script>
        var seconds = 90;
        function secondPassed() {
            //var minutes = Math.round((seconds - 30)/60);
            var remainingSeconds = seconds; //% 60;
            if (remainingSeconds < 10) {
                remainingSeconds = "0" + remainingSeconds; 
            }
            document.getElementById('countdown').innerHTML =  remainingSeconds;
            document.getElementById("countdowny").value = remainingSeconds;
            if (seconds == 0) {
                clearInterval(countdownTimer);
                document.getElementById('countdown').innerHTML = "0";
            } else {
                seconds--;
            }
        }
         
        var countdownTimer = setInterval('secondPassed()', 1000);
        </script>
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
            echo('<button type="submit" class="btn btn-primary" id="Refresh">Refresh</button>');
            echo('</form>');
        ?>       
      </div>
      <?php
      $username = $_POST["user"];
      $password = $_POST["password"];

 
      $conn = mysqli_connect('localhost', 'root', '', 'quiz');
      
      
      
      $query = "SELECT password
                FROM login
                WHERE user = '$username';";
 
      $result = mysqli_query($conn, $query);
 
      if(mysqli_num_rows($result) == 0) // User not found. So, redirect to login_form again.
      {
        header('Location: index.html');
        echo("<h1>USER NOT FOUND</H1>");
      }
 
      $userData = mysqli_fetch_array($result, MYSQL_ASSOC);
 
      if($password != $userData['password']) // Incorrect password. So, redirect to login_form again.
      {
        header('Location: index.html');
        echo('<h1>PASSWORD Incorrect</h1>');
      }else{ // Redirect to home page after successful login.
        //secho("<p>Login Succes</p>");
        $numbers = range(1, 247);
        shuffle($numbers);
        $numberarray = array_slice($numbers, 0, 20);
        echo('<form method="post" action="result.php">');
        echo('<input type="hidden" name="user" value="');
        echo($username);
        echo('">');
        echo('<input type="hidden" name="password" value="');
        echo($password);
        echo('">');
        echo('<input type="hidden" name="timer" id="countdowny" value=""');
        $id = $numberarray[0];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="0" VALUE="0" id="0a"><label for="0a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="0" VALUE="0" id="0b"><label for="0b">' . $data['other1'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="0" VALUE="1" id="0c"><label for="0c">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="0" VALUE="0" id="0d"><label for="0d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[1];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="1" VALUE="0" id="1a"><label for="1a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="1" VALUE="0" id="1b"><label for="1b">' . $data['other1'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="1" VALUE="1" id="1c"><label for="1c">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="1" VALUE="0" id="1d"><label for="1d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[2];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="2" VALUE="0" id="2a"><label for="2a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="2" VALUE="0" id="2b"><label for="2b">' . $data['other1'] . "</label><br/>");        
        echo('<INPUT TYPE="radio" NAME="2" VALUE="0" id="2c"><label for="2c">' . $data['other2'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="2" VALUE="1" id="2d"><label for="2d">' . $data['answer'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[3];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="3" VALUE="0" id="3a"><label for="3a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="3" VALUE="0" id="3b"><label for="3b">' . $data['other1'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="3" VALUE="1" id="3c"><label for="3c">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="3" VALUE="0" id="3d"><label for="3d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[4];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="4" VALUE="1" id="4a"><label for="4a">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="4" VALUE="0" id="4b"><label for="4b">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="4" VALUE="0" id="4c"><label for="4c">' . $data['other1'] . "</label><br/>");        
        echo('<INPUT TYPE="radio" NAME="4" VALUE="0" id="4d"><label for="4d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[5];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="5" VALUE="0" id="5a"><label for="5a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="5" VALUE="0" id="5b"><label for="5b">' . $data['other1'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="5" VALUE="1" id="5c"><label for="5c">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="5" VALUE="0" id="5d"><label for="5d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[6];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="6" VALUE="0" id="6a"><label for="6a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="6" VALUE="1" id="6b"><label for="6b">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="6" VALUE="0" id="6c"><label for="6c">' . $data['other1'] . "</label><br/>");        
        echo('<INPUT TYPE="radio" NAME="6" VALUE="0" id="6d"><label for="6d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[7];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="7" VALUE="0" id="7a"><label for="7a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="7" VALUE="0" id="7b"><label for="7b">' . $data['other1'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="7" VALUE="1" id="7c"><label for="7c">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="7" VALUE="0" id="7d"><label for="7d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[8];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="8" VALUE="0" id="8a"><label for="8a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="8" VALUE="0" id="8b"><label for="8b">' . $data['other1'] . "</label><br/>");        
        echo('<INPUT TYPE="radio" NAME="8" VALUE="0" id="8c"><label for="8c">' . $data['other2'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="8" VALUE="1" id="8d"><label for="8d">' . $data['answer'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[9];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="9" VALUE="1" id="9a"><label for="9a">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="9" VALUE="0" id="9b"><label for="9b">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="9" VALUE="0" id="9c"><label for="9c">' . $data['other1'] . "</label><br/>");        
        echo('<INPUT TYPE="radio" NAME="9" VALUE="0" id="9d"><label for="9d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[10];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="10" VALUE="0" id="10a"><label for="10a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="10" VALUE="0" id="10b"><label for="10b">' . $data['other1'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="10" VALUE="1" id="10c"><label for="10c">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="10" VALUE="0" id="10d"><label for="10d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[11];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="11" VALUE="0" id="11a"><label for="11a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="11" VALUE="0" id="11b"><label for="11b">' . $data['other1'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="11" VALUE="0" id="11c"><label for="11c">' . $data['other2'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="11" VALUE="1" id="11d"><label for="11d">' . $data['answer'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[12];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="12" VALUE="0" id="12a"><label for="12a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="12" VALUE="0" id="12b"><label for="12b">' . $data['other1'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="12" VALUE="1" id="12c"><label for="12c">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="12" VALUE="0" id="12d"><label for="12d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[13];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="13" VALUE="1" id="13a"><label for="13a">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="13" VALUE="0" id="13b"><label for="13b">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="13" VALUE="0" id="13c"><label for="13c">' . $data['other1'] . "</label><br/>");        
        echo('<INPUT TYPE="radio" NAME="13" VALUE="0" id="13d"><label for="13d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');
        $id = $numberarray[14];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="14" VALUE="0" id="14a"><label for="14a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="14" VALUE="1" id="14c"><label for="14c">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="14" VALUE="0" id="14b"><label for="14b">' . $data['other1'] . "</label><br/>");        
        echo('<INPUT TYPE="radio" NAME="19" VALUE="0" id="14d"><label for="14d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[15];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="15" VALUE="0" id="15a"><label for="15a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="15" VALUE="0" id="15b"><label for="15b">' . $data['other1'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="15" VALUE="1" id="15c"><label for="15c">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="15" VALUE="0" id="15d"><label for="15d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[16];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="16" VALUE="0" id="16a"><label for="16a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="16" VALUE="0" id="16b"><label for="16b">' . $data['other1'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="16" VALUE="1" id="16c"><label for="16c">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="16" VALUE="0" id="16d"><label for="16d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[17];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="17" VALUE="0" id="17a"><label for="17a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="17" VALUE="0" id="17b"><label for="17b">' . $data['other1'] . "</label><br/>");        
        echo('<INPUT TYPE="radio" NAME="17" VALUE="0" id="17c"><label for="17c">' . $data['other2'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="17" VALUE="1" id="17d"><label for="17d">' . $data['answer'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[18];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="18" VALUE="1" id="18a"><label for="18a">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="18" VALUE="0" id="18b"><label for="18b">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="18" VALUE="0" id="18c"><label for="18c">' . $data['other1'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="18" VALUE="0" id="18d"><label for="18d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        $id = $numberarray[19];
        $query = "SELECT question, answer, other1, other3, other2
                  FROM questions
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result, MYSQL_ASSOC);
        echo('<h4>');
        echo($data['question']);
        echo("</h4>");
        //echo($id);
        echo('<ul class="answers">');
        echo('<INPUT TYPE="radio" NAME="19" VALUE="0" id="19a"><label for="19a">' . $data['other3'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="19" VALUE="0" id="19b"><label for="19b">' . $data['other1'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="19" VALUE="1" id="19c"><label for="19c">' . $data['answer'] . "</label><br/>");
        echo('<INPUT TYPE="radio" NAME="19" VALUE="0" id="19d"><label for="19d">' . $data['other2'] . "</label><br/>");
        echo('</ul>');

        echo('<button type="submit" class="btn btn-success" id="submit">Submit</button>');
        echo('<button type="reset" class="btn btn-link">Reset</button>');
        echo('</form>');
        echo("<br><br><br>");
        

      }



      ?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>