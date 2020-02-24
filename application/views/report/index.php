<?php
echo "<table>";
echo "<thead>";
echo "<tr>";

echo "<td>Nama Obat</td>";



for ($c = 1; $c <= 31; $c++) {
    echo "<td>$c</td>";
}

echo "</tr>";
echo "</thead>";
echo "<tbody>";

// var_dump($awal);
foreach ($awal as $key => $valueObat) {
    // var_dump($awal);
    // var_dump($query);
    echo "<tr>";
    for ($c = 1; $c <= 31; $c++) {
        $tanggal = "2020-02-$c";
        if ($c == 1) {

            echo "<td>$valueObat[nama_obat]</td>";
        }

        // echo $query[$key][$valueObat['id_obat']];
        if (isset($query[$tanggal][$valueObat['id_obat']])) {
            echo "<td>{$query[$tanggal][$valueObat['id_obat']]}</td>";
        } else {
            echo "<td>&nbsp;</td>";
        }

        // var_dump($query);
    }
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

echo "<style>";
echo "table thead td{font-weight:bold}";
echo "table tr td{min-width:85px;}";
echo "</style>";
