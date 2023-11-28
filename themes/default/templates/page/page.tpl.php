<div class="main-container container">

  <?php include_once('page--header.tpl.php'); ?>
    
  <div class="row-fluid">
    <section class="<?php print _bootstrap_content_span($columns); ?> content-area">  
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php // if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header"><?php print bootstrap_base_bb2html($title); ?></h1>
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
      <?php if (!empty($page['contact_triptych'])): ?>
        <div class="triptych"><?php print render($page['contact_triptych']); ?></div>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="span3 sidebar" role="complementary">
        <?php print render($page['sidebar_second']); ?>
        <?php print bootstrap_base_render_block('views', 'links-block'); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>
    <section class="span12">
      <?php print bootstrap_base_render_block('views', 'badge-block'); ?>
    </section>
  </div>
</div>
<?php include_once('page--footer.tpl.php'); ?>