<div class="container-fluid">
  <?php include_once('page--header.tpl.php'); ?>
</div>

<div id="wrap-breadcrumb">
  <div class="container-fluid">
    <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
  </div>
</div>

<div class="main-container container-fluid">
    
  <div class="row-fluid">

    <section class="<?php print _bootstrap_base_content_span($columns); ?> content-area">
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <a id="main-content"></a>
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
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="span3 offset1" role="complementary">
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>
<?php include_once('page--footer.tpl.php'); ?>
</footer>
