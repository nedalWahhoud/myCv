<?php
// Fehlerbehandlung sollte nach den Headern kommen
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (isset($_GET['lang'])) {
   setLang(lang: $_GET['lang']); 
   // Hole den aktuellen Dateinamen
   $currentPage = basename(path: $_SERVER['PHP_SELF']); 
   // Weiterleitung zur aktuellen Seite mit neuer Sprache
   header('Location: ' . $currentPage); 
   exit();  // Stelle sicher, dass nach der Weiterleitung keine weiteren Ausgaben erfolgen.
}

include_once 'mysqlProcessing.php';
include_once 'dataProcessing.php';

// Download-Logik
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = intval($_POST['id']);
    $data = getDatabase(queryCode: 'data', type: 'i', key_word: $id);
    
    // Hole die Sprache
    $lang = getLang();

    // Setze Header für den Dateidownload
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="Cv_'.$lang.'.pdf"');
    header('Content-Length: ' . strlen($data['data_'.$lang.'']));

    // Gebe die PDF-Daten aus
    echo $data['data_'.$lang.''];

    exit;  // Stoppe die Ausführung nach der Ausgabe
}
?>
