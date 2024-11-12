<?php

class Compte_bancaire {

    private string $libelle;
    private float $soldeInitial;
    private string $devise;
    private Titulaire $titulaire;


public function __construct(string $libelle, float $soldeInitial, string $devise, Titulaire $titulaire) {
    $this->libelle = $libelle;
    $this->soldeInitial = $soldeInitial;
    $this->devise = $devise;
    $this->titulaire = $titulaire;
    $titulaire->addCompteBancaire($this);
}

    // GETTER & SETTER //
    public function getDevise()
    {
        return $this->devise;
    }

    public function setDevise(string $devise)
    {
        $this->devise = $devise;

        return $this;
    }


    public function getSoldeInitial()
    {
        return $this->soldeInitial;
    }

    public function setSoldeInitial(float $soldeInitial)
    {
        $this->soldeInitial = $soldeInitial;

        return $this;
    }


    public function getLibelle()
    {
        return $this->libelle;
    }
    
    public function setLibelle(string $libelle)
    {
        $this->libelle = $libelle;
        
        return $this;
    }


    public function getTitulaire()
    {
        return $this->titulaire;
    }

    public function setTitulaire(Titulaire $titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    // FONCTIONS //
    public function crediter(float $montant) {
        if($montant > 0) {
            $this->soldeInitial += $montant;
            echo "Vous avez reçu ".$montant." ".$this->devise." sur votre compte bancaire. Nouveau solde : ".$this."<br>";
        } else {
            echo "Montant invalide";
        }
    }

    public function debiter(float $montant) {
        if($montant > 0 && $this->soldeInitial >= $montant){
            $this->soldeInitial -= $montant;
            echo "Vous avez été débité de ".$montant." ".$this->devise.". Nouveau solde : ".$this."<br>";
        } else {
            echo "Solde insuffisant ou montant invalide";
        }
    }

    public function virement(Compte_bancaire $compteDestinataire, float $montant) {
        if($montant > 0 && $this->soldeInitial >= $montant) {
            $this->debiter($montant);
            $compteDestinataire->crediter($montant);
            echo "Virement de ".$montant." ".$this->devise." du compte : ".$this." de ".$this->getTitulaire()." effectué vers le compte : ".$compteDestinataire." de ".$compteDestinataire->getTitulaire()."<br>";
        } else {
            echo "Solde insufissant ou montant invalide";
        }
    }

    // TO_STRING //
    public function __toString() {
        return $this->libelle." ( ".$this->soldeInitial." ".$this->devise." )";
    }

}