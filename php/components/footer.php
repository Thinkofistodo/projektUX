<?php
echo <<<HTML
    <footer class="footer">
        <nav class="footer-navigation">
            <ul class="footer-navigation_list">
                <li><a class="footer-navigation_list--link" href="index.php">Strona Główna</a></li>    
                <li><a class="footer-navigation_list--link" href="programowanie.php">Programowanie</a></li>    
                <li><a class="footer-navigation_list--link" href="algorytmy.php">Algorytmy</a></li>    
                <li><a class="footer-navigation_list--link" href="user.php">Panel Użytkownika</a></li>    
                <li><a class="footer-navigation_list--link" href="#nav">Przejdź na górę strony</a></li>    
            </ul>
        </nav>
        <hr class="footer-hr">
        <article class="footer-textWrap">
            <img class="footer-textWrap_logo" src="./src/logoUP.png" alt="Logo Uniwersytetu Pedagogicznego">
            <p> 
                Uniwersytet Pedagogiczny im. Edukacji Narodowej w Krakowie<br>
                Dawid Chawrona 160924<br>
                Informatyka rok 1, studia stacjonarne pierwszego stopnia
            </p>
        </article>
     </footer>
     </div>
     <script src="./js/mobileMenu.js"></script>
     </body>
     </html>
    HTML;
?>  