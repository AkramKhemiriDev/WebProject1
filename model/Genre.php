<?php
class Genre
{
    private ?int $idGenre = null;
    private ?string $nom = null;

    public function __construct($id = null, $n)
    {
        $this->idGenre = $id;
        $this->nom = $n;
       
    }


    public function getIdGenre()
    {
        return $this->idGenre;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

}
