<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d %d", $w, $h);
fscanf(STDIN, "%d %d", $startRow, $startCol);
fscanf(STDIN, "%d", $n);
$maps = [];
$validMapIndex = -1;
$lastPathLength = 400;
for ($i = 0; $i < $n; $i++)
{
    $map = [];
    for ($j = 0; $j < $h; $j++)
    {
        $mapRow = stream_get_line(STDIN, $w + 1, "\n");
        $map [] = str_split($mapRow);
    }
    $currentRow = $startRow;
    $currentCol = $startCol;
    $pathLength = 0;
    while ($pathLength >= 0 && $pathLength < $lastPathLength) {
        $pathLength ++;
        $currentCell = $map[$currentRow][$currentCol];
        
        switch ($currentCell) {
            case 'v':
                $currentRow ++;
                break;
            case '^':
                $currentRow --;
                break;
            case '<':
                $currentCol --;
                break;
            case '>':
                $currentCol ++;
                break;
            case 'T':
                break 2;
            default:
                break;
        }
        if ($currentCol < 0  || $currentCol >= $w
            || $currentRow < 0  || $currentRow >= $h
            || $currentCell === '.' || $currentCell === '#'
        ) {
            $pathLength = -1;
        }
        
    }
    if($pathLength >= 0 && $pathLength < $lastPathLength) {
        $lastPathLength = $pathLength;
        $validMapIndex = $i;
    }
    
}
// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)

echo($validMapIndex >= 0 ? $validMapIndex : "TRAP" . "\n");
?>