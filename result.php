<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Finley Smith - finleys.tk">
    <link rel="shortcut icon" href="favicon.ico">

    <title>Quiz Results</title>

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
      <div class="jumbotron">
        <h1>Results</h1>        
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
          header('Location: index.html'); 
        } 
        $userData = mysqli_fetch_array($result, MYSQL_ASSOC); 
        if($password != $userData['password']) // Incorrect password. So, redirect to login_form again.
        {
          header('Location: index.html');
        }else{            
            $outof = 0;
            $correct = 0;
            //$a1 = $_POST['1'];
            //$a2 = $_POST['2'];
            //$a3 = $_POST['3'];
            //$a4 = $_POST['4'];
            //$a5 = $_POST['5'];
            //$a6 = $_POST['6'];
            //$a7 = $_POST['7'];
            //$a8 = $_POST['8'];
            //$a9 = $_POST['9'];
            //$a10 = $_POST['10'];
            //$a11 = $_POST['11'];
            //$a12 = $_POST['12'];
            //$a13 = $_POST['13'];
            //$a14 = $_POST['14'];
            //$a15 = $_POST['15'];
            //$a16 = $_POST['16'];
            //$a17 = $_POST['17'];
            //$a18 = $_POST['18'];
            //$a19 = $_POST['19'];
            if(isset($_POST['1'])){
                $a1 = $_POST['1'];
                $outof = $outof + 1;
            }
            if(isset($_POST['2'])){
                $a2 = $_POST['2'];
                $outof = $outof + 1;
            }
            if(isset($_POST['3'])){
                $a3 = $_POST['3'];
                $outof = $outof + 1;
            }
            if(isset($_POST['4'])){
                $a4 = $_POST['4'];
                $outof = $outof + 1;
            }
            if(isset($_POST['5'])){
                $a5 = $_POST['5'];
                $outof = $outof + 1;
            }
            if(isset($_POST['6'])){
                $a6 = $_POST['6'];
                $outof = $outof + 1;
            }
            if(isset($_POST['7'])){
                $a7 = $_POST['7'];
                $outof = $outof + 1;
            }
            if(isset($_POST['8'])){
                $a8 = $_POST['8'];
                $outof = $outof + 1;
            }
            if(isset($_POST['9'])){
                $a9 = $_POST['9'];
                $outof = $outof + 1;
            }
            if(isset($_POST['10'])){
                $a10 = $_POST['10'];
                $outof = $outof + 1;
            }
            if(isset($_POST['11'])){
                $a11 = $_POST['11'];
                $outof = $outof + 1;
            }
            if(isset($_POST['12'])){
                $a12 = $_POST['12'];
                $outof = $outof + 1;
            }
            if(isset($_POST['13'])){
                $a13 = $_POST['13'];
                $outof = $outof + 1;
            }
            if(isset($_POST['14'])){
                $a14 = $_POST['14'];
                $outof = $outof + 1;
            }
            if(isset($_POST['15'])){
                $a15 = $_POST['15'];
                $outof = $outof + 1;
            }
            if(isset($_POST['16'])){
                $a16 = $_POST['16'];
                $outof = $outof + 1;
            }
            if(isset($_POST['17'])){
                $a17 = $_POST['17'];
                $outof = $outof + 1;
            }
            if(isset($_POST['18'])){
                $a18 = $_POST['18'];
                $outof = $outof + 1;
            }
            if(isset($_POST['19'])){
                $a19 = $_POST['19'];
                $outof = $outof + 1;
            }            
            if($a1 == 1){
                $correct = $correct + 1;
            }
            if($a2 == 1){
                $correct = $correct + 1;
            }
            if($a3 == 1){
                $correct = $correct + 1;
            }
            if($a4 == 1){
                $correct = $correct + 1;
            }
            if($a5 == 1){
                $correct = $correct + 1;
            }
            if($a6 == 1){
                $correct = $correct + 1;
            }
            if($a7 == 1){
                $correct = $correct + 1;
            }
            if($a8 == 1){
                $correct = $correct + 1;
            }
            if($a9 == 1){
                $correct = $correct + 1;
            }
            if($a10 == 1){
                $correct = $correct + 1;
            }
            if($a11 == 1){
                $correct = $correct + 1;
            }
            if($a11 == 1){
                $correct = $correct + 1;
            }
            if($a12 == 1){
                $correct = $correct + 1;
            }
            if($a13 == 1){
                $correct = $correct + 1;
            }
            if($a14 == 1){
                $correct = $correct + 1;
            }
            if($a15 == 1){
                $correct = $correct + 1;
            }
            if($a16 == 1){
                $correct = $correct + 1;
            }
            if($a17 == 1){
                $correct = $correct + 1;
            }
            if($a18 == 1){
                $correct = $correct + 1;
            }
            if($a19 == 1){
                $correct = $correct + 1;
            }
            if($timer == 0){
                echo('<p>You got ' . $correct . " out of " . $outof . "</p>");
            } else{
                echo('<p>You got ' . $correct . " out of " . $outof .  " with a time bonus of " . $timer . "</p>" );
            }
            
            $score = $correct * 10;
            $score = $score + $timer;
            echo("<p>Score: " . $score . '</p>');
            $query = "SELECT *
                  FROM login
                  WHERE user = '$username';"; 
            $result = mysqli_query($conn, $query);
            $userData = mysqli_fetch_array($result, MYSQL_ASSOC);
            $best = $userData['bestscore'];
            $plays = $userData['plays'] + 1;
            $totalscore = $userData['totalscore'] + $score;
            $average = $totalscore / $plays;
            echo('<p>Total score (all goes combined): ' . $totalscore . '</p>');
            echo('<p>Average score: ' . round($average) . '</p>');


            if($best < $score){
            echo('<p><b>New high score added to Leaderboard<b></p>');
            echo('<form method="post" action="leaderboard.php">');
            echo('<input type="hidden" name="user" value="');
            echo($username);
            echo('">');
            echo('<input type="hidden" name="password" value="');
            echo($password);
            echo('">');
            echo('<button type="submit" class="btn btn-success" id="submit">Leaderboard</button>');
            echo('</form>');
            }else{
                echo('<p>You did not beat your highscore of ' . $best . '</p>');
            }
            $query = "UPDATE login SET bestscore='$score' WHERE user='$username';";
            $result = mysqli_query($conn, $query);
            $query = "UPDATE login SET plays='$plays' WHERE user='$username';";
            $result = mysqli_query($conn, $query);
            $query = "UPDATE login SET totalscore='$totalscore' WHERE user='$username';";
            $result = mysqli_query($conn, $query);
            





        }







        ?>        
      </div>
      

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>