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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="../../resources/css/style1.css" rel="stylesheet">
<link href="../../resources/css/hamburgers.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
<style>
.card{
  border-width:1.4px;
}
.card-title{
  font-family: 'Montserrat', sans-serif;
  font-size: 23px;
  font-weight: bold;
  padding-left: 15px;
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
.btn-group{
  padding-left:62%;
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
.searchbar{
  position:absolute;
  left: 20%;
  top: 14.5%; 
}
.askbutton{
  width:9%;


}
</style>
</head>
<body>
<div class="container-fluid">
  <div class="header">
    <div class="logo">
      <a href="home.php" style='text-decoration: none'><font color=#ff9918>CFF</font><font color=#81ab00>forums</font></a>
    </div>
  
    <a href="profile.php"><img src="../../resources/img/avatar.png" alt="Avatar" class="avatar"></a>
    <div class='container-1'>
    <div class="searchbar">
      <form action="search.php" method="post">
		    <input type="text" id="searchBar" placeholder="Search..." value="" maxlength="25" autocomplete="off" onmousedown="" onblur=""/>
          <div>
		        <button type="button" class="btn btn-default">
      				<span>Search</span> 
    	      </button>
          </div>
	    </form>	
  </div>
    <img src="../../resources/img/navbar-x2.png" alt="header" width=100% height=300px>
    
</div> <!--  end container-1-->
    </div>

    <br />

    <div class="nav-bar">
      <a href="home.php" class="nav-link" >Home</a>
      <a href="crops.php" class="nav-link">Crops</a>
      <a href="tags.php" class="nav-link">Tags</a>
      <a href="logout.php" class="nav-link">Logout</a>
    </div>

    <div class="main-body">
    <h1 class="text1" style="font-size:40px;font-family: 'Montserrat', sans-serif;font-size: 40px;padding-bottom:40px;">Top Questions</h1>
    <div class="askbutton">
      <button type="button" onclick=" relocate_home()" class="btn btn-warning">Ask a Question</button>
    </div>
    <script>
function relocate_home()
{
     location.href = "new_question.php";
} 
</script>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-outline-dark">
    <input type="radio" onclick=" relocate_home1()" name="options" id="option1" autocomplete="off" checked> Recent </label>
    <script>
function relocate_home1()
{
     location.href = "home.php";
} 
</script>
  <label class="btn btn-outline-success active">
    <input type="radio" onclick=" relocate_home2()" name="options" id="option2" autocomplete="off"> Featured </label>
    <script>
function relocate_home2()
{
     location.href = "home2.php";
} 
</script>
  <label class="btn btn-outline-dark">
    <input type="radio" onclick=" relocate_home3()" name="options" id="option3" autocomplete="off"> Hot </label>
    <script>
function relocate_home3()
{
     location.href = "home3.php";
} 
</script>
</div>

    <div class="line">
    <br /><br /><br /><br />
    </div>
      </div>

  
    <div class="col-md-8">
    <?php
  include_once("config.php");
  //to implement thread limit and next pages
  $sql = "SELECT * FROM thread ORDER BY ThreadVoteCount DESC";
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
              <div class='card border-success mb-4 '>
                <div class='card-body'>  
                  <div class='row'>

                      <div class='text-center col-md-0 pl-2 pt-1' >
                    <a href='specificquestion.php?cthreadID=".$threadID." '' class='card-link'  style='text-decoration: none;font-size:18px;' >".$votecount."</a>
                    <p class='thread-button pl-1 pr-1' style='font-size:14px;'>Votes</p>
                      </div>
                      <div class='text-center col-md-0 pl-2 pt-1 '>
                    <a href='specificquestion.php?cthreadID=".$threadID." '' class='card-link' style='text-decoration: none;font-size:18px;'>".$viewcount."</a>
                    <p class='thread-button pl-1 pr-1' style='font-size:14px;'>Views</p>
                      </div>
                      <div class='text-center col-md-0 pl-2 pt-1'>
                    <a href='specificquestion.php?cthreadID=".$threadID." '' class='card-link' style='text-decoration: none;font-size:18px;'>".$answercount."</a> 
                    <p class='thread-button pl-1 pr-1' style='font-size:14px;'>Answers</p>
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

</div> <!--end container fluid -->      


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