<?php
require_once  '../Controller/GenreC.php';
$clientC = new GenreC();
$clientC->deleteGenre($_GET["id"]);
header('Location:listAlbum.php');
