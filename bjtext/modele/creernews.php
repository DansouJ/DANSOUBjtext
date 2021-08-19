<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
</head>
    <body>
        <h1>Ajout des news</h1>
        <div><a href="/admin/index.php">Revenir à la page d'accueil</a></div><br>
        <form action="" method="POST">
            <div>
                <label for="news_titre">Titre : </label>
                <input type="text" name="news_titre" id="news_titre" value="<?php if(isset($_POST['news_titre'])) echo($_POST['news_titre']); ?>" required>
            </div><br>
            <div>
                <label for="news_description">Description : </label>
                <input type="text" name="news_description" id="news_description" value="<?php if(isset($_POST['news_description'])) echo($_POST['news_description']); ?>" required>
            </div><br>
            <div>  
                <label for="news_contenutext">Contenu : </label>
                <input type="text" name="news_contenutext" id="news_contenutext" value="<?php if(isset($_POST['news_contenutext'])) echo($_POST['news_contenutext']); ?>" required>
            </div><br>
                <label for="news_image">Image : </label>
                <input type="text" name="news_image" id="news_image" value="<?php if(isset($_POST['news_image'])) echo($_POST['news_image']); ?>" required>
            </div><br>
                <label for="news_date">Date : </label>
                <input type="date" name="news_date" id="news_date" value="<?php if(isset($_POST['news_date'])) echo($_POST['news_date']); ?>" required>
            </div><br>
            <div>
                <label for="slug">slug : </label>
                <input type="text" name="slug" id="slug" value="<?php if(isset($_POST['slug'])) echo($_POST['slug']); ?>" required>
            </div><br>
            <div><input type="submit" name="creer" Value="Créer"></div>
        </form>
        <?php
            if(isset($_POST['creer'])){
                if(!empty($_POST['news_titre']) && !empty($_POST['news_description']) && !empty($_POST['news_contenutext']) && !empty($_POST['news_image']) && !empty($_POST['news_date']) && !empty($_POST['slug'])){
                    $news_titre = htmlspecialchars($_POST['news_titre']);
                    $news_description = htmlspecialchars($_POST['news_description']);
                    $news_contenutext = htmlspecialchars($_POST['news_contenutext']);
                    $news_image = htmlspecialchars($_POST['news_image']);
                    $news_date = htmlspecialchars($_POST['news_date']);
                    $slug = htmlspecialchars($_POST['slug']);
                    //Connexion à la bd
                    try{
                        $bdd = new PDO("mysql:host=localhost;dbname=bjtext;charset=utf8","root","", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    }
                    catch(Exception $e){
                        die('Erreur : '.$e->getMessage());
                    }
                    //Préparation de la requête d'insertion
                    $requete = $bdd->prepare("INSERT INTO abw_news VALUES (?,?,?,?,?,?)");
                    //Passages des paramètres à la requête
                    try{
                        $resultat = $requete->execute(array($news_titre,$news_description,$news_contenutext,$news_image,$news_date,$slug));
                        if($resultat){
                            echo "<div style='color: green;'>L'actualités ".$news_titre." a été enregistré.</div>";
                        }
                    }
                    catch(Exception $e){
                        echo "<div style='color: red;'>Ajout impossible !!!</div>";
                    }
                }
                else{
                    echo "<div style='color: red;'>Veuillez renseigner tous les champs !!!</div>";
                }
            }
        ?>
    </body>
</html>