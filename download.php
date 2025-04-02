<?php
session_start();
if (isset($_GET['lang'])) {
   setLang(lang: $_GET['lang']); 
   // get current page
   $currentPage = basename(path: $_SERVER['PHP_SELF']); 
   // Redirect to current page with new language 
   header(header: "Location: $currentPage"); 
   exit();
}
?>

<?php
include_once 'mysqlProcessing.php';
include_once 'dataProcessing.php';
// download
if (isset($_POST['id']) && is_numeric(value: $_POST['id'])) {
    $id = intval(value: $_POST['id']);
    $data = getDatabase(queryCode: 'data',type: 'i',key_word: $id);
    // Set headers for file download
    $lang = getLang();

    header(header: 'Content-Type: application/octet-stream');
    header(header: 'Content-Disposition: attachment; filename="Cv_'.$lang.'.pdf"');
    header(header: 'Content-Length: ' . strlen(string: $data['data_'.$lang.'']));

    // Output the data
    echo $data['data_'.$lang.''];

    exit;
}

?>
