<?php
function factioriel($n)
{
    if ($n == 0) {
        return 1;
    } else {
        return $n * factioriel($n - 1);
    }
}

echo "\n Menu: \n";
echo "Qu'elle est le chiffre dont vous voulez voir le factoriel\n";
$choix = readline("Votre choix: ");
echo "Le resultat factoriel de ", $choix, " est ", factioriel($choix);