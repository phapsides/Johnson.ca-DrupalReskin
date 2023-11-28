<?php
global $language;
$copyright_note_block = ($language -> language == 'en')?'copyright_note':'copyright_note_fr';

?>
<footer class="footer">
  <div id="block-menu-menu-footer-menu">
    <?php print $rsa_blocks['nav_footer']; ?>
  </div>
  <?php print render($page['footer']); ?>
</footer>