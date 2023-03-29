<?php
if(isset($_POST['submit'])){
    require 'db.php';
    $id = $_POST['id'];
    $table = $_POST['table'];
   
    if($table == "comments"){
        $query = "DELETE FROM comments WHERE id = ?";
    }
    else if($table == "users"){
        $query = "DELETE FROM users WHERE id = ?";
    }
    else if($table == "lists"){
        $query = "DELETE FROM lists WHERE id = ?";
    }
    if($table == "excercises"){
        $query = "DELETE FROM excercises WHERE id = ?";
    }

    $init = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($init, $query)) {
        header("Location: ../../user.php?error=dunno");
        exit();
    } 
    else {
        mysqli_stmt_bind_param($init, "s", $id);
        mysqli_stmt_execute($init);
        header("Location: ../../user.php?success=Element usunięty");
        exit();
    }
}
else {
    header("Location: ../../user.php?error=Something's wrong, I can feel it");
    exit();
}
?>