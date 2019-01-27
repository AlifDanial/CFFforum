
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 20px;
    font-family: Arial;
    word-spacing: 70px;
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
/*  left:20%;*/
}

.navbar input[type=text] {
  padding: 5px;
  margin-top: 20px;
  font-size: 17px;
  border: none;
}

.navbar .search-container button {
  float: right;
  padding: 14px 14px;
  margin-top: 20px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.navbar .search-container button:hover {
  background: #ccc;
}

.avatar {
  position:absolute;
    top: 17%;
    left: 90%;
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

.main {
  position: relative;
    top: 30%;
    left: 20%;
    right: 20%;
    float: left;
    width: 100%;
    height: 100%;
    padding-top: 200px;
}

/*.active {
  background-color: #bcd860;
}*/

h1{
  font-family: Arial;
}

.table{
  border: none;
}


td {
  padding:20px;
  padding-right: 200px;
/*  text-align: left;*/
/*  vertical-align: middle;*/
}

h3{
  text-decoration: none;
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
    
    </div>
    </li>
			<li><a href="home.php" class=external>Home</a></li>
			<li>Cropbase</li>
			<li><a href="tags.php">Tags</a></li>
    </ul>
		</div>	

		<img src="avatar.png" alt="Avatar" class="avatar">
  	<img src="header.jpg" alt="header" width=100% height= 150px>
    </div>
    
      

  	<br />
  	<div class="main">

        <form action="upload.php" method="post" enctype="multipart/form-data">
          Select image to upload:
          <input type="file" name="image"/>
          <input type="submit" name="submit" value="UPLOAD"/>
      </form>


    <table>
      <tr>
        <td>
          Name
        </td>
        <td>
          Sharifah
        </td>
      </tr>
      <tr>
        <td>
          Occupation
        </td>
        <td>
          Professor
        </td>
      </tr>
      <tr>
        <td>
          Contact
        </td>
        <td>
          email@edu.my
        </td>
      </tr>
    </table>
  

  	</div>
</body>
</html>