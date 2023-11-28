<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php foreach ($rows as $id => $row): ?>
  <div class="span4 item<?php print $id+1; ?>">
    <?php print $row; ?>
  </div>
<?php endforeach; ?>