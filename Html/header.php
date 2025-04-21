<?php
session_start();
include_once 'translationProcessing.php';
include_once 'staticVariable.php';
include_once 'dataProcessing.php';
include_once 'mysqlProcessing.php';
//log if the log is older than one day, then it will be deleted
logDelete();
// set language
$lang = getLang();
if (isset($_GET['lang'])) {
   setLang(lang: $_GET['lang']); 
   // get current page
   $currentPage = basename(path: $_SERVER['PHP_SELF']); 
   // Redirect to current page with new language 
   header(header: "Location: $currentPage"); 
   exit();
}
// vars
$header_array = getHeaderTranslation(language: $lang);
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
   <meta name="description" content="Job Lebenslauf von Nedal Wahhoud">
   <meta name="keywords" content="Wahhoud, Nedal Wahhoud Lebenslauf, Nedal Wahhoud CV, Softwareentwickler, Online Lebenslauf">
   <meta name="author" content="Nedal Wahhoud">
   <meta name="robots" content="index, follow"> 
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Nedal Wahhoud</title>
   <!-- Linking the index style.css -->
   <link rel="stylesheet" href="css/indexStyle.css">
   <link rel="stylesheet" href="css/myCvPageStyle.css">
   <link rel="stylesheet" href="css/contact.css">
   <script src="Javascript/indexJavascript.js" defer></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<header class="header">
   <a href="index.php" style="text-decoration:none;"><h1><span class="subtitle">Wahhoud</span></h1></a>
   <nav>
      <ul>
         <?php 
          echo '<li><a href=\'index.php\'>'. $header_array[0] .'</a></li>';
          echo '<li><a href='.staticVariable::$myCvNamePage.'>'. $header_array[1] .'</a></li>';
          echo '<li><a href='.staticVariable::$contactPage.'>'. $header_array[2] .'</a></li>';
          echo '<li><img src="'. $header_array[3] .'" alt="'. strtoupper(string: $lang) .'"  class="la-img"></li>';
         ?>
      </ul>
   </nav>
</header>