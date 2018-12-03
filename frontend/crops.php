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


<style>
* {
    box-sizing: border-box;
}

.header {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
/*  height: 200px;*/
/*  background-size: auto;*/

}

.logo {
    position: absolute;
    top: 30%;
    left: 10%;
    transform: translate(-50%, -50%);
    font-size: 30px;
    font-family: Arial;
    text-decoration: none;
}

a {
  text-decoration: none;
  color: black;
}

.navbar {
  position: absolute;
    top: 30%;
    left: 45%;
    transform: translate(-50%, -50%);
    font-size: 20px;
    font-family: Arial;
    padding-bottom:20px;
    z-index: 1;
}

.navbar ul li{
    list-style-type: none;
    display:inline-block;
}

/*navbar search */
.navbar .search-container {
  float: center;
}

.title{
  position: relative;
  font-family: 'Montserrat', sans-serif;
  font-size: 50px;
  margin-top: -2%;
  margin-left: -4%;
}

.navbar input[type=text] {
  padding: 5px;
  margin-top: 20px;
  font-size: 17px;
  border: none;
  width: 600px;
}

.navbar .search-container button {
  float: right;
  padding: 14px 14px;
  margin-top: 20px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  width:10px;
  border: none;
  cursor: pointer;
}

.navbar .search-container button:hover {
  background: #ccc;
}

.button {
    background-color: #FF6F20;
    color: white;
    padding: 12px 12px;
/*    margin: 5px 0;*/
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 15px;
    width: 150px;
}

.button:hover {
    opacity: 0.8;
}

.avatar {
  position:absolute;
    top: 17%;
    left: 90%;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    z-index: 1;
}

.sidenav {
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 200px;
    left: 30px;
    background: transparent;
    overflow-x: hidden;
    padding: 10px 10px;
}

.sidenav a {
    padding: 10px 20px 10px 20px;
    font-family: arial;
    text-decoration: bold;
    font-size: 20px;
    color: black;
    display: block;
}

.sidenav a:hover {
    color: grey;
}

.main {
  position: relative;
    top: 30%;
    left: 20%;
    right:20%;
    float: left;
    width: 100%;
    height: 100%;
    padding-top: 200px;
}

.sortbar {
  position: absolute;
    top: 25%;
    left: 60%;
    transform: translate(-50%, -50%);
    font-size: 15px;
    font-family: Arial;
    width:400px;
}

.sortbar ul{
  list-style-type: none;
    margin: 0;
    padding: 0;
  overflow: hidden;
} 

.sortbar li{
  list-style-type: none;
    display: inline-block;
    background-color: white;
    border: 1px solid #bbb;
    width:100px;
    font-size:15px;
}

.sortbar li a {
    display: block;
    color: black;
    border: 1px solid #bbb;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.active {
  background-color: #bcd860;
}

h1{
  font-family: Arial;
}

.line{
width: 61%;
height: 47px;
border-bottom: 1px solid #bbb;
position: absolute;
}

.table{
  border: none;
}

.question{
  border: 1px solid #93bf00;
  width: 830px;
  height: 150px;
  /*padding: 100px 100px;*/
  margin: 10px;
  vertical-align: middle;
}

td {
  padding:10px;
  text-align: center;
  vertical-align: middle;
}

.tag{
  border: 1px solid green;
  border-radius: 5px;
  background-color: #bcd860;
  width: auto;
  height: auto;
  max-width: 150px;
  max-height: 30px;
  margin: 10px;
  padding:5px;
  padding-right:5px;
  text-align: center;
  font-style: italic;
  display: inline-block;
  float: left;
}

h3{
  text-decoration: none;
}

.category{
  border: 1px solid black;
  width: 200px;
  height: 100px;
  margin: 40px;
  text-align: center;
  font-style: italic;
  /*display: block;*/
}

@media screen and (max-width: 600px) {
  .navbar .search-container {
    float: none;
  }
  .navbar a, .topnav input[type=text], .navbar .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .navbar input[type=text] {
    border: 1px solid #ccc;  
  }
}

/* Full-width input fields */
input[type=textarea] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #FF6F20;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

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

    <h1 class="title">Crops</h1>

     <div class="sortbar">
      <ul>
        <li> <a href="#interesting" class="active">Interesting</a></li>
        <li><a href="#recent">Recent</a></li>
      </ul>
    </div>


    <br />
    <br />
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
        <td><div class="category"><a href="specificcrop.html">
        <p>Hibiscus</p>
        <p>Hibiscus rosa-sinensis</p></a>
        </div></td>
        <td><div class="category">
        <p>Hibiscus</p>
        <p>Hibiscus rosa-sinensis</p>
        </div></td>
        <td><div class="category">
        <p>Hibiscus</p>
        <p>Hibiscus rosa-sinensis</p>
        </div></td>
      </tr>
      <tr>
        <td><div class="category"></div></td>
        <td><div class="category"></div></td>
        <td><div class="category"></div></td>
      </tr>
      <tr>
        <td><div class="category"></div></td>
        <td><div class="category"></div></td>
        <td><div class="category"></div></td>
      </tr>
    </table>
    </div>
</body>