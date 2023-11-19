<?php
require_once "../controller/GenreC.php";

$a = new GenreC();
$tab = $a->afficheAlbums2();

?>
<center>
    <h1>List of Albums</h1>
    <h2>
        <a href="addAlbum.php">Add Album</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Album</th>
        <th>Titre</th>
        <th>Prix</th>
        <th>image</th>
        <th>genre</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php
    foreach ($tab as $joueur) {
    ?>
        <tr>
            <td><?= $joueur['idAlbum']; ?></td>
            <td><?= $joueur['titre']; ?></td>
            <td><?= $joueur['prix']; ?></td>
            <td><?= $joueur['image']; ?></td>
            <td><?= $joueur['genre']; ?></td>
            <td align="center">
                <form method="POST" action="updateAlbum.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $joueur['idAlbum']; ?> name="idAlbum">
                </form>
            </td>
            <td>
                <a href="deleteAlbum.php?id=<?php echo $joueur['idAlbum']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>