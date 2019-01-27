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

<link href="../../resources/css/style1.css" rel="stylesheet">

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
    <img src="../../resources/img/navbar-x2.png" alt="header" width=100% height=300px>
      </div>
        </div> <!--end header -->

    <br />

    <div class="nav-bar">
      <a href="home.php" class="nav-link">Home</a>
      <a href="discussion.php" class="nav-link">Discussions</a>
      <a href="crops.php" class="nav-link">Crops</a>
      <a href="tags.php" class="nav-link">Tags</a>
      <a href="logout.php" class="nav-link">Logout</a>
    </div>

    <div class="main-body">
    <h1 class="text1-left" style="font-size:40px;font-family: 'Montserrat', sans-serif;font-size: 40px;padding-bottom:40px;">Our Tags</h1>

    <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option2" autocomplete="off"> Radio
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option3" autocomplete="off"> Radio
  </label>
</div><!--end main-body-->

    <div class="line">
    <br /><br /><br /><br />
        </div>
      </div> <!--end main body -->
    </div> <!--end cointainer fluid -->


   
</body>
</html>