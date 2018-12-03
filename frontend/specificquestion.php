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
<link href="bootstrap.min.css" rel="stylesheet">


<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<link href="specificquestionstyle.css" rel="stylesheet">

<style>
</style>
</head>
<body>
  <div class="header">
    <div class="logo">
      <a href="home.php"><font color=#ff9918>CFF</font><font color=#81ab00>forums</font></a>
    </div>

    <div class="navbar">
      <ul>
      <li><div class="search-container">
    <form>
      <input type="text" placeholder="Search..." name="search">
      <button type="submit"><i class="material-icons"></i></button>
    </form>
    </div>
    </li>
    <li><div class="button" onclick="document.getElementById('id01').style.display='block'">Ask New Question</div></li>

    <div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close">&times;</span>
    </div>

    <div class="container">
     
      <h2>Ask your question:</h2>
      <br>
      <form action="/action_page.php">
      <textarea name="userquestion" rows="5" cols="88"></textarea>
      <br>
    </div>

    <div class="container" style="background-color:#f1f1f1">
    <button type="submit">Submit</button>
    </div>
  </form>
</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    </ul>
    </div>  

    <a href="profile.php"><img src="avatar.png" alt="Avatar" class="avatar"></a>
    <img src="header.jpg" alt="header" width=100% height= 150px>
    </div>

    <br />

    <div class="sidenav">
      <a href="home.php" class="nav-link">Home</a>
      <a href="discussion.php" class="nav-link">Discussions</a>
      <a href="crops.php" class="nav-link">Crops</a>
      <a href="tags.php" class="nav-link">Tags</a>
      <a href="logout.php" class="nav-link">Logout</a>
    </div>

    <hr />
    <div class="main">

    <div class="col-md-8">
        <?php
        include("config.php");
        $threadID = $_GET['cthreadID'];

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
                <p>".$votecount."</p>                                
                <p class='card-text'>".$description."</p>
                  <br>
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
</body>