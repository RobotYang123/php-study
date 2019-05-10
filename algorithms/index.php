<?php

echo "=== hello algorithms ===\n\n";

/**
 * Generate random num array
 * @param $num
 * @param $min
 * @param $max
 * @return array
 */
function randarr($num, $min, $max)
{
    $arr = [];
    while ($num>0){
        $arr[] = rand($min, $max);
        $num--;
    }
    return $arr;
}

/**
 * Classical selection sort
 * @param $arr
 * @return mixed
 */
function selection($arr) {
    for ($i = 0; $i < count($arr); $i++) {
        $minInd = $i;
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$j] < $arr[$minInd]) {
                $minInd = $j;
            }
        }
        list($arr[$i], $arr[$minInd]) = [$arr[$minInd], $arr[$i]];
    }
    return $arr;
}
$randArr = randarr(10, 10, 100);
echo "ran arr: " . implode(', ', $randArr) . "\n";
$selArr = selection($randArr);
echo "sel arr: " . implode(', ', $selArr) . "\n";