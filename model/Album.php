<?php
class Album
{
    private ?int $idAlbum = null;
    private ?string $titre = null;
    private ?float $prix = null;
    private ?string $image = null;
    private ?string $genre = null;

    public function __construct($id = null, $n, $p, $a, $d)
    {
        $this->idAlbum = $id;
        $this->titre = $n;
        $this->prix = $p;
        $this->image = $a;
        $this->genre = $d;
    }


    public function getIdAlbum()
    {
        return $this->idAlbum;
    }


    public function getTitre()
    {
        return $this->titre;
    }


    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }


    public function getPrix()
    {
        return $this->prix;
    }


    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }


    public function getGenre()
    {
        return $this->genre;
    }


    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }
}
