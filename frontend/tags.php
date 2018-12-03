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

<link href="tagsstyle.css" rel="stylesheet">

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

    <div class="main">

    <h1 class="title">Tags</h1>


    <div class="sortbar">
      <ul>
        <li> <a href="#interesting" class="active">Interesting</a></li>
        <li><a href="#recent">Recent</a></li>
        <li><a href="#alphabeltical">Alphabetical</a></li>
      </ul>
    </div>


    <br />
    <br />
    <br />

<div class="line"></div>

    <br />
    <br />
    <br />
    <br />

    <table>
      <tr>
        <td><a href="specifictag.html"><button type="button" class="tag">hibiscus</button></a></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
      </tr>
      <tr>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
      </tr>
      <tr>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
      </tr>
      <tr>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
      </tr>
      <tr>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
      </tr>
      <tr>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
        <td><button type="button" class="tag"></button></td>
      </tr>
    </table>

    </div>
</body>