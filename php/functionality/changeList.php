<?php
if(isset($_POST['submit'])){
    require 'db.php';
    $type = $_POST['type'];
    $text = $_POST['listname'];
    $id = $_POST['id'];

    if($id == "" && $type == ""){
        header("Location: ../../user.php?error=Wybierz typ listy");
        exit();
    }

    if($id != ""){
        // EDYTUJEMY
        $id = $_POST['id'];
        $query = "SELECT * FROM lists WHERE id = ?";
        $init = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($init, $query)) {
            header("Location: ../../user.php?error=dunno");
            exit();
        } else {
            mysqli_stmt_bind_param($init, "s", $id);
            mysqli_stmt_execute($init);
            mysqli_stmt_store_result($init);
            $resultNumber = mysqli_stmt_num_rows($init);
            if($resultNumber > 0){
                $query = "UPDATE lists SET name = ? WHERE id = ?";
                $init = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($init, $query)) {
                    header("Location: ../../user.php?error=dunno");
                    exit();
                } else {
                    mysqli_stmt_bind_param($init, "ss", $text, $id);
                    mysqli_stmt_execute($init);
                    header("Location: ../../user.php?success=Lista została zmodyfikowana");
                    exit();
                }


            } else {
                header("Location: ../../user.php?success=Listy o tym ID nie istnieje");
                exit();
            }
        }

    } else {
        $query = "INSERT INTO lists (name, type) VALUES (?, ?)";
        $init = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($init, $query)) {
            header("Location: ../../user.php?error=dunno");
            exit();
        } else {
            mysqli_stmt_bind_param($init, "ss", $text, $type);
            mysqli_stmt_execute($init);
            header("Location: ../../user.php?success=Lista została dodana");
            exit();
        }

    }
     
} else {
    header("Location: ../../user.php?error=Something's wrong, I can feel it");
    exit();
}
?>