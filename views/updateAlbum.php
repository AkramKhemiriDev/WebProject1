<?php
require_once "../controller/GenreC.php";
require_once '../model/Album.php';

$error = "";
$genreC = new GenreC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['genre']) && isset($_POST['search'])) {
        $idGenre = $_POST['genre'];
        $list = $genreC->afficheAlbums($idGenre);
    }
}

$genres = $genreC->affichGenres();

// create client
$joueur = null;
// create an instance of the controller
$joueurC = new GenreC();


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
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $joueur = new Album(
            null,
            $_POST['titre'],
            $_POST['prix'],
            $_POST['image'],
            $_POST['genre']
        );
        var_dump($joueur);
        
        $joueurC->updateAlbum($joueur, $_POST['idAlbum']);
        var_dump($joueur);
        header('Location:listAlbum.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listAlbum.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idAlbum'])) {
        $joueur = $joueurC->showAlbum($_POST['idAlbum']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="idAlbum">IdAlbum :</label></td>
                    <td>
                        <input type="text" id="idAlbum" name="idAlbum" value="<?php echo $_POST['idAlbum'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="titre">Titre :</label></td>
                    <td>
                        <input type="text" id="titre" name="titre" value="<?php echo $joueur['titre'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prix">Prix :</label></td>
                    <td>
                        <input type="text" id="prix" name="prix" value="<?php echo $joueur['prix'] ?>" />
                        <span id="erreurPrenom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="image">image :</label></td>
                    <td>
                        <input type="text" id="image" name="image" value="<?php echo $joueur['image'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
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
                        <span id="erreurTelephone" style="color: red"></span>
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
    <?php
    }
    ?>
</body>

</html>