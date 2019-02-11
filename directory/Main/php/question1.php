<html>
<body>

Welcome <?php echo $_POST["question_title"]; ?><br>
Your email address is: <?php echo $_POST["question_content"]; ?><br>
Your id is: <?php echo trim($_POST["uid"]) ?><br>
<?php
$title = trim($_POST["question_title"]);
$content = trim($_POST["question_content"]);
$uid = trim($_POST["uid"]);
include_once "config.php";
mysqli_query($link,"SELECT * FROM thread");
$result = mysqli_query($link,"INSERT into thread (ThreadSubject,ThreadDescription) VALUES ('".$title."','".$content."')");

if($result){
            echo "success";
        }
        else{
            echo "Error Please Try Again Later";
            echo "<br>";
            echo "<a href='new_question.php'>Return to Question Page</a>";
        }
?>
</body>
</html>