<?php
//function pour trouver un nombre premier

function premier($nombre)
{
    if ($nombre == 1) {
        return false;
    }

    for ($i = $nombre; $i > 1; $i--) {
        if ($nombre % $i == 0) {
            return false;
        }
        return true;
    }
}

echo premier("3") . "true\n";
echo premier("64") . "false\n";
echo premier("59") . "true\n";
