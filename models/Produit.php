<?php



class Produit
{
    protected string $nom;
    protected float $prix;
    private int $quantite;
    private $photo; // Type non spécifié pour la photo

    private float $prixTotal;

    public function __construct(string $nom, float $prix, int $quantite, $photo)
    {

        $this->nom = $nom;
        $this->prix = $prix;
        $this->quantite = $quantite;
        $this->photo = $photo;


    }

    public function getNom(): string
    {
        if ($this->nom == "") {
            return "nom non defini";
        } else {
            return $this->nom;
        }
    }

    public function getPrix(): string
    {
        if ($this->prix == "") {
            return "prix non defini";
        } else {
            return number_format($this->prix, 2);
        }
    }

    public function getQuantite(): string
    {
        if ($this->quantite == "") {
            return "quantite non defini";
        } else {
            return $this->quantite;
        }
    }
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function getPhoto()
    {
        return $this->photo;
    }
    public function getPrixTotal(): float
    {
        return number_format($this->prix * $this->quantite,2);

    }




}