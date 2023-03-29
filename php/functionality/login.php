<?php
if (isset($_POST['login-submit'])){

    require "db.php";

    $email = $_POST['login'];
    $password = $_POST['password'];

    if(empty($password)) {
        header("Location: ../../login.php?error=Podaj hasło");
        exit();
    } else if (empty($email)) {
        header("Location: ../../login.php?error=Podaj adres e-mail");
        exit();
    } else {
        $query = "SELECT * from users WHERE email=?;";
        $init = mysqli_stmt_init($connection);
    
        if (!mysqli_stmt_prepare($init, $query)) {
            header("Location: ../../login.php?error=stmterror");
            exit();
        } else {
            mysqli_stmt_bind_param($init, "s", $email);
            mysqli_stmt_execute($init);
            $result = mysqli_stmt_get_result($init);

            if ($userData = mysqli_fetch_assoc($result)) {

                $weryfikacja = password_verify($password, $userData['password']);

                if (!$weryfikacja) {
                    header("Location: ../../login.php?error=Nieprawidłowe hasło");
                    exit();
                } else {
                    // logowanie
                    session_start();
                    $_SESSION['id'] = $userData['id'];
                    $_SESSION['username'] = $userData['username'];
                    $_SESSION['admin'] = $userData['isAdmin'];
                    $_SESSION['date'] = $userData['createdOn'];
                    header("Location: ../../index.php?loggedin=true");
                    exit();
                }


            } else {
                header("Location: ../../login.php?error=Podany użytkownik nie istnieje");
                exit();
            }
        }
    }

    




} else {
    header("Location: ../../login.php?error=Tak nie wolno");
    exit();
}


?>