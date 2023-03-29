<?php
session_start();

if(isset($_POST['submit'])){
    require 'db.php';
    $old_password = $_POST['password'];
    $new_password = $_POST['passwordRepeat'];

    // if (!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$", $new_password)){
    //     header("Location: ../../user.php?error=Niepoprawne hasło&login=".$username."&email=".$email);
    //     exit();
    // }
   
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
      
        if(password_verify($old_password, $result['password'])){
            $query = "UPDATE users SET password = ? WHERE id = ?";
            $init = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($init, $query)) {
                header("Location: ../../user.php?error=dunno");
                exit();
            } else {
                $securedPassword = password_hash($new_password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($init, "ss", $securedPassword, $_SESSION['id']);
                mysqli_stmt_execute($init);
                header("Location: ../../user.php?success=Hasło zmienione");
                exit();
            }
        } else {
            header("Location: ../../user.php?error=Nieprawidłowe hasło");
            exit();
        }
    }
}
else {
    header("Location: ../../user.php?error=Something's wrong, I can feel it");
    exit();
}


?>