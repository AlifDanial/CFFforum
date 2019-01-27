<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$uid = $_SESSION["id"];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="style1.css" rel="stylesheet">

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
  border: none;
  background: none;
}
.main-body{
  padding-left:300px;
  padding-right:140px;
  padding-top:250px;
  padding-bottom:0px;
}
.submit-button{
  width:150px;
  float:right;
}
.text1-left{
  font-family: 'Montserrat', sans-serif;
  font-size:20px;
  font-weight:bold;
}

.text2-left{
  padding-top:30px;
  font-family: 'Montserrat', sans-serif;
  font-size:20px;
  font-weight:bold;
}
.form-group{
  margin-bottom:0px;
}
.header{
  margin-bottom:0px;
}
</style>
</head>
<body>
<div class="container-fluid">
  <div class="header">
  <div class="logo">
      <a href="home.php" style='text-decoration: none'><font color=#ff9918>CFF</font><font color=#81ab00>forums</font></a>
  </div>

    <a href="profile.php"><img src="avatar.png" alt="Avatar" class="avatar"></a>
  <div class='container-1'>
    <img src="navbar-x2.png" alt="header" width=100% height=300px>
  </div>
  </div><br />


    <div class="nav-bar">
      <a href="home.php" class="nav-link" >Home</a>
      <a href="discussion.php" class="nav-link">Discussions</a>
      <a href="crops.php" class="nav-link">Crops</a>
      <a href="tags.php" class="nav-link">Tags</a>
      <a href="logout.php" class="nav-link">Logout</a>
    </div>

    <div class="main-body">
    <div class="form-group">

      <form action="create_question.php" method="post">
        <p class="text1-left" >Question Title</p>
          <input name="question_title" class="form-control form-control-lg"  type="text" placeholder="Enter Title Here">
        <p class="text2-left" >Question Description</p>
          <textarea name="question_content" class="form-control form-control-lg"  id="exampleFormControlTextarea1" rows="7" placeholder="Enter Description"></textarea>
    </div>
          <div class="submit-button">
        <input type="hidden" name="uid" value="<?php echo $uid; ?>">
        <button type="submit" name="question_submit"class="btn btn-primary mb-2">Submit Question</button></div>
    </form>
      </div>

  
    
</body>
</html>