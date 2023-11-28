<?php

/**
 * @file
 * Default views template for displaying a slideshow.
 *
 * - $view: The View object.
 * - $options: Settings for the active style.
 * - $rows: The rows output from the View.
 * - $title: The title of this group of rows. May be empty.
 *
 * @ingroup views_templates
 */
?>

<div id="myCarousel" class="carousel slide">
  <ol class="carousel-indicators">
    <?php 
      if (sizeof($rows) > 1):
      	foreach($rows as $id => $row):
      		print '<li data-target="#myCarousel" data-slide-to="' . $id . '" class="active"></li>';
      	endforeach;
      endif;
    ?>
  </ol>
     
  <div class="carousel-inner">   
  	<?php foreach ($rows as $id => $row): ?>
      <div<?php print $id == 0 ? ' class="active item"' : ' class="item"'; ?>>
        <?php print $row; ?>
      </div>
  	<?php endforeach; ?>
  </div>
<?php if (sizeof($rows) > 1): ?>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
<?php endif; ?> 

</div>