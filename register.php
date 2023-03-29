<?php include './php/components/header.php'; ?>

<main class="main">
    <form class="register" action="./php/functionality/register.php" method="POST">
        <h1 class="form-title">Zarejestruj się</h1>
        <?php 
            if(isset($_GET['error'])){
                echo '<h5 class="h5 error">'.$_GET['error'].'</h5>' ;
            }

        ?>
        <label for="login">Nazwa Użytkownika:</label>
        <!-- max 13 znaków -->
        <input type="text" name="login" class="register-form_register" placeholder="Feldmarszałek123">
        <label for="login">Adres e-mail:</label>
        <input type="text" name="email" class="register-form_register" placeholder="example@address.com">

        <label for="password">Hasło:</label>
        <input type="password" name="password" class="register-form_password" placeholder="************">
        <label for="password">Powtórz hasło:</label>
        <input type="password" name="passwordRepeat" class="register-form_password--repeat" placeholder="************">
        <article class="register-information">
            <p>Hasło powinno zawierać:</p>
            <ul>
                <li>Od 8 do 16 znaków</li>
                <li>Przynajmniej jedną wielką literę</li>
                <li>Przynajmniej jedną cyfrę</li>
                <li>Przynajmniej jeden znak specjalny</li>
            </ul>
        </article>
        <button type="submit" class="register-form_button btn2 btnL" name="register-submit">Załóż Konto</button>
    </form>
</main>
    
<?php include './php/components/footer.php'; ?>