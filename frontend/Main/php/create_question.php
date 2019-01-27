<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(isset($_POST['question_submit'])){
    if(($_POST['question_title'] == "") && ($_POST['question_content'] == "")){
        }else{
            echo "You did not field in both fields. Please return to the previous page.";
            exit();
        }
}else {
    include_once("config.php");
    $title = $_POST['question_title'];
    $content = $_POST['question_content'];
    $creator = $_POST['uid'];
    $sql = "INSERT INTO thread (ThreadSubject,ThreadDescription,ThreadUserID) VALUES ('".$title."','".$content."','".$creator."')";
    $res = mysqli_query($sql) or die(mysqli_error());
    
    if($res){
        header("Location: home.php");
    }
else{
    echo "There was a problem creating you thread. Please Try Again.";
}

}
?>