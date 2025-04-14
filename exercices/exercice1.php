<?php

echo "Exercice 1 sur les tableaux associatifs";
$tableau = [
    "personnes" => [
        ["nom" => "Wilkins", "age" => 18, "email" => "@saintil"],
        ["nom" => "Kobe", "age" => 52, "email" => "@bryant"],
        ["nom" => "Ant", "age" => 22, "email" => "@edwards"]
    ]
];
echo "<br>";
print_r($tableau);
echo "<br><br>";

//montre le tableau sous forme de liste avec la boucle foreach
foreach ($tableau['personnes'] as $index => $personne) {
    echo ($index + 1) . ") Son nom est " . $personne["nom"] .
        " son age est " . $personne["age"] .
        " et son email est " . $personne["email"] . "<br>";
}
echo "<br>";

// Echo 4e personne
echo "<br>";
echo "Ajout d'une quatrieme personne au tableau";
array_push($tableau['personnes'], ["nom" => "Harden", "age" => 35, "email" => "@harden"]);

echo "<br> <br>";
foreach ($tableau['personnes'] as $index => $personne) {
    echo ($index + 1) . ") Son nom est " . $personne["nom"] .
        " son age est " . $personne["age"] .
        " et son email est " . $personne["email"] . "<br>";
}
echo "<br>";

// tri par le nom
echo "Trie du tableau ";
echo "<br>";
usort($tableau['personnes'], fn($a, $b) => strcmp($a["nom"], $b["nom"]));

foreach ($tableau['personnes'] as $index => $personne) {
    echo ($index + 1) . ") Son nom est " . $personne["nom"] .
        " son age est " . $personne["age"] .
        " et son email est " . $personne["email"] . "<br>";
}
echo "<br>";
