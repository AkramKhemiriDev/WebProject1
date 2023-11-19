<?php
require_once  '../Controller/GenreC.php';
$clientC = new GenreC();
$clientC->deleteAlbum($_GET["id"]);
header('Location:listAlbum.php');
