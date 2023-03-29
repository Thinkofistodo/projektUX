<?php 
    
    include './php/components/header.php';
    require './php/functionality/db.php';
        if(!isset($_GET['name']) || !isset($_GET['id'])) {
            $query = "SELECT name, id FROM lists where type = 'programowanie' LIMIT 1";
            $results = $connection->query($query);
            $row = mysqli_fetch_assoc($results); 
            $listname = $row['name'];
            $listid = $row['id'];
        } else {
            $listname = $_GET['name'];
            $listid = $_GET['id'];
        }
    $commentIndex = 0;
    $disableComments = false;
    if(empty($id)){
        $disableComments = true;
    }
    $isAdmin = "";
    if(isset($_SESSION['admin'])){
        $_SESSION['type'] = "programowanie";
        $_SESSION['listname'] = $listname;
        $isAdmin = $_SESSION['admin'];
    }
    
?>

<main class="main posts">
    <section class="excercises">
        <div class="excercises-wrap">
            <h2 class="excercises-wrap_name h2">Programowanie</h2>
            <?php   
                $query = "SELECT name FROM lists WHERE type = 'programowanie'";
                $results = $connection->query($query);
                echo '<select class="excercises-wrap_listSelect">';
                while($row = mysqli_fetch_assoc($results)){
                    echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                } 
                echo '</select>';
            ?>
            <script>
                const select = document.querySelector('.excercises-wrap_listSelect');
                select.addEventListener("change", ()=>location.replace(`./programowanie.php?${select.value}`))
            </script>    
        </div>
        <h3 class="excercises-list h3"><?php echo $listname ?></h3>
        <!-- TUTAJ BĘDĄ POSTY-->
        <?php
            $query = "SELECT excercises.id, title, description, solution FROM excercises JOIN lists ON excercises.list_id = lists.id WHERE excercises.list_id = ?";
            $init = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($init, $query)) {
                echo "Errors happenes xD";
            } 
            else {
                mysqli_stmt_bind_param($init, "s", $listid);
                mysqli_stmt_execute($init);
                $results = mysqli_stmt_get_result($init);
                while($row = mysqli_fetch_assoc($results)){
                    echo '<article class="excercises-excercise">';
                    $showID = $isAdmin ? '<span style="font-size: 0.5em;"><br>#ID '.$row['id'].'</span>' : "";
                    echo '<h2 class="excercises-excercise_name h2" id="'.$row['title'].'">'.$row['title'].$showID.'</h2>';
                    echo '<p class="excercises-excercise_description">'.$row['description'].'</p>';
                    echo '<h4  class="excercises-excercise_solution h4">ROZWIĄZANIE</h4>';
                    echo '<pre class="excercises-excercise_code language-c"><code class="language-c">'.$row['solution'].'</code> </pre>';
                    echo '
                    <form action="./php/functionality/sendComment.php" class="excercises-form" method="POST">
                        <img src="./src/none.png" alt="" class="excercises-form_userImage">
        
                        <div class="excercises-form_wrap">
                            
                            <textarea class="excercises-form_textarea" name="text" id=""  maxlength="300" placeholder=';
                        if($disableComments){
                            echo '"Zaloguj się, aby komentować" disabled ';
                        } else {
                            echo "Napisz komentarz...";
                        }
                          echo '></textarea>
                          <button type="submit" value="'.$row['id'].'"name="comment-submit" class="btn2 btnL excercises-form_submit"';
                    if($disableComments){
                        echo 'disabled';
                    }
                    echo '>Prześlij</button>
                        </div>
                    </form>
                    ';
                    // comments
                    echo '<section data-id='.$commentIndex.' class="excercises-comments">';
                    $commentQuery = "SELECT comments.id, comments.text, users.image, users.username, comments.createdOn FROM comments JOIN users ON users.id = comments.user_id JOIN excercises ON comments.excercise_id = excercises.id WHERE excercises.id = ? ORDER BY comments.createdOn DESC";
                    $commentInit  = mysqli_stmt_init($connection);
                    if (!mysqli_stmt_prepare($commentInit, $commentQuery)) {
                        echo "Errors happenes xD";
                    } else {
                        mysqli_stmt_bind_param($commentInit, "s", $row['id']);
                        mysqli_stmt_execute($commentInit);
                        $commentResult = mysqli_stmt_get_result($commentInit);
                     
                        while($commentRow = mysqli_fetch_assoc($commentResult)){
                            echo '<article class="excercises-comments_comment">';
                                echo ' <div class="excercises-comments_comment--wrap">
                                    <img src="./src/none.png" alt="" class="excercises-comments_comment--userImage">
                                    <p class="excercises-comments_comment--username h5">'.$commentRow['username'];
                                        $showID = $isAdmin ? '<br>id '.$commentRow['id'] : "";
                                        echo '<br> <span class="excercises-comments_comment--date">'.substr($commentRow['createdOn'],0,-3).$showID.'</span>
                                        
                                    </p>
                                </div>
                                <p class="excercises-comments_comment--text">'.$commentRow['text'].'</p>';
                            echo '</article>';
                        }
                    }
                    echo '</section>';
                    
                   echo '<button data-id='.$commentIndex++.' class="excercises-excercise_toggleComments btn2 btnL">Schowaj komentarze</button> </article>';
                }
            }
        ?>
    </section>

    <aside class="sidebar">
        <nav class="sidebar-navigation">  
            <h3 class="sidebar-navigation_title h3">Listy</h3>
            <ul class="sidebar-navigation_list">
            <?php
                $query = "SELECT id, name FROM lists WHERE type = 'programowanie'";
                $results = $connection->query($query);
                while($row = mysqli_fetch_assoc($results)){
                    echo '<li><a class="sidebar-navigation_list--link h5" href="./programowanie.php?name='.$row['name'].'&id='.$row['id'].'#">'.$row['name'].'</a></li>';
                } 
            ?>
            </ul>
        </nav>
        <nav class="sidebar-navigation">  
            <h3 class="sidebar-navigation_title h3">Zadania</h3>
            <ul class="sidebar-navigation_list">
            <?php
                $query = "SELECT excercises.title, lists.name FROM excercises JOIN lists ON excercises.list_id = lists.id WHERE excercises.list_id = ?";
                $init = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($init, $query)) {
                    echo "Errors happenes xD";
                } 
                
                else {
                    mysqli_stmt_bind_param($init, "s", $listid);
                    mysqli_stmt_execute($init);
                    $results = mysqli_stmt_get_result($init);
                    while($row = mysqli_fetch_assoc($results)){
                        echo '<li><a class="sidebar-navigation_list--link h5" href="./programowanie.php?name='.$row['name'].'#'.$row['title'].'">'.$row['title'].'</a></li>';
                    }

                }
            ?>
            </ul>
        </nav>
    </aside>
    <script src="./js/prism.js"></script>
    <script src="./js/commentButtons.js"></script>
    <script src="./js/programming.js"></script>
    <script src="./js/textarea.js"></script>
</main>
    
<?php include './php/components/footer.php'; ?>

<!-- DODAĆ ZDJĘCIE UŻYTKOWNIKA -->