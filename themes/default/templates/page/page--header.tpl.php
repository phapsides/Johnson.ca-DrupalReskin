  <header role="banner" id="page-header">
    <div id="mobile-menu"></div>
    <a class="logo pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
      <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
    </a>
    
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <div class="region region-header">
      <div id="block-menu-block-platform-menus-3">
        <?php print bootstrap_base_render_block('menu_block', 'platform_menus-3'); ?>
      </div>
      <div id="block-search-form">    
        <?php print $rsa_blocks['search']; ?>
      </div>
    </div>

    <?php if (!empty($primary_nav)): ?>
    <nav id="nav-primary" class="navbar">
      <div class="navbar-inner">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div class="nav-collapse collapse">
          <?php if (!empty($primary_nav)): ?>
            <?php print bootstrap_base_full_site_menu(); // custom, registered by our theme ?>
          <?php endif; ?>
        </div>
      </div>
    </nav>
    <?php endif; ?>
    
    <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
  </header> <!-- /#header -->