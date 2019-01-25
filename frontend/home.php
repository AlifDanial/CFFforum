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

<link href="style.css" rel="stylesheet">

<style>
.card-title{
  font-family: 'Montserrat', sans-serif;
  font-weight: bold;
  padding-left: 30px;
  text-align: right;
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
</style>
</head>
<body>
<div class="container-fluid">
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


    </ul>
    </div>  

    <a href="profile.php"><img src="avatar.png" alt="Avatar" class="avatar"></a>
    <img src="header.jpg" alt="header" width=100% height= 150px>
    </div>

    <br />

    <div class="nav-bar">
      <a href="home.php" class="nav-link" >Home</a>
      <a href="discussion.php" class="nav-link">Discussions</a>
      <a href="crops.php" class="nav-link">Crops</a>
      <a href="tags.php" class="nav-link">Tags</a>
      <a href="logout.php" class="nav-link">Logout</a>
    </div>

    <div class="main">
    <h1 class="title">Your Feed</h1>

<div class="line"></div>

    <br />
    <br />
    <br />
    <br />
    </div>
  
    <div class="col-md-8">
    <?php
  include_once("config.php");
  //to implement thread limit and next pages
  $sql = "SELECT * FROM thread ORDER BY ThreadID LIMIT 5";
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
              <div class='card mb-4 '>
                <div class='card-body'>  
                  <div class='row'>

                      <div class='text-center col-md-0 pl-2 pt-1' >
                    <a href='specificquestion.php?cthreadID=".$threadID." '' class='card-link'  style='text-decoration: none' >".$votecount."</a>
                    <p class='thread-button pl-1 pr-1'>Votes</p>
                      </div>
                      <div class='text-center col-md-0 pl-2 pt-1 '>
                    <a href='specificquestion.php?cthreadID=".$threadID." '' class='card-link' style='text-decoration: none'>".$viewcount."</a>
                    <p class='thread-button pl-1 pr-1'>Views</p>
                      </div>
                      <div class='text-center col-md-0 pl-2 pt-1'>
                    <a href='specificquestion.php?cthreadID=".$threadID." '' class='card-link' style='text-decoration: none'>".$answercount."</a> 
                    <p class='thread-button pl-1 pr-1'>Answers</p>
                      </div>
                  </div>

                    <font size='-1'>
                    <!--<p class='thread-button'>Votes&nbsp; Views&nbsp; Answers </p>-->
                    </font>
                    <div class='card-body1 pt-0 pb-0 '>
                        <h4><a href='specificquestion.php?cthreadID=".$threadID." '' class='card-title' style='text-decoration: none' >".$title."</a></h4>
                            </div>
                </div>
             </div>";
    }
    echo $threads;

  }
   else {
     echo "<p>There are no threads available yet.</p>";
   }?>
   </div> <!-- end col-md-8 div-->

<hr>

</div>      


<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close">&times;</span>
    </div>

    <div class="container">
     
      <h2>Ask your question:</h2>
      <form action="/action_page.php">
      <br>
      <center>
      <textarea name="questiontitletitle" placeholder="Title" rows="1" cols="60" style="font-size: 15px;"></textarea>
      <br>
      <br> 
      <textarea name="questiontags" placeholder="Tags" rows="1" cols="60" style="font-size:15px;"></textarea>
      <br>
      <br>
      <textarea name="userquestion" placeholder="Question" rows="5" cols="60" style="font-size:15px;"></textarea>
      <br>
    </center>

    <button type="submit" width=100px>Submit</button>
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
</body>
</html>