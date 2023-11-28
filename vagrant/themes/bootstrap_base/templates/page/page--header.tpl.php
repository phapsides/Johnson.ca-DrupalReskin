  <header role="banner" id="page-header">
    
    <div class="region region-header row-fluid">
      <div class="span6">
        <?php if (isset($rsa_blocks['language']) && isset($rsa_blocks['nav_region'])): ?>
        <ul class="nav nav-tools">
          <?php if (isset($rsa_blocks['language'])): ?>
          <li>
            <?php print $rsa_blocks['language']; ?>
          </li>
          <?php endif; ?>
          <?php if (isset($rsa_blocks['nav_region'])): ?>
          <li>
            <?php print $rsa_blocks['nav_region']; ?>
          </li>
          <?php endif; ?>
        </ul>
        <?php endif; ?>
      </div>
      <div class="span6 hidden-phone">
        <div id="block-search-form" class="pull-right">
          <a href="#" class="search-trigger">Search</a>
          <div class="search-reveal">
            <?php print $rsa_blocks['search']; ?>
          </div>
        </div>
        <div class="pull-right">
          <?php print $rsa_blocks['nav_tiertiary']; ?>
        </div>
      </div>
    </div>
    
    <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
    </a>

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
    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
    
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>
  </header> <!-- /#header -->