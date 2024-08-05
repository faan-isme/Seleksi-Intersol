<?php

function pecahSukuKata($kata) {

    $array = array(
        array("ha", "na", "ca", "ra", "ka"),
        array("da", "ta", "sa", "wa", "la"),
        array("pa", "dha", "ja", "ya", "nya"),
        array("ma", "ga", "ba", "tha", "nga")
    );
    $sukuKataList = array();
    foreach ($array as $subArray) {
        $sukuKataList = array_merge($sukuKataList, $subArray);
    }
    $pattern = '/(' . implode('|', $sukuKataList) . ')/';
    
   
    $kataDenganSpasi = preg_replace($pattern, '$1 ', $kata);
    
    // Pecah kata berdasarkan spasi
    $sukuKata = explode(' ', trim($kataDenganSpasi));
    $replaceMap = array(
        "ha" => "pa",
        "na" => "dha",
        "ca" => "ja",
        "ra" => "ya",
        "ka" => "nya",
        "da" => "ma",
        "ta" => "ga",
        "sa" => "ba",
        "wa" => "tha",
        "la" => "nga",
        "du" => "mu",
        "n" => "dha",
        "k" => "ny"

    );
    
    $reverseReplaceMap = array_flip($replaceMap);
    
    
    foreach ($sukuKata as &$suku) {
        if (array_key_exists($suku, $replaceMap)) {
            $suku = $replaceMap[$suku];
        } elseif (array_key_exists($suku, $reverseReplaceMap)) {
            $suku = $reverseReplaceMap[$suku];
        }
    }
    return $sukuKata;
}

$hasil = pecahSukuKata("matamu");
$kataHasil = implode('', $hasil);
echo $kataHasil;



?>

