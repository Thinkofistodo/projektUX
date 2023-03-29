<?php include './php/components/header.php'; ?>
<?php 
if(!isset($_SESSION['id'])){
    header("Location: ./index.php?error='Nie wolno'");
    exit();
}

?>
<main class="main user">
    <?php 
        if (isset($_GET["error"])){
            echo '<h2 class="userPanelError h2">'.$_GET["error"].'</h2>';
        }

        if (isset($_GET["success"])){
            echo '<h2 class="userPanelError succes h2">'.$_GET["success"].'</h2>';
        }
    
    ?>
    <h2 class="user-title h2">Panel Użytkownika</h2>
    <section class="userPanel">

        <section class="user-data">
            <h3 class="user-data_title h3"><?php echo $_SESSION['username']?></h3>
            <img src="./src/none.png" alt="" class="user-data_image">
            <p class="user-data_name h6">Data dołączenia:<br>
            <span class="user-data_date"><?php echo substr($_SESSION['date'],0,-3);?></span></p>
        </section>

        <div class="user-wrap">
            <section class="user-login">
                <h3 class="user-login_title h3">Zmień login</h3>
                <form action="./php/functionality/changeLogin.php" method="POST" class="user-login_form">
                    <input class="user-login_form--input" type="text" name="login" placeholder="Nowy Login">
                    <button class="user-login_form--submit  btn2 btnM" type="submit" name="submit">Potwierdź</button>
                </form>
            </section>
            <section class="user-image">
                <h3 class="user-image_title h3">Zmień Zdjęcie</h3>
                <form action="" class="user-image_form">
                    <input type="file" name="image" class="user-image_form--input">
                    <button type="submit" name="submit" class="user-image_form--submit btn2 btnM">Potwierdź</button>
                </form>
            </section>

            <section class="user-password">
                <h3 class="user-password_title h3">Zmień hasło</h3>
                <form action="./php/functionality/changePassword.php" method="POST"  class="user-password_form">
                    <input type="password" name="password" class="user-password_form--password" placeholder="Stare hasło">
                    <input type="password" name="passwordRepeat" class="user-password_form--passwordRepeat" placeholder="Nowe hasło">
                    <button type="submit" name="submit" class="user-password_form--submit btn2 btnM">Potwierdź</button>
                </form>
            </section>

            <section class="user-delete">
            <h3 class="user-delete_title h3">Usuń konto</h3>
                <form action="./php/functionality/deleteAccount.php" method="POST" class="user-delete_form">
                    <input type="password" name="password" class="user-delete_form--password" placeholder="Hasło">
                    <input type="password" name="passwordRepeat" class="user-delete_form--passwordRepeat" placeholder="Powtórz hasło">
                    <button class="user-delete_form--submit btn4 btnM" type="submit" name="submit">Usuń</button>
                </form>
            </section>
        </div>
    </section>

<?php 

if($_SESSION['admin'] == 1) {
    echo '
    <h2 class="admin-title h2">Panel Administratora</h2>
    
    <section class="adminPanel">
        <section class="admin-excercises">
            <h3 class="admin-excercises_title h3">Zadania</h3>
            <form action="./php/functionality/changeExcercises.php" method="POST" class="admin-excercises_form">

                <select name="listid" id="" class="admin-excercises_form--list">
                <option value="" selected="selected">Wybierz, jeżeli tworzysz nowe zadanie</option>';
                require './php/functionality/db.php';
                    $query = "SELECT id, name, type FROM lists";
                    $results = $connection->query($query);
                    while($row = mysqli_fetch_assoc($results)){
                        echo '<option value="'.$row['id'].'">';
                        echo $row['type'].": ".$row['name'];
                        echo '</option>';
                    }
                echo '
                </select>

                <input type="text" name="name" placeholder="Nazwa zadania" class="admin-excercises_form--name">
                <input type="number" name="id" placeholder="ID Zadania" class="admin-excercises_id">
                <textarea name="description" id="" class="admin-excercises_form--description" placeholder="Opis"></textarea>
                <textarea name="solution" id="" class="admin-excercises_form--solution" placeholder="Kod"></textarea>
                <button type="submit" name="submit" class=" btnM btn2 admin-excercises_form--submit">Dodaj</button>
            </form>
        </section>

        <section class="admin-lists">
            <h3 class="admin-lists_title h3">Listy</h3>
            <form action="./php/functionality/changeList.php" method="POST" class="admin-lists_form">
                <select name="type" id="" class="admin-lists_form--type">
                    <option value="" selected="selected">Wybierz, jeżeli tworzysz nową listę</option>
                    <option value="programowanie">Programowanie</option>
                    <option value="algorytmy">Algorytmy</option>
                </select>
                <input type="text" name="listname" placeholder="Nazwa Listy" class="admin-lists_form--name">
                <input type="text" name="id" placeholder="ID listy " class="admin-lists_id">
                <button type="submit" name="submit" class=" btnM btn2 admin-lists_form--submit">Dodaj</button>
            </form>
        </section>

        <section class="admin-comments">
            <h3 class="admin-comments_title h3">Komentarze</h3>
            <form action="./php/functionality/editComment.php" method="POST" class="admin-comments_form">
                <input type="number" name="id" placeholder="ID komentarza" class="admin-comments_id">
                <textarea name="text" class="admin-comments_form--comment" placeholder="Treść Komentarza"></textarea>
                <button type="submit" name="submit" class=" btnM btn2 admin-comments_form--submit">Edytuj</button>
            </form>
        </section>

        <section class="admin-delete">
            <h3 class="admin-delete_title h3">Usuwanie treści</h3>
            <form action="./php/functionality/adminDelete.php" method="POST" class="admin-delete_form">
                <select name="table" class="admin-delete_form--type">
                    <option value="lists">Lista</option>
                    <option value="excercises">Zadanie</option>
                    <option value="comments">Komentarz</option>
                    <option value="users">Użytkownik</option>
                </select>
                <input type="number"  name="id" placeholder="ID komentarza" class="admin-delete_id">
                <button type="submit" name="submit" class=" btnM btn4 admin-delete_form--submit">Usuń</button>
            </form>
        </section>


    </section>';
}
?>
    <script src="./js/textarea.js"></script>
</main>
<?php include './php/components/footer.php'; ?>