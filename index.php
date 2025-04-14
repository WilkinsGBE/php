<?php
echo "Bonjour Myguel";
echo "<br>";

// Les variables
$nom = "Wilkins";
$age = 18;
$expertise = ["app web", "app mobile"];
$developpeur = true;
echo $nom;
echo "<br>";

// Tableau Indexé
echo "Je vais travailler sur les tableaux indexés";
echo "<br>";
$nourriture = ["poulet", "lasagne", "crepe", "macaroni", "beef"];
echo $nourriture[2];
echo "<br>";
$nourriture[5] = "mango";
echo $nourriture[5];
echo "<br>";
echo "Voici la liste complete de ", $nom, " : ";
print_r($nourriture); 
echo "<br>";

// Tableaux associatif
echo "Tableaux associatif";
echo "<br>";
$seeker = [
    "nom" => "Wilkins",
    "Favourite verse" => "Matthew 6:33",
    "goal" => "Make a living out of coding"
];

$seeker["ville"] = "Montreal";
echo $seeker["goal"];
echo "<br>";

// Ajouter des elements au debut et la fin des tableaux
// indexe
array_push($nourriture, "saumon");
print_r($nourriture);
echo "<br>";

//remplacer une valeur
array_splice($nourriture,3, 1, "raisin");
print_r($nourriture);
echo "<br>";

//manipulation de nombres
echo "<br>";
echo "<br>";
echo "Section nombres";
echo "<br>";
$nombrePref = [1, 4, 7, 10, 13];

if ($age < 18) {
    echo "tu es mineur";
} else {
    echo "tu es majeur";
}

echo "<br>";

if ($nombrePref[2] == 7) {
    echo "good work";
} else {
    echo "bofff";
    echo "<br>";
}

$total = 0;
foreach ($nombrePref as $nombre) {
    $total += $nombre;
}

echo "le nombre total est: ", $total;
echo "<br>";

// menu
$reponse = readline("Qu'elle est ton nom ?");
echo "Bonjour, $reponse !\n";