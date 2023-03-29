<?php
session_start();
// sterowanie przyciskami
// 0 - zalogowano
// 1 - niezalogowano
// 
$var = 1;
$username;
$id;
if (isset($_SESSION['username'])){
    $var = 0;
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $isAdmin = $_SESSION['admin'];
}



echo <<<HTML
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/prism.css">
        <script src="https://kit.fontawesome.com/09700efd56.js" crossorigin="anonymous"></script>
        <title>Projekt</title>
    </head>
    <body>
        <div class="container">
        <div class="mobile">
            <i class="fa-solid fa-bars"></i>
            <ul class="mobile-list">
HTML;
    if ($var){
        echo <<<HTML
            <li><a class="mobile-list_link" href="#">Rejestracja</a></li>
            <li><a class="mobile-list_link" href="#">Logowanie</a></li>
        HTML;
    }
    else {
        echo <<<HTML
            <li><a class="mobile-list_link" href="./php/functionality/logout.php">Wyloguj</a></li>
            <li><a class="mobile-list_link" href="user.php">Konto</a></li>
        HTML;
    }
echo <<<HTML
                <li><a class="mobile-list_link" href="algorytmy.php">Algorytmy</a></li>
                <li><a class="mobile-list_link" href="programowanie.php">Programowanie</a></li>
                <li><a class="mobile-list_link" href="#">Strona&nbspGłówna</a></li>
            </ul>
        </div>
        <nav class="navigation" id="nav">
            <ul class="navigation-list">
                <li class="logo">
                    <a href="" class="navigation-list_link logoLink">
                        <img class="logoImage" src="./src/logo.png" alt="">
                        <span class="logoText">hawrona<span>
                    </a>
                </li>
                <li><a href="./index.php" class="navigation-list_link underline">strona główna</a></li>
                <li><a href="programowanie.php" class="navigation-list_link underline">programowanie</a></li>
                <li><a href="algorytmy.php" class="navigation-list_link underline">algorytmy</a></li>
HTML;

if ($var){
echo <<<HTML
                <li class="mla"><a href="login.php" class="navigation-list_link btn1 btnL">zaloguj się</a></li>
                <li><a href="register.php" class="navigation-list_link btn2 btnL">Zarejestruj się</a></li>
HTML;
} else {
    echo '<li class="mla"><a href="user.php" class="navigation-list_link username">'.$username.'</a></li>';
    echo '<li class=""><a href="./php/functionality/logout.php" class="navigation-list_link btn2 btnL">wyloguj się</a></li>';       
}

echo <<<HTML
            </ul>
        </nav> 
HTML;

?>