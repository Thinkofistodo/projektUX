<?php
session_start();

if(isset($_POST['submit'])){
    require 'db.php';
    $new_login = $_POST['login'];
    $query = "UPDATE users SET username = ? WHERE id = ?";
    $init = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($init, $query)) {
        header("Location: ../../user.php?error=dunno");
        exit();
    } 
    else {
        mysqli_stmt_bind_param($init, "ss", $new_login, $_SESSION['id']);
        mysqli_stmt_execute($init);
        $_SESSION['username'] = $new_login;
        header("Location: ../../user.php?success=Login zmieniony");
        exit();
    }
}
else {
    header("Location: ../../user.php?error=Something's wrong, I can feel it");
    exit();
}
?>