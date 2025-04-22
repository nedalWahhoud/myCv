<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
include 'Html/header.php'; // Header add
?>
<body class="body-index">
  <?php
  include 'Html/langList.php'; // lagunage list add
  ?>
   <!-- Profil card -->
   <div class="card">
      <?php
         // image
         $profiImg = getDatabase(queryCode: 'data',type: 'i',key_word: 2);
         $imgScr = imgConverting(img: $profiImg['data_'.$lang.'']);
         // 
         $row = getDatabase(queryCode: "translation",type: "s",key_word: 'myName');
         echo '<div class = "profile-img">';
         echo '<img src="'. $imgScr .'" alt="'. $row['en'] .' '. $row['de'] .'">';
         echo '</div>';
         echo '<h2>'. $row['en'] .'<br><span>'. $row['de'] .'</span></h2>';
         echo '<p class="job">'. getDatabase(queryCode: "translation",type: "s",key_word: 'JobTitle')[$lang] .'</p>';
         echo '<div class="social-links">';
         echo '<a href="'. staticVariable::$linkedinLink .'" target="_blank"><i class="fab fa-linkedin"></i></a>';
         echo '<a href="'. staticVariable::$xingLink .'" target="_blank"><i class="fab fa-xing"></i></a>';
         echo '<a href="'. staticVariable::$instgramLink .'" target="_blank"><i class="fab fa-instagram"></i></a>';
         echo '</div>';
        ?>
    </div>
    <!-- Profil text -->
    <div class ="card-text"> 
      <!-- the height of car must be the same as card text -->
      <script>
        let cardHeight = document.querySelector(".card").offsetHeight;
        document.querySelector(".card-text").style.height = cardHeight + "px";
      </script>
      <?php
         echo '<h1>'. getDatabase(queryCode: "translation",type: "s",key_word: 'hello')[$lang] .'</h1>';
         echo '<h2>'. getDatabase(queryCode: "translation",type: "s",key_word: 'cardText0')[$lang] .'</h2>';     
         echo '<button onclick="window.location.href=\''.staticVariable::$myCvNamePage.'\';" class="CV-button">' . getDatabase(queryCode: "translation",type: "s",key_word: 'CV')[$lang] . '</button>';
         echo '<span class="text1">'. getDatabase(queryCode: "translation",type: "s",key_word: 'cardText1')[$lang] .'</span>';
         echo '<span class="text1">'. getDatabase(queryCode: "translation",type: "s",key_word: 'cardText2')[$lang] .'</span>';
         echo '<span class="text1">'. getDatabase(queryCode: "translation",type: "s",key_word: 'cardText3')[$lang] .'</span>';
         echo '<span class="text1">'. getDatabase(queryCode: "translation",type: "s",key_word: 'cardText4')[$lang] .'</span>';
         echo '<span class="text1">'. getDatabase(queryCode: "translation",type: "s",key_word: 'cardText5')[$lang] .'</span>';
         echo '<span class="text1">'. getDatabase(queryCode: "translation",type: "s",key_word: 'cardText6')[$lang] .'</span>';
         echo '<span class="text1">'. getDatabase(queryCode: "translation",type: "s",key_word: 'cardText7')[$lang] .'</span>';
      ?>
    </div>
    <?php
      include 'Html/footer.php'; // footer add
    ?>
</body>
</html>