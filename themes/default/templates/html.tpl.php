<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces;?>>
<head profile="<?php print $grddl_profile; ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php print $head; ?>
  <title><?php print bootstrap_base_bb_strip($head_title); ?></title>
  <?php print $styles; ?>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="/sites/rsagroup.ca/themes/bootstrap_base/css/ie-7.css">
  <![endif]-->
  <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="/sites/rsagroup.ca/themes/bootstrap_base/css/ie-8.css">
  <![endif]-->
  <?php print $scripts; ?>
  <!--[if lt IE 10]>
    <script src="/sites/rsagroup.ca/themes/bootstrap_base/js/jquery.html5-placeholder-shim.js"></script>
  <![endif]-->  
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
<!-- Google Tag Manager --> 
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MBXKLS" height="0" width="0" frameborder="0" style="display:none;visibility:hidden" title="Google Tag Manager">This iframe is used for Google track manager.</iframe></noscript> 
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], 
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); 
})(window,document,'script','dataLayer','GTM-MBXKLS');
</script> 
<!-- End Google Tag Manager -->
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>