<?php
if(isset($_POST['register-submit'])){
    require 'db.php';

    $username = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];

    if(empty($username ) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("Location: ../../register.php?error=Brak podanego adresu email");
        exit();

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../../register.php?error=Niepoprawny login i hasło");
        exit();
    }
    // https://www.w3schools.com/php/php_form_url_email.asp
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../../register.php?error=Niepoprawny adres email&login=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) || strlen($username) > 16 || strlen($username) < 3){
        header("Location: ../../register.php?error=Niepoprawna nazwa użytkownika");
        exit();
    }
    else if ($password != $passwordRepeat){
        header("Location: ../../register.php?error=Oba hasła muszą być takie same");
        exit();
    } 
    // else if (!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$", $password)){
    //     header("Location: ../../register.php?error=Niepoprawne hasło");
    //     exit();
    // }
    else {
        $query = "SELECT id FROM users WHERE username=? OR email=?;";
        $init = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($init, $query)) {
            header("Location: ../../register.php?error=stmtquery");
            exit();
        } 
        else {
            // s string b boolean i integer
            mysqli_stmt_bind_param($init, "ss", $username, $email);
            mysqli_stmt_execute($init);
            mysqli_stmt_store_result($init);

            $resultNumber = mysqli_stmt_num_rows($init);

            if($resultNumber > 0){
                header("Location: ../../register.php?error=userexists");
                exit();
            } else {
                $query = "INSERT INTO users (username, email, password, isAdmin) VALUES (?, ?, ?, ?)";
                $init = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($init, $query)) {
                    header("Location: ../../register.php?error=stmtinsert");
                    exit();
                }  else {
                    $date = new DateTime();
                    // Default is bycrypt
                    $securedPassword = password_hash($password, PASSWORD_DEFAULT);
                    // NIE MOŻNA W BIND PARAM PRZEKAZYWAĆ LITERAŁÓW, TYLKO ZMIENNE. GŁUPIE TO JAK CHOLERA
                    $false = 0; // XD
                    mysqli_stmt_bind_param($init, "sssi", $username, $email, $securedPassword, $false);
                    mysqli_stmt_execute($init);

                    header("Location: ../../login.php?success=Konto zostało utworzone");
                    exit();
                }
            }
        }

    }

    mysqli_stmt_close($init);
    mysqli_close($connection);

} else {
    // go back if file opened not by a form
    header("Location: ../../register.php?");
    exit();
}


?>


<!-- UZUPEŁNIANIE FORMULARZA ZWRACANE DANE -->