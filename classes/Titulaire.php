<?php

class Titulaire {
    private string $nom;
    private string $prenom;
    private DateTime $dateNaissance;
    private string $ville;
    private array $comptesBancaire;


public function __construct(string $nom, string $prenom, string $dateNaissance, string $ville) {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->dateNaissance = new DateTime($dateNaissance);
    $this->ville = $ville;
    $this->comptesBancaire = [];
}

    // GETTER & SETTER //
    public function getNom()
    {
        return $this->nom;
    }
   
    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }
   

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }
  

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }
    
    public function setDateNaissance(DateTime $dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }


    public function getVille()
    {
        return $this->ville;
    }

    public function setVille(string $ville)
    {
        $this->ville = $ville;

        return $this;
    }

    // FONCTIONS //
    public function calculerAge() {
        $today = new DateTime();  // DATE D'AUJOURD'HUI
        $age = $this->dateNaissance->diff($today); // DIFF ENTRE DATE NAISSANCE ET TODAY
        return $age->y;
    }

    public function addCompteBancaire(Compte_bancaire $compte) {
        $this->comptesBancaire[] = $compte;
    }

    public function afficherInfosTitulaire() {
        return "<h2>Titulaire : </h2>".
                "Nom : ".$this->nom."<br>".
                "Prénom : ".$this->prenom."<br>".
                "Date de Naissance : ".$this->dateNaissance->format("d/m/Y")."<br>".
                "Ville : ".$this->ville."<br>".
                "Age : ".$this->calculerAge()." ans <br>";
    }

    public function afficherCompteBancaire(){
        $result = "<h2> Compte bancaire de $this</h2>";

        foreach($this->comptesBancaire as $compte){
            $result .= $compte."<br>";
        }
        return $result;
    }

    // TO STRING //
    public function __toString() {
        return $this->prenom." ".$this->nom;
    }
}