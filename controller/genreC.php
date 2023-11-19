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

    function deleteGenre($ide)
    {
        $sql = "DELETE FROM Genre WHERE idGenre = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    
    function showGenre($id)
    {
        $sql = "SELECT * from Genre where idGenre = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $joueur = $query->fetch();
            return $joueur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    function updateGenre($joueur, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Genre SET 
                    nom = :nom
                    WHERE idGenre= :idGenre'
            );
            
            $query->execute([
                'idGenre' => $id,
                'nom' => $joueur->getNom(),
               
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
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


    public function afficheAlbums2() {
        $db = config::getConnexion();
        $sql = "SELECT * FROM Album";
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
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




    function deleteAlbum($ide)
    {
        $sql = "DELETE FROM Album WHERE idAlbum = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function showAlbum($id)
    {
        $sql = "SELECT * from Album where idAlbum = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $joueur = $query->fetch();
            return $joueur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    function updateAlbum($j, $ide)
    {   
       
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Album SET 
                    titre = :titre, 
                    prix = :prix, 
                   genre = :genre
                WHERE id= :idAlbum'
            );
            try {
            $query->execute([
                'idAlbum' => $ide,
                'titre' => $j->getTitre(),
                'prix' => $j->getPrix(),
               'genre' => $j->getGenre(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



}