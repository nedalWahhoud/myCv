<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
include 'Html/header.php'; // Header add
?>
<body class="body-myCv">
   <!-- dropdown list language   -->
   <div id="overlay"></div> 
   <div id="language-list">
     <?php
     getListLangauge();
     ?>
   </div>
   <div class = "cards-container">
   <?php
     echo '<h1 class = "h1-myCv">'. getDatabase(queryCode: "translation",type: "s",key_word: "CV")[$lang] .'</h1>';

     echo '<div class = "header-container">
              <h2>' . getDatabase(queryCode: "translation",type: "s",key_word: 'aboMe')[$lang] . '</h2>

              <form method="post" action="download.php">
                <input type="hidden" name="id" value="'.staticVariable::$cvPdfId.'"> 
                <button type = "submit" name = "dataDownload" class="cv-button">'. getDatabase(queryCode: "translation",type: "s",key_word: 'DlCv')[$lang] .'</button>
              </form> 
           </div>';
          
     echo '<div class = "card-job">
              <span>'. getDatabase(queryCode: "translation",type: "s",key_word: 'born')[$lang] .'</span>
              <span>'. getDatabase(queryCode: "translation",type: "s",key_word: 'nationalit')[$lang] .'</span>
              <span>'. getDatabase(queryCode: "translation",type: "s",key_word: 'residence')[$lang] .'</span>
           </div>';
     // skills      
     $rows = getSkills();
     for ($i = 0; $i < count(value: $rows); $i++) {
      if($i == 0)
      {
         echo '<div class = "header-container1">
            <h2>' . $rows[$i][$lang] . '</h2>
         </div>';
      }
      else
      {
        if($i == 1)
            echo '<div class = "card-job">';
         echo '<span>'. $rows[$i][$lang] .'</span>';
         if($i == (count(value: $rows) -1))
            echo '</div>';
      }
     }
     // experience
   $rows = getExperience();
   $bo = false;
   for ($i = 0; $i < count(value: $rows); $i++) {
      // add head
      if($rows[$i]['TiLevel'] == 0)
      {
         echo '<div class = "header-container1">
                 <h2>' . $rows[$i][$lang] . '</h2>
              </div>';
      }
      else
      {
         // add Space between the card-job divs
         if ($rows[$i]['TiLevel'] == 1 && ($rows[$i - 1]['TiLevel'] == 1 || $rows[$i - 1]['TiLevel'] == 2) && ($rows[$i + 1]['TiLevel'] == 1 || $rows[$i + 1]['TiLevel'] == 0))
         {
            echo  '<div class = "header-container1">
                  <h2> </h2>
                  </div>';
         }
         // open div 
         if($bo == false)
         {
            echo '<div class = "card-job">';
            $bo = true;

            // image
            if($rows[$i]['key_word'] =="githubLink")
            {
              /* $img = getData(id: 3);
               $imgScr = imgConverting(img: $img['data_'.$lang.'']);
               echo '<img src="'. $imgScr .'" alt="'. $img['id'] .'">';*/
            }
         }

         // add zusätzliche style if level 1 (job Title)
         $date = '';
         $style = '';
         if ($rows[$i]['TiLevel'] == 1)
         {
            $date = $rows[$i]['date'];
            $style = 'hide-before style = "font-size:30px;  left: 50px; color:#ffaa00;"';
         }
         
         if ($rows[$i]['date'] == 'link')
         {
            $date = '';
            echo '<a href="'. $rows[$i][$lang] .'" target= "_blank" '. $style .'>'.$date.'&nbsp;&nbsp;'. $rows[$i][$lang] .' </a>';
         }
         else
            echo '<span  '. $style .'>'.$date.'&nbsp;&nbsp;'. $rows[$i][$lang] .' </span>';

         if($i == (count(value: $rows) -1))
         {
            echo '</div>';
            $bo=false;
            break;
         }

         // close the div if job description was finished
         if($rows[$i + 1]['TiLevel'] == 1 || $rows[$i + 1]['TiLevel'] == 0)
         {
            echo '</div>';
            $bo=false;
         }
      }
   }
    ?>
   </div>
  
   <?php
     include 'Html/footer.php'; // Header add
   ?>
</body>
</html>