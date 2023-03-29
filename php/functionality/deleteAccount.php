<?php
session_start();

if(isset($_POST['submit'])){
    require 'db.php';
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
    
    if($password != $passwordRepeat) {
        header("Location: ../../user.php?error=Hasła nie są takie same");
        exit();
    }

    $query = "SELECT password FROM users WHERE id = ?";

    $init = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($init, $query)) {
        header("Location: ../../user.php?error=dunno");
        exit();
    } 
    else {
        mysqli_stmt_bind_param($init, "s", $_SESSION['id']);
        mysqli_stmt_execute($init);
        $result = mysqli_fetch_assoc(mysqli_stmt_get_result($init));
      
        if(password_verify($password , $result['password'])){
            $query = "DELETE FROM users WHERE id = ?";
            $init = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($init, $query)) {
                header("Location: ../../user.php?error=dunno");
                exit();
            } else {
                mysqli_stmt_bind_param($init, "s", $_SESSION['id']);
                mysqli_stmt_execute($init);
                header("Location: ../../index.php?success=Konto usunięte");
                session_unset();
                session_destroy();
                exit();
            }
        }    
   
    }
} else {
    header("Location: ../../user.php?error=Something's wrong, I can feel it");
    exit();
}
   
   
   
?>