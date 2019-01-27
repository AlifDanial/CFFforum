<?php
        // Include config file
        require_once "config.php";
         
        // Define variables and initialize with empty values
        $email = $password = $occupation = $firstname = $lastname = $confirm_password = "";
        $email_err = $password_err = $occupation_err = $firstname_err = $lastname_err = $confirm_password_err = "";
         
        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         
           
                // Prepare a select statement
                $sql = "SELECT UserID FROM users WHERE UserEmail = ?";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_email);
                    
                    // Set parameters
                    $param_email = trim($_POST["email"]);
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        /* store result */
                        mysqli_stmt_store_result($stmt);
                        
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            $email_err = "This email is already taken.";
                        } else{
                            $email = trim($_POST["email"]);
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                 
                // Close statement
                mysqli_stmt_close($stmt);
            
            
            
                // Prepare a select statement
                $sql = "SELECT UserID FROM users WHERE UserFirstName = ?";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_firstname);
                    
                    // Set parameters
                    $param_firstname = trim($_POST["firstname"]);
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        /* store result */
                        mysqli_stmt_store_result($stmt);
                        
                    $firstname = trim($_POST["firstname"]);
                
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                 
                // Close statement
                mysqli_stmt_close($stmt);
            

            
                // Prepare a select statement
                $sql = "SELECT UserID FROM users WHERE UserLastName = ?";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_lastname);
                    
                    // Set parameters
                    $param_lastname = trim($_POST["lastname"]);
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        /* store result */
                        mysqli_stmt_store_result($stmt);
                        
                    $lastname = trim($_POST["lastname"]);
                
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                 
                // Close statement
                mysqli_stmt_close($stmt);
            

             
                // Prepare a select statement
                $sql = "SELECT UserID FROM users WHERE UserOccupation = ?";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_occupation);
                    
                    // Set parameters
                    $param_occupation = trim($_POST["occupation"]);
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        /* store result */
                        mysqli_stmt_store_result($stmt);
                        
                    $occupation = trim($_POST["occupation"]);
                
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                 
                // Close statement
                mysqli_stmt_close($stmt);
            
            
             //Validate password
            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter a password.";     
            } else if(strlen(trim($_POST["password"])) < 6){
                $password_err = "Password must have at least 6 characters.";
            } else{
                $password = trim($_POST["password"]);
            }
            
            // Validate confirm password
             if(empty(trim($_POST["confirm_password"]))){
                     $confirm_password_err = "Please confirm password.";     
             } else{
                     $confirm_password = trim($_POST["confirm_password"]);
              if(empty($password_err) && ($password != $confirm_password)){
                     $confirm_password_err = "Password did not match.";
        }
    }
            
            // Check input errors before inserting in database
            if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){
                
                // Prepare an insert statement
                $sql = "INSERT INTO users (UserEmail, UserPassword , UserFirstName , UserLastName , UserOccupation ) VALUES (?, ? ,? ,? ,? )";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters

                    mysqli_stmt_bind_param($stmt, "sssss", $param_email, $param_password, $param_firstname, $param_lastname, $param_occupation);
                    
                    // Set parameters
                    $param_email = $email;
                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                    $param_firstname = $firstname;
                    $param_lastname = $lastname;
                    $param_occupation = $occupation;
                    
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        header("location: login.php");   
                    } else{
                        echo "Something went wrong. Please try again later.";
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
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 40%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    border-radius: 25px;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
    background-color: #1172F5;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    width: 50%;
    opacity: 0.9;
    float: center;
}

button:hover {
    opacity:1;
}

/* Float cancel and signup buttons and add an equal width */
.signupbtn {
    float: center;
    width: 20%;
}

.name{
    width: 50%;
    margin: 8px;
}

/* Add padding to container elements */
.container {
    margin-left:30%;
    width: 100%;
    padding: 16px;
}

.center {
    margin-left:30%;
    width: 100%;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

a{
  text-decoration: none;
  color: black;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>
        

  <div class="container">
    
    <p><font size="2px">Sign up to continue</font></p>
    <img src="../../resources/img/logo.jpg">
    </div>
   
    
    <center>
    <div class="name">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">                            
            <input type="text" placeholder="First Name" name="firstname" value="<?php echo $firstname; ?>" required ><input type="text" placeholder="Last Name" name="lastname" value="<?php echo $lastname; ?>" required >
                    <span class="help-block"><?php echo $firstname_err; ?></span>
            </div>

        <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">                            
                  
                    <span class="help-block"><?php echo $lastname_err; ?></span>
            </div>
    </div> 
    
        <div class="form-group <?php echo (!empty($occupation_err)) ? 'has-error' : ''; ?>">                            
             <input type="text" placeholder="Occupation" name="occupation" value="<?php echo $occupation; ?>" required >
                    <span class="help-block"><?php echo $occupation_err; ?></span>
            </div>

        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">                            
           <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>" required >
                    <span class="help-block"><?php echo $email_err; ?></span>
            </div>

        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">                            
                <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" required >
                         <span class="help-block"><?php echo $password_err; ?></span>
            </div>

        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <input type="password" placeholder = "Confirm Password" name="confirm_password" value="<?php echo $confirm_password; ?>" required>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>

    <div class="clearfix">
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>

    <br />
    <br />
    <br />

    <p><font color="grey">Already have an account? <strong><a href="login.php">Sign in</a></strong></font></p>
    </center>
  </div>


</body>
</html>

