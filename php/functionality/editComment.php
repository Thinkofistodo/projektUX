<?php
if(isset($_POST['submit'])){
    require 'db.php';
    $id = $_POST['id'];
    $text = $_POST['text'];
   
    $query = "UPDATE comments SET text = ? WHERE id = ?";

    $init = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($init, $query)) {
        header("Location: ../../user.php?error=dunno");
        exit();
    } 
    else {
        mysqli_stmt_bind_param($init, "ss", $text, $id);
        mysqli_stmt_execute($init);
        header("Location: ../../user.php?success=Komentarz zedytowany");
        exit();
    }
}
else {
    header("Location: ../../user.php?error=Something's wrong, I can feel it");
    exit();
}
?>