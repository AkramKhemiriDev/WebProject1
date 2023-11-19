<?php

require_once  '../Controller/GenreC.php';
require_once  '../model/Genre.php';

$error = "";

// create genre
$genre = null;

// create an instance of the controller
$genreC = new GenreC();
if (
    isset($_POST["nom"]) 
) {
    if (
        !empty($_POST['nom']) 
    ) {
        $genre = new Genre(
            null,
            $_POST['nom']
        );
        $genreC->addGenre($genre);
        header('Location:listGenre.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joueur </title>
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
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
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