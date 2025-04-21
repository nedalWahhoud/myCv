<?php
include "mysqlProcessing.php";


function getHeaderTranslation($language):array{
    $home = getDatabase(queryCode: "translation",type: "s",key_word: "home");
    $about = getDatabase(queryCode: "translation",type: "s",key_word: "CV");
    $contact = getDatabase(queryCode: "translation",type: "s",key_word: "contact");
    $la = getDatabase(queryCode: 'data',type: 'i',key_word: 1);
    // img converter
    $imgSrc = imgConverting(img: $la['data_'. strtolower(string: $language)]);
    $data = [
        0 => $home[$language],
        1 => $about[$language],
        2 => $contact[$language],
        3 => $imgSrc
    ];
    return $data;
}

?>