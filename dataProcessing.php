<?php

function setLang($lang):void {
    staticVariable::$lang = strtolower(string: $lang);
    $_SESSION['lang'] = $lang;   
}
function getLang():string {
    return $_SESSION['lang'] ?? 'de';
}
function  getListLangauge():void{
    include_once "mysqlProcessing.php";
    $row_la_name = getDatabase(queryCode: "translation",type: "s",key_word: "la_name");
    $row_la_code = getDatabase(queryCode: "translation",type: "s",key_word: "la_code");
    $languages = [];
    try
    { 
      if(!empty($row_la_code)){
        $languages = [
          ["name" => $row_la_name['en'], "code" => strtolower(string: $row_la_code['en'])],
          ["name" => $row_la_name['de'], "code" => strtolower(string: $row_la_code['de'])]
      ];
      // sort by language
        $lang = getLang();
        usort($languages, function ($a, $b) use ($lang) {
          return ($a['code'] === $lang) ? -1 : (($b['code'] === $lang) ? 1 : 0);
       });
       // 
       foreach ($languages as $lang) {
        echo '<a class="language-item" data-lang="' . $lang["code"] . '">' . $lang["name"] . ' - ' . $lang["code"] . '</a>';
       }
       }else{
        writeLog(logType: 'Warning',message:  "row_la_code or row_la_code ist empty");
        echo"row_la_code or row_la_code ist empty";
       }
    }
    catch(Exception $e){
      echo $e-> getMessage();
    }
}
function imgConverting($img):string{
    $imgBase64 = base64_encode(string: $img);
    $imgSrc = 'data:image/png;base64,' . $imgBase64; 
    return $imgSrc;
}
function writeLog($logType,$message):void {
    $logFile ="app.log";
    $date = date(format: "d-m-Y H:i:s");
    $logEntry = "$logType - [$date]: $message \r\n";
    file_put_contents(filename: $logFile, data: $logEntry, flags: FILE_APPEND);
}
function logDelete():void {
    $currentDate  =date(format:"d-m-Y");
    $logFile = "app.log";
    if(file_exists(filename: $logFile)) {
        $handle = fopen(filename: $logFile, mode: 'r'); 
        $firstLine = trim(string: fgets(stream: $handle));
        fclose(stream: $handle);
        if (preg_match(pattern: '/\[(\d{2}-\d{2}-\d{4}) \d{2}:\d{2}:\d{2}\]/', subject: $firstLine, matches: $matches)) {
            $logDatum = $matches[1];
            if($currentDate > $logDatum)
             unlink(filename: $logFile);
      }
    }
}
function alert($message):void {
    echo '<script>alert("' . $message . '");</script>';
}
?>