<?php
include 'Html\header.php'; // Header add
// show results from Mailer
if(isset($_SESSION['message'])){
  $msg = $_SESSION['message'];
  alert(message: $msg);
  unset($_SESSION['message']);
}
?>
<body class="body-contact">
   <!-- dropdown list language   -->
   <div id="overlay"></div> 
   <div id="language-list">
   <?php
    getListLangauge();
   ?>
   </div>
   <!-- body -->
   <?php
    echo '<h1 class = "hContact">'. getDatabase(queryCode: "translation",type: "s",key_word: 'contact')[$lang] .'</h1>';
    // div contact
    echo '<div class = "contactCard">
          <form action = "contact1.php" method="post">
            <div class = "row">
             <div>
              <label for = "name">'. getDatabase(queryCode: "translation",type: "s",key_word: 'firstName')[$lang] .' *</label>
              <input type = "text" id ="name" name = "name" required>
             </div>
             <div>
              <label for = "lastName">'. getDatabase(queryCode: "translation",type: "s",key_word: 'lastName')[$lang] .' *</label>
              <input type = "text" id ="lastName" name = "lastName" required>
             </div>
            </div>

            <label for="email">'.getDatabase(queryCode: "translation",type: "s",key_word: 'email')[$lang].' *</label>
            <input type="email" id="email" name="email" required>
            
            <input type="email" id="receiverEmail" name="receiverEmail" value="'.staticVariable::$receiverEmail.'" style="display:none;" required>
            <input type="text" id="passwordEmail" name="passwordEmail" value="'.staticVariable::$passwordEmail.'" style="display:none;" required>

            <label for="subject">'.getDatabase(queryCode: "translation",type: "s",key_word: 'subject')[$lang].' *</label>
            <input type="text" id="subject" name="subject" required>

            <label for="message">'.getDatabase(queryCode: "translation",type: "s",key_word: 'message')[$lang].' *</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button class = "sendButton" type="submit">'.getDatabase(queryCode: "translation",type: "s",key_word: 'send')[$lang].'</button>
          </form>  
         </div>';

   ?>
  
   <?php
    include 'Html\footer.php'; // footer add
   ?>
</body>
</html>