<?php include './php/components/header.php'; ?>
<?php 
        if (isset($_GET["error"])){
            echo '<h2 class="userPanelError h2">'.$_GET["error"].'</h2>';
        }

        if (isset($_GET["success"])){
            echo '<h2 class="userPanelError succes h2">'.$_GET["success"].'</h2>';
        }
    
?>
<main class="main">
    <form class="login" action="./php/functionality/login.php" method="POST">
        <h1 class="form-title">Zaloguj się</h1>
        <?php 
            if(isset($_GET['error'])){
                echo '<h5 class="h5 error">'.$_GET['error'].'</h5>' ;
            }
        ?>
        <label for="login">E-mail:</label>
        <input type="text" name="login" class="login-form_login" placeholder="example@address.com">
        <label for="password">Hasło:</label>
        <input type="password" name="password" class="login-form_password" placeholder="Hasło123!">
        <button type="submit" class="login-form_button btn2 btnL" name="login-submit"> Zaloguj </button>
    </form>
</main>
    
<?php include './php/components/footer.php'; ?>