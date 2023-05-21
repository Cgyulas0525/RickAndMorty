<?php

//$url = "https://rickandmortyapi.com/api/episode?page=1";
$url = "https://rickandmortyapi.com/api/character";


//$array = json_decode(file_get_contents($url), true);

$count = json_decode(file_get_contents($url), true)['info']['count'];

for($i = 1; $i <= $count; $i++) {
    $url = "https://rickandmortyapi.com/api/character/".$i;
    $vmi = json_decode(file_get_contents($url), true);
    echo $vmi['name'] . "\n";
}
//$keys = array_keys($array);
//$values = array_values($array);


//for($i = 0, $iMax = count($keys); $i < $iMax; $i++) {
//    if ($keys[$i] === 'info' ) {
//        echo $keys[$i] . " " . (is_array($values[$i]) ? "tömb" : "nem tömb") . "\n";
//        $infoKeys = array_keys($values[$i]);
//        $infoValues = array_values($values[$i]);
//        for ($j = 0, $jMax = count($infoKeys); $j < $jMax; $j++) {
//            echo $infoKeys[$j] . " " . $infoValues[$j] . "\n";
//        }
//    }
//    if ($keys[$i] === 'results') {
//        echo $keys[$i] . " " . (is_array($values[$i]) ? "tömb" : "nem tömb") . "\n";
//        $resultsKeys = array_keys($values[$i]);
//        $resultsValues = array_values($values[$i]);
//        echo count($resultsValues);
//    }
//}



