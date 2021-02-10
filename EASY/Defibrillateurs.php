<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%s", $LON);
fscanf(STDIN, "%s", $LAT);
fscanf(STDIN, "%d", $N);
$defibs = [];
$distances = [];
$userLongitude = floatval(str_replace(",", ".", $LON));
$userLatitude = floatval(str_replace(",", ".", $LAT));;
for ($i = 0; $i < $N; $i++)
{
    $DEFIB = stream_get_line(STDIN, 256 + 1, "\n");
    $defibs [] = explode(";", $DEFIB);
}
foreach ($defibs as $key => $defib) {
    $longitude = floatval(str_replace(",", ".", $defib[4]));
    $latitude = floatval(str_replace(",", ".", $defib[5]));
    $x = ($longitude - $userLongitude) * cos(($userLongitude + $latitude) / 2);
    $y = $latitude - $userLatitude;
    $d = sqrt(pow($x, 2) + pow($y, 2)) * 6371;
    $distances [$key]['distance'] = $d;
    $distances [$key]['adresse'] = $defib[1];
}
// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)
function cmp($a, $b)
{
    return $a['distance'] > $b['distance'];
}


usort($distances, "cmp");
echo($distances[0]['adresse'] . "\n");
?>