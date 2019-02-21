<?php

    $content = trim($_POST["answer_content"]);
    $uid = trim($_POST["uid"]);
    $threadID = trim($_POST["threadid"]);

    if(!empty($content)){
        include_once "config.php";
        mysqli_query($link,"SELECT ThreadID,ThreadAnswererID,AnswerContent FROM answer");
        $result = mysqli_query($link,"INSERT into answer (ThreadID,ThreadAnswererID,AnswerContent) VALUES ('".$threadID."','".$uid."','".$content."')");
        
        /*mysqli_query($link,"SELECT ThreadID From thread_votes");
        $result1 = mysqli_query($link,"INSERT INTO thread_votes(ThreadID)
                                       SELECT ThreadID FROM thread WHERE ThreadID = '".$ThreadID."'");*/
        mysqli_close($link);
        if($result){
            header("location: specificquestion.php?cthreadID=$threadID");
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

