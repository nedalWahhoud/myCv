<footer>
    <div class="footer-content">
      <?php
       echo '<p>&copy; ' . date(format: "Y") . ' Mohamad Nedal Wahhoud.</p>';
       echo '<div class="all-container">';
       // number
       echo '<div class="number">';
       echo '<a>';
       echo '<span style="display: block; text-align: center; font-size:18px; font-weight: bold;">' . getDatabase(queryCode: "translation",type: "s",key_word: 'Number')[$lang] . '</span>';
       echo '<span class="number-text">+49 (0) 15771183587</span>';
       echo '</a>';
       echo '</div>';
       // email
       echo '<div class="email">';
       echo '<a href="mailto:Nedal.1992.29@gmail.com">';
       echo '<span style="display: block; text-align: center; font-size:18px; font-weight: bold;" >E-Mail</span>';
       echo '<span class="number-text">Nedal.1992.29@gmail.com</span>';
       echo '</a>';
       echo '</div>';
       // social
       echo '<div class="social-icons">';
       echo '<a href="'. staticVariable::$linkedinLink .'" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>';
       echo '<a href="'. staticVariable::$xingLink .'" target="_blank" title="XING"><i class="fab fa-xing"></i></a>';
       echo '<a href="'. staticVariable::$instgramLink .'" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>';
       echo '</div>';
       echo '</div>';
      ?>
    </div>
   </footer>