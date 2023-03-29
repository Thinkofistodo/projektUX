<?php include './php/components/header.php'; 
?>
<main class="main">
    <?php 
        if (isset($_GET["error"])){
            echo '<h2 class="userPanelError h2">'.$_GET["error"].'</h2>';
        }

        if (isset($_GET["success"])){
            echo '<h2 class="userPanelError succes h2">'.$_GET["success"].'</h2>';
        }
    
    ?>
    <!-- KARUZELA -->
    <section class="tasks">
        <h2 class="tasks-title h2">
            Najnowsze Zadania
            <i class="fa-solid fa-chevron-left sliderArrow" data-direction="left"></i>
            <i class="fa-solid fa-chevron-right sliderArrow" data-direction="right"></i>
        </h2>
        <div class="tasks-images">
        <?php 
        require './php/functionality/db.php';

        $query = "SELECT lists.name, lists.type, excercises.title, excercises.description, users.username, users.image FROM excercises JOIN lists ON lists.id = excercises.list_id JOIN users ON excercises.user_id = users.id ORDER BY excercises.createdOn ASC limit 6;";
        $results = $connection->query($query);

        $json = array();
        $id = 1;
        while($row = mysqli_fetch_assoc($results)){
            $json[] = array(
                'imgage' => $row['image'],
                'name' => $row['name'],
                'title' => $row['title'],
                'description' => $row['description'],
                'type' => $row['type'],
                'username' => $row['username'],
            );
        }

        foreach ($json as $key => $value){
            // echo $value['zadanie'];
            echo '<article class="taskCard "'.$value['type'].'>';
                echo '<div class="taskCard-wrap">';
                    echo '<div>';
                        echo '<h2 class="taskCard-name">'.$value['title'].'</h2>';
                        echo '<h3 class="taskCard-list">'.$value['name'].'</h3>';
                    echo '</div>';
                    echo '<img src="./src/none.png" class="taskCard-image" alt="Zdjęcie użytkownika, który dodał zadanie">';
                echo '</div>';
                echo '<div class="taskCard-wrap">';
                    echo '<h4 class="taskCard-descriptionTitle">'.$value['type'].'</h4>';
                    echo '<hp class="taskCard-username">'.$value['username'].'</p>';
                echo '</div>';
                echo '<p class="taskCard-description">'.$value['description'].'</p>';
                echo '<a class="taskCard-link btnL ';
                echo ($value['type'] == 'programowanie' ? 'btn2"' : 'btn3"');
                echo ' href="'.$value['type'].'.php?name='.$value['name'].'#'.$value['title'].'">Rozwiązanie</a>';
            echo '</article>';
        };

        for ($i = 0; $i < 4; $i++) {
            $value = $json[$i];
            echo '<article class="taskCard "'.$value['type'].'>';
                echo '<div class="taskCard-wrap">';
                    echo '<div>';
                        echo '<h2 class="taskCard-name">'.$value['title'].'</h2>';
                        echo '<h3 class="taskCard-list">'.$value['name'].'</h3>';
                    echo '</div>';
                    echo '<img src="./src/none.png" class="taskCard-image" alt="Zdjęcie użytkownika, który dodał zadanie">';
                echo '</div>';
                echo '<div class="taskCard-wrap">';
                    echo '<h4 class="taskCard-descriptionTitle">'.$value['type'].'</h4>';
                    echo '<hp class="taskCard-username">'.$value['username'].'</p>';
                echo '</div>';
                echo '<p class="taskCard-description">'.$value['description'].'</p>';
                echo '<a class="taskCard-link btnL ';
                echo ($value['type'] == 'programowanie' ? 'btn2"' : 'btn3"');
                echo ' href="'.$value['type'].'.php?name='.$value['name'].'#'.$value['title'].'">Rozwiązanie</a>';
            echo '</article>';
        }




        ?>
        </div>
    </section>
    <section class="about">
        <!-- OPIS STRONY -->
        <article class="about-article">
            <h2 class="about-article_title h2">O stronie</h2>
            <p class="about-article_text">Strona została stworzona po to, aby dzielić się z innymu studentami z mojego
                roku rozwiązaniami zadań z przedmiotów około programistycznych. Jest to również platforma do wymiany
                informacji, pobierania list zadań i dyskutowania nad rozwiązaniami.
            </p>
        </article>

        <!-- ZDJĘCIE -->
        <img class="about-image" src="./src/about.svg" alt="">
    </section>
    <script src="./js/slider.js"></script>
</main>
<?php include './php/components/footer.php'; ?>