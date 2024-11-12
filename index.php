<h1>POO Gestion de compte bancaire</h1>

<?php

spl_autoload_register(function ($class_name) {
    require 'classes/'. $class_name . '.php';
});

$titulaire1 = new Titulaire("Jackson", "Mickaël", "08/29/1958", "Los Angeles");

$compte1 = new Compte_bancaire("Compte courant", 150000, "€", $titulaire1);
$compte2= new Compte_bancaire("Livret A", 10500, "€", $titulaire1);

echo $titulaire1->afficherCompteBancaire();
echo $titulaire1->afficherInfosTitulaire()."<br>";

echo $compte1->crediter(20000)."<br>";
echo $compte1->debiter(2000100)."<br>";
echo "<br>";
echo $compte1->virement($compte2, 500)."<br>";