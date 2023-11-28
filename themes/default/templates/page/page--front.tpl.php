<?php
/**
 * The need for this template is a "hack" to satisfy the design. On teh home page the main banner breaks
 * the main container into two parts and is 100% wide. To allow for the banner image to stretch 
 * we will split the main contaner and insert the banner region in it.
 */
?>


<div class="main-container container">
  <?php include_once('page--header.tpl.php'); ?>
</div>
<div id="homepage-banner">
  <?php print bootstrap_base_render_block('views', 'home_page_banner-block'); ?>
</div>
<div class="main-container container">

  <div class="row-fluid">

    <section class="span12 content-area">  
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="element-invisible"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <div class="well"><?php print render($page['help']); ?></div>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php
        print bootstrap_base_render_block('views', 'menu_sections-menu_sections'); 
        print bootstrap_base_render_block('views', 'homepage-block_homepage_badges'); 
        print bootstrap_base_render_block('views', 'companies-block'); 
      ?>
      <?php print render($page['content']); ?>
    </section>

  </div>
</div>
<?php include_once('page--footer.tpl.php'); ?>