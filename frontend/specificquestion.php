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
    right:20%;
    float: left;
    width: 100%;
    height: 100%;
    padding-top: 200px;
}

.sortbar {
  position: absolute;
    top: 35%;
    left: 50%;
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
    border: 1px solid #bbb
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

/*.active {
  background-color: #bcd860;
}*/

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
  /*margin: 10px;*/
  vertical-align: middle;
}

.comment{
  border: 1px solid #93bf00;
  width: 800px;
  height: auto;
  min-height: 50px;
  /*padding: 100px 100px;*/
  /*margin: 10px;*/
  vertical-align: middle;
}

.reply{
  border: 1px solid #93bf00;
  width: 770px;
  height: auto;
  min-height: 50px;
  /*padding: 100px 100px;*/
  margin-left: 30px;
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
  background-color: #98fb98;
  width: auto;
  height: auto;
  max-width: 150px;
  max-height: 30px;
  margin: 5px;
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

textarea{
  font-size: 15px;
}

/*figure out how to make button for search bar different*/
/*i {
    border: solid black;
    border-width: 0 5px 5px 0;
    display: inline-block;
    padding: 5px;
    margin:10px;
    margin-left:30px;
}*/

.up {
    transform: rotate(-135deg);
    -webkit-transform: rotate(-135deg);
}

.down {
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
}
</style>
</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="home.html"><font color=#ff9918>CFF</font><font color=#81ab00>forums</font></a>
		</div>

		<div class="navbar">
      <ul>
      <li><div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search..." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    </div>
    </li>
			<li><a href="home.html" class=external>Home</a></li>
			<li>Cropbase</li>
			<li><a href="tags.html">Tags</a></li>
    </ul>
		</div>	

		<img src="avatar.png" alt="Avatar" class="avatar">
  	<img src="header.jpg" alt="header" width=100% height= 150px>
  	</div>

  	<br />
  	<div class="main">


<h3>What is the protein content of a hibiscus in Semenyih, Malaysia?</h3>

    <table>
      <tr>
        <td><div class="question"><table>
          <tr>
            <td>
              <p><i class="arrow up"></i></p>
              <p><i class="arrow down"></i></p>
            </td>
            <td>
            <td>
              <p>What is the protein content of a hibiscus in Semenyih, Malaysia?</p>
              <div class="tag">hibiscus</div><div class="tag">protein</div>
            </td>
          </tr>
        </table></div></td>
      </tr>
    </table>

    <h3>Comments</h3>

    <div class="comment">The protein content is..........</div>
    <div class="reply">...................</div>
    <div class="reply">...................</div>


    <br>
    <br>
    <br>

    <form action="/action_page.php">
    <textarea name="usercomment" rows="10" cols="90">Type your answer...</textarea>
    <br>
    <input type="submit">
    </form>



  	
  	</div>
</body>