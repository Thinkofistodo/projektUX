<?php
session_start();
 if(isset($_POST['comment-submit'])) {
    require 'db.php';
    $text = $_POST['text'];
    if (empty($text)) {
        header("Location: ../../". $_SESSION['type']. ".php?name=.".$_SESSION['listname']."?error=Empty Text");
        exit();
    } else {
        $query = "INSERT INTO comments (user_id, text, excercise_id) VALUES (?,?,?)";
        $init = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($init, $query)) {
            header("Location: ../../". $_SESSION['type']. ".php?name=.".$_SESSION['listname']."?error=Error query");
            exit();
        } else {
            mysqli_stmt_bind_param($init, "sss", $_SESSION['id'], $text, $_POST['comment-submit']);
            mysqli_stmt_execute($init);

            header("Location: ../../". $_SESSION['type']. ".php?name=.".$_SESSION['listname']."?comment=added");
            exit();
        }
    }


 } else {
    header("Location: ../../". $_SESSION['type']. ".php?name=.".$_SESSION['listname']."?error=Why are you here? just to suffer?");
    exit();
 }
   

  


?>