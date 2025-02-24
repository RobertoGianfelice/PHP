<?php
function stampaArray($nomeVettore, $daStampare)
{
    echo "<h3>--- $nomeVettore</h3>";
    if (count($daStampare) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Chiave</th><th>Valore</th></tr>";
        foreach ($daStampare as $chiave => $valore) {
            echo "<tr>";
            echo "<td>$chiave</td><td>$valore</td>";
            echo "</tr>";
        }
        echo "</table>";

    } else {
        echo "<h4>Struttura vuota</h4>";
    }
}
