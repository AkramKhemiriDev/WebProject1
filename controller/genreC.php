<?php

require '../config.php';

class GenreC {

    public function addGenre($genre)
    {
        $sql = "INSERT INTO Genre  
        VALUES (NULL, :nom)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $genre->getNom(),
                        ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }




    public function affichGenres()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM Genre";
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }



 

    


    public function afficheAlbums($idGenre) {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM album WHERE genre = :id");
            $query->execute(['id' => $idGenre]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function afficheGenres() {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM genre");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



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