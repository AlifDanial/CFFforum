<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to home page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email input is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT UserID, UserEmail, UserPassword FROM users WHERE UserEmail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            mysqli_query($link,"UPDATE users SET UserLastLogin = now() WHERE UserID = '".$id."'");
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;    
                                                 
                            // Redirect user to welcome page
                            header("location: home.php"); 
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>
<head>
    
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">

<style>
* {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column1 {
    position: absolute;
    top: 0;
    left: 0;
    float: left;
    width: 70%;
    height: 100%;
}

.column2 {
    position: absolute;
    top: 0;
    left: 70%;
    float: left;
    width: 30%;
    height: 100%;
    padding-top: 200px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

body {font-family: Arial, Helvetica, sans-serif;}


input[type=text], input[type=password] {
    width: 60%;
    align-content: center;
    font-color: black;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 25px;
    box-sizing: border-box;
}

button {
    background-color: #1172F5;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    width: 60%;
}

button:hover {
    opacity: 0.8;
}


/*.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    width: 25%;
    border-radius: 25%;
}*/

.sign{
    position: absolute;
    top: 80%;
    left: 25%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: transparent;
    width: 20%;
    color: white;
    font-size: 12px;
    padding: 14px 20px;
    border: solid;
    cursor: pointer;
    border-radius: 25px;
    text-align: center;
}

.container {
    padding: 16px;
}

.centered {
    position: absolute;
    top: 60%;
    left: 40%;
    transform: translate(-50%, -50%);
    color: white;
}

h1{
  font-size: 36px;
}

a{
  text-decoration: none;
  color: black;
}

span.password {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.password {
       display: block;
       float: none;
    }
}
</style>
</head>
<body>


<div class="row">

  <div class="column1">
    <img src="../../resources/img/Picture1.png" width=100% height=100%>
    <div class="centered">
      <h1>WELCOME TO CFFforums</h1>
      <p>Join our community of scientists and academics from around the globe</p>
    </div>
    <a href="signup.php"><button class="sign" type="submit">SIGN UP</button></a>
  </div>

  <div class="column2" style="background-color:#ffffff">
    <div class="container">
    <center>

    <img src="../../resources/img/logo.jpg">

    <br />
    <br />
    <br />
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <input class="form-control" type="text" placeholder="EMAIL" name="email" value="<?php echo $email; ?>" required>
                <span class="help-block"><?php echo $email_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input class="form-control"type="password" placeholder="PASSWORD" name="password" required>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
        
    <button type="submit">LOGIN</button>

    <p><font color="grey">Don't have an account? <strong><a href="signup.php">Sign up</a></strong></font></p>
    
    </center>
  </div>
  </div>

</body>
</html>

