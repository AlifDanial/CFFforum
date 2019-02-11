<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap core CSS -->
<link href="../../resources/css/bootstrap.min.css" rel="stylesheet">


<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<link href="../../resources/css/specificquestionstyle.css" rel="stylesheet">

<style>
.active {
  background-color:#545b62;
}
  .card{
  border-width:1.4px;
}
.card-title{
  font-family: 'Montserrat', sans-serif;
  font-size: 23px;
  font-weight: bold;
  padding-left: 15px;
  text-align: left;
  color: rgb(0, 0, 0);
}
.card-link{
  font-family: 'Montserrat', sans-serif;
  font-size: 20px;
}
.thread-button{
  font-family: 'Montserrat', sans-serif;
}
.card-body1{
  padding-left:210px;
}
.nav-bar{
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 200px;
  left: 30px;
  background: transparent;
  overflow-x: hidden;
  padding: 10px 10px;
}
.nav-bar a {
  padding: 10px 20px 10px 20px;
  text-decoration: bold;
  font-size: 20px;
  color: rgb(0, 0, 0);
  display: block;
}
.nav-bar a:hover {
  color: rgb(60, 186, 84);
}
.nav-link{
  font-family: 'Montserrat', sans-serif;
  font-weight: bold;
}
.btn-group{
  padding-left:990px;
}
.logo {
  position: absolute;
  top: 19%;
  left: 10%;
  transform: translate(-50%, -50%);
  font-size: 30px;
  font-weight: normal;
  font-family: 'Montserrat', sans-serif;
  text-decoration: none;
}
.container-1{
  padding-right:-200px;
}
.main-body{
  padding-left:340px;
  padding-top:200px;
  padding-bottom:0px;
}
  .btn-group{
  padding-left:990px;
}
.main-body{
  padding-left:340px;
  padding-top:200px;
  padding-bottom:0px;
}
</style>
</head>
<body>
<div class="container-fluid">
  <div class="header">
    <div class="logo">
      <a href="home.php" style="text-decoration:none;"><font color=#ff9918>CFF</font><font color=#81ab00>forums</font></a>
    </div>


    <a href="profile.php"><img src="../../resources/img/avatar.png" alt="Avatar" class="avatar"></a>
    <div class='container-1'>
    <img src="../../resources/img/navbar-x2.png" alt="header" width=100% height=300px>
      </div>
    </div>

    <br />

    <div class="nav-bar">
      <a href="home.php" class="nav-link">Home</a>
      <a href="discussion.php" class="nav-link">Discussions</a>
      <a href="crops.php" class="nav-link">Crops</a>
      <a href="tags.php" class="nav-link">Tags</a>
      <a href="logout.php" class="nav-link">Logout</a>
    </div>

    <hr />
    <div class="main-body">

    <div class="col-md-8">
        <?php
        include("config.php");
        $threadID = $_GET['cthreadID'];
        mysqli_query($link,"SELECT * FROM thread");
        mysqli_query($link,"UPDATE thread SET ThreadViewsCount = ThreadViewsCount + 1 WHERE ThreadID = '".$threadID."'");
        $sql = "SELECT * FROM thread WHERE ThreadID ='".$threadID."'";
        $res = mysqli_query($link,$sql);
        $threads = "";
        if(mysqli_num_rows($res) > 0){
          while($row = mysqli_fetch_assoc($res)){
            $threadID = $row['ThreadID'];
            $title = $row['ThreadSubject'];
            $description = $row['ThreadDescription'];
            $viewcount = $row['ThreadViewsCount'];
            $votecount = $row['ThreadVoteCount'];
            $answercount = $row['ThreadAnswersCount'];
            $threads .= "
                          <div class='card-body'>  
                            <h2 class='card-title'><font size='6'>".$title."</font></h2>                                          
                  <hr/>   
                  <div class='row'>
                      <div class='text-center col-md-0 pl-3 pt-1'>
                        <p>".$votecount."</p>
                        <p class='thread-button pl-1 pr-1' style='font-size:14px;'>Votes</p>
                      </div> 
                      <div class='text-center col-md-0 pl-3 pt-1'>
                        <p>".$viewcount."</p>
                        <p class='thread-button pl-1 pr-1' style='font-size:14px;'>Views</p>
                      </div>
                      <div class='text-center col-md-0 pl-3 pt-1'>
                        <p>".$answercount."</p>
                        <p class='thread-button pl-1 pr-1' style='font-size:14px;'>Answers</p>
                      </div>     
                  </div>                               
                        <p class='card-text'>".$description."</p><br>
                          </div>";
          }
          echo $threads;
         
        }
        else {
          echo "<a href='home.php'>Return to Home</a><hr />";
          echo "<p>There has been an error displaying this page.";
        }
        ?>
 </div><!--"end col-md-8 div"-->
        
     <form method="post">
       <input type="submit" name="upvote" id="upvote" value="Upvote"/>
      </form>
    </div>

    <?php

if(array_key_exists('upvote',$_POST)){
  upvote();
}
function upvote()
{
  
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "secret";
$dbName = "cffforum";
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
  
	if(isset($_POST['upvote']))
	{ 
    $threadID = $_GET['cthreadID'];
		
      $sql1 = "SELECT ThreadVoteCount FROM thread WHERE ThreadID ='".$threadID."'";
      $result = mysqli_query($conn,$sql1);
      $vote = $result->fetch_assoc();
      (int) $voteCount = $vote['ThreadVoteCount'];
      $voteCount++;
      
      $sql2 = "UPDATE thread SET ThreadVoteCount = '".$voteCount."' WHERE ThreadID = '".$threadID."'";
      $result = mysqli_query($conn,$sql2);
      

    }

    
  
}
?>
<div class="container-fluid">
</body>