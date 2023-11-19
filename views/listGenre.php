<?php
include "../controller/GenreC.php";

$g = new GenreC();
$tab = $g->afficheGenres();

?>
<center>
    <h1>List of genres</h1>
    <h2>
        <a href="addGenre.php">Add genre</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Genre</th>
        <th>Nom Genre</th>
        <th>Action 1</th>
        <th>Action 2</th>
           </tr>
    <?php
    foreach ($tab as $genre) {
    ?>
        <tr>
            <td><?= $genre['idGenre']; ?></td>
            <td><?= $genre['nom']; ?></td>
                 <td align="center">
                <form method="POST" action="updateJoueur.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $genre['idGenre']; ?> name="idGenre">
                </form>
            </td>
            <td>
                <a href="deleteJoueur.php?id=<?php echo $genre['idGenre']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>