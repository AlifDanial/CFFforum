<?php

    $title = trim($_POST["question_title"]);
    $content = trim($_POST["question_content"]);
    $uid = trim($_POST["uid"]);

    if(!empty($title) && !empty($content)){
        include_once "config.php";
        mysqli_query($link,"SELECT ThreadSubject,ThreadDescription,ThreadUserID FROM thread");
        $result = mysqli_query($link,"INSERT into thread (ThreadSubject,ThreadDescription,ThreadUserID) VALUES ('".$title."','".$content."','".$uid."')");
        
        $thread = mysqli_query($link,"SELECT ThreadID From thread Where ThreadUserID = '".$uid."' And ThreadDescription = '".$content."' And ThreadSubject = '".$title."'");;
        $threadid = $thread->fetch_assoc();
      (int) $ThreadID = $threadid['ThreadID'];
        mysqli_query($link,"SELECT ThreadID From thread_votes");
        $result1 = mysqli_query($link,"INSERT INTO thread_votes(ThreadID)
                                       SELECT ThreadID FROM thread WHERE ThreadID = '".$ThreadID."'");
        mysqli_close($link);
        if($result && $result1){
            header("location: home.php");
        }
        else{
            echo "Error Please Try Again Later";
            echo "<br>";
            echo "<a href='home.php'>Return to Home</a>";
        }
    }
    else{
        echo "Please fill up both forms to continue.";
        echo "<br>";
        echo "<a href='home.php'>Return to Home</a>";
    }

    ?>

    <html>
    <body>
    </body>
    </html>

