<?php

require '../config.php';

class AlbumC
{

    /*
    public function listJoueurs()
    {
        $db = config::getConnexion();
        $query =$db->prepare("SELECT * FROM joueur") ;
        $query->execute();
        try {
            $liste = $query->fetchAll();
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    */



    function addAlbum($album)
    {
        $sql = "INSERT INTO Album  
        VALUES (NULL, :titre,:prix, :imge,:genre)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $album->getTitre(),
                'prix' => $album->getPrix(),
                'imge' => $album->getImage(),
                'genre' => $album->getGenre(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


}
