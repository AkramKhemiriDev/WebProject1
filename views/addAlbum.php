<?php


require_once "../controller/GenreC.php";
require_once '../model/Album.php';

$genreC = new GenreC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['genre']) && isset($_POST['search'])) {
        $idGenre = $_POST['genre'];
        $list = $genreC->afficheAlbums($idGenre);
    }
}

$genres = $genreC->afficheGenres();





$error = "";

// create client
$album = null;




// create an instance of the controller
$albumC = new GenreC();
if (
    isset($_POST["titre"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["image"]) &&
    isset($_POST["genre"])
) {
    if (
        !empty($_POST['titre']) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["image"]) &&
        !empty($_POST["genre"])
    ) {
        $album = new Album(
            null,
            $_POST['titre'],
            $_POST['prix'],
            $_POST['image'],
            $_POST['genre']
        );
        $albumC->addAlbum($album);
        
       // header('Location:listJoueurs.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
</head>

<body>
    <a href="listJoueurs.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="titre">titre :</label></td>
                <td>
                    <input type="text" id="titre" name="titre" />
                    <span id="erreurTitre" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prix">Prix :</label></td>
                <td>
                    <input type="text" id="prix" name="prix" />
                    <span id="erreurPrix" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="image">Image :</label></td>
                <td>
                    <input type="text" id="image" name="image" />
                    <span id="erreurImage" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="genre">Genre :</label></td>
                <td>
                <select name="genre" id="genre">
            <?php
            foreach ($genres as $genre) {
                echo '<option value="' . $genre['idGenre'] . '">' . $genre['nom'] . '</option>';
            }
            ?>
        </select>
                    <span id="erreurGenre" style="color: red"></span>
                </td>
            </tr>


            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
</body>

</html>