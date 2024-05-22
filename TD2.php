<?php

function verifConsecutivite($tab) {
    $n = count($tab);
    if ($n <= 1) {
        return true;
    }

    for ($i = 1; $i < $n; $i++) {
        if ($tab[$i] != $tab[$i - 1] + 1) {
            return false; 
        }
    }
    
    return true; 
}

$tableau1 = [1, 2, 3, 4, 5];
$tableau2 = [1, 2, 4, 5, 6];
$tableau3 = [5, 6, 7, 8];
$tableau4 = [];

echo "Tableau 1 : " . (verifConsecutivite($tableau1) ? "Consécutif" : "Non consécutif") . "\n";
echo "Tableau 2 : " . (verifConsecutivite($tableau2) ? "Consécutif" : "Non consécutif") . "\n";
echo "Tableau 3 : " . (verifConsecutivite($tableau3) ? "Consécutif" : "Non consécutif") . "\n";
echo "Tableau 4 : " . (verifConsecutivite($tableau4) ? "Consécutif" : "Non consécutif") . "\n";

?> 
