<?php

    $boolean = true; 
    while ($boolean == true) {
        echo "\n Menu: \n";
        echo "1. Dites bonjour\n";
        $choix = readline("Votre choix: ");

        if ($choix == "1") {
            echo "Bonjour toi\n";
        } else if ($choix == "2") {
            echo "Ta vrm fait 2, pff\n";
        } else if ($choix == "3") {
            echo "t'es fort\n";
            echo "a la prochaine\n";
            $boolean = false;
        } else {
            echo "reesaye\n";
        }    
    }