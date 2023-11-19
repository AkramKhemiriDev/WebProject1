<?php
require_once '../Controller/GenreC.php';
require_once '../model/Genre.php';
$error = "";

// create client
$joueur = null;
// create an instance of the controller
$joueurC = new GenreC();


if (
    isset($_POST["nom"]) 
) {
    if (
        !empty($_POST['nom']) 
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $joueur = new Genre(
            null,
            $_POST['nom']
           
        );
        var_dump($joueur);
        
        $joueurC->updateGenre($joueur, $_POST['idGenre']);

        header('Location:listGenre.php');
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
    <button><a href="listGenre.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php

    if (isset($_POST['idGenre'])) 
    {
        $joueur = $joueurC->showGenre($_POST['idGenre']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="idGenre" name="idGenre" value="<?php echo $_POST['idGenre'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $joueur['nom'] ?>" />
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
    <?php
    }
    ?>
</body>

</html>