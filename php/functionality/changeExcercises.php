<?php
session_start();
if(isset($_POST['submit'])){
    require 'db.php';
    $listid = $_POST['listid'];
    $name = $_POST['name'];
    $id = $_POST['id'];
    $description = $_POST['description'];
    $solution = $_POST['solution'];


    if($id == "" && $listid == ""){
        header("Location: ../../user.php?error=Wybierz listę");
        exit();
    } 

    if($solution == "" && $description == ""){
        header("Location: ../../user.php?error=Opis lub rozwiązanie jest wymagane");
        exit();
    } 

    if($id != "") {
        if($solution == "" || $description == "" || $name == ""){
            header("Location: ../../user.php?error=Wypełnij wymagane pola");
            exit(); 
        } else {
            $query = "UPDATE excercises SET title = ?, solution = ?, description = ? WHERE id = ?";
            $init = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($init, $query)) {
                header("Location: ../../user.php?error=dunno");
                exit();
            } else {
                mysqli_stmt_bind_param($init, "sssi", $name, $solution, $description, $id);
                mysqli_stmt_execute($init);
                header("Location: ../../user.php?success=Zadanie Zedytowane");
                exit();
            }
        }

    } else {
        if($solution == "" || $description == "" || $name == "" || $listid == "") {
            header("Location: ../../user.php?error=Wypełnij wymagane pola");
            exit();
        } 
        $query = "INSERT INTO excercises (title, description, solution, user_id, list_id) VALUES (?,?,?,?,?)";
        $init = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($init, $query)) {
            header("Location: ../../user.php?error=dunno");
            exit();
        } else {
            mysqli_stmt_bind_param($init, "sssii", $name, $description, $solution, $_SESSION['id'], $listid);
            mysqli_stmt_execute($init);
            header("Location: ../../user.php?success=Zadanie Dodane");
            exit();
        }
    }


}
else {
    header("Location: ../../user.php?error=Something's wrong, I can feel it");
    exit();
}
?>