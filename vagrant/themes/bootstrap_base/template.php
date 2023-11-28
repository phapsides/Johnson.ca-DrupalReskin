<?php

/**
 * Helper function to apply responsive images styles to images
 *
 * @param style_name string representing the image style name
 *
 */
function render_image_style($field, $style_name){

  $style = image_style_load($style_name);

  $image = array(
    'style_name' => $style_name,
    'path' => $field['#items'][0]['uri'],
    'width' => '',
    'height' => '',
    'alt' => $field['#items'][0]['alt'],
    'title' => $field['#items'][0]['title'],
  );

  // if the style passed does not exist
  // fall back to original image
  if (!$style) {
    return theme('image', $image);
  } 
  else {
    return theme('image_style', $image);  
  }
}

/**
 * @file template.php
 */

/**
 * Hide the link to the current language.
 */
function bootstrap_base_links__locale_block($variables) {
  global $language;
  unset($variables['links'][$language->language]);

  return theme('links', $variables);
}

/**
 * Override theme_breadrumb().
 *
 * Print breadcrumbs as a list, with separators. Since this is hard coded in the
 * original bootstrap theme we need to override it here again to revert to > as a separator.
 */
function bootstrap_base_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    $breadcrumbs = '<ul class="breadcrumb">';
    
    $count = count($breadcrumb) - 1;
    foreach ($breadcrumb as $key => $value) {
      if ($count != $key) {
        $breadcrumbs .= '<li>' . $value . '<span class="divider">&gt;</span></li>';
      }
      else{
        $breadcrumbs .= '<li>' . $value . '</li>';
      }
    }
    
    // add current page title
    $breadcrumbs .= '<li>'.drupal_get_title().'</li>';
    
    $breadcrumbs .= '</ul>';
    return $breadcrumbs;
  }
}

function bootstrap_base_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  
  if ($element['#below']) {

    // Prevent dropdown functions from being added to management menu as to not affect navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);      
    } else {
      // Add our own wrapper
      unset($element['#below']['#theme_wrappers']);

      // Check if this element is nested within another
      if ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] > 1) || $element['#original_link']['link_path'] != '<nolink>') {
        // Generate as dropdown submenu
        $element['#attributes']['class'][] = '';
      } else {
        // Generate as standard dropdown
        $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
        $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
        $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
        $element['#attributes']['class'][] = 'dropdown';
        $element['#localized_options']['html'] = TRUE;
      }

      // Set dropdown trigger element to # to prevent inadvertant page loading with submenu click
      $element['#localized_options']['attributes']['data-target'] = '#';
    }
    
  }
 // Issue #1896674 - On primary navigation menu, class 'active' is not set on active menu item.
 // @see http://drupal.org/node/1896674
 if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']) || $element['#localized_options']['language']->language == $language_url->language)) {
   $element['#attributes']['class'][] = 'active';
 }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Implements hook_preprocess_page().
 */
function bootstrap_base_preprocess_page(&$vars) {
  if ($vars['is_front']) {

    $vars['rsa_blocks']['menu_sections'] = bootstrap_base_render_block('views', 'menu_sections-menu_sections');
    $vars['rsa_blocks']['badges'] = bootstrap_base_render_block('views', 'badge-block');
    $vars['rsa_blocks']['companies'] = bootstrap_base_render_block('views', 'companies-block');
  }
  
  if (module_exists('search')) {
    $search_form = drupal_get_form('search_form');
    $vars['rsa_blocks']['search'] = drupal_render($search_form);
  }
  
  if (module_exists('locale')) {
    $vars['rsa_blocks']['language'] = bootstrap_base_render_block('locale', 'language');
  }

  if(module_exists('menu_block')) {
    $vars['rsa_blocks']['nav_tiertiary'] = bootstrap_base_render_block('menu_block', 'platform_menus-3');
  }

  if(module_exists('menu')) {
    $vars['rsa_blocks']['nav_footer'] = bootstrap_base_render_block('menu', 'menu-footer-menu');
  }
  
  if (isset($vars['node'])) {
    // unset title from page template on article
    if($vars['node']->type == 'article') {
      $vars['title'] = '';
    }
  }

}


/**
 * Implements hook_preprocess_block().
 */
function bootstrap_base_preprocess_block(&$vars) {
  
  // remove titles from menu blocks
  if (($vars['block']->module == 'menu_block' && $vars['block']->delta != 'platform_menus-4') || $vars['block']->delta == 'menu-footer-menu'){
    $vars['block']->subject = '<none>';
  }
  
  // remove titles from header blocks
  if($vars['block']->module == 'search' || $vars['block']->module == 'locale'){
    $vars['block']->subject = '<none>';
  } 
  
  // remove titles from content blocks
  if($vars['block']->delta == 'badge-block' || $vars['block']->delta == 'links-block' || $vars['block']->delta == 'homepage-article_slider' || $vars['block']->delta == 'think_tank-articles_slider') {
      $vars['block']->subject = '<none>';
  }
}

/**
 * Helper function to render menu with child pages
 *
 * @param menu_name string representing the menu required
 */
function bootstrap_base_full_site_menu($menu_name = NULL) {
    // default primary menu
    if(is_null($menu_name)) {
        $menu_name = variable_get('menu_primary_links_source', 'main-menu');
    }
    $tree = menu_tree($menu_name);
    // outputs the full render of this menu
    return drupal_render($tree);
}

/**
 * Helper function to render a block with contextual links
 *
 * @param module string representing the module
 * @param delta string representing the delta of the block
 */
function bootstrap_base_render_block($module, $delta) {
  if (module_exists($module)) {
    $block = block_load($module, $delta);
    $render = _block_get_renderable_array(_block_render_blocks(array($block)));
    
    return render($render);
  }
  else {
    return false;
  }
}

/**
 * implements hook_page_alter()
 *
 * Alter the page output before render.
*/
function bootstrap_base_page_alter(&$page) {
  // Remove the search form from the search results page.
  if (arg(0) == 'search') {
    if (!empty($page['content']['system_main']['search_form'])) {
      hide($page['content']['system_main']['search_form']);
    }
  }
  
  $node = menu_get_object();
  $nid = isset($node->nid) ? $node->nid : '';
  
  if (is_numeric($nid)) {
    if (isset($page['content']['system_main']['nodes'][$nid])) {
      $page['node_content'] = $page['content']['system_main']['nodes'][$nid];
    }
  }
}

/**
* Replacement for theme_select() to override the select output.
*/
function bootstrap_base_select($variables) {
  $element = $variables['element'];
  element_set_attributes($element, array('id', 'name', 'size'));
  _form_set_class($element, array('form-select'));

  return '<div class="styled-select"><select' . drupal_attributes($element['#attributes']) . '>' . form_select_options($element) . '</select></div>';
}

/**
 * Inserting HTML into node titles. These functions are called from page.tpl.php, html.tpl.php
 * https://drupal.org/node/28537
 *
 * Needed for RG-90: Superscript in Title
 */
function bootstrap_base_bb2html($text) {
  $bbcode = array(
                  "[strong]", "[/strong]",
                  "[b]",  "[/b]",
                  "[u]",  "[/u]",
                  "[i]",  "[/i]",
                  "[em]", "[/em]",
                  "[sup]", "[/sup]"
                );
  $htmlcode = array(
                "<strong>", "</strong>",
                "<strong>", "</strong>",
                "<u>", "</u>",
                "<em>", "</em>",
                "<em>", "</em>",
                "<sup>", "</sup>"
              );
  return str_replace($bbcode, $htmlcode, $text);
}

function bootstrap_base_bb_strip($text) {
  $bbcode = array(
                  "[strong]", "[/strong]",
                  "[b]",  "[/b]",
                  "[u]",  "[/u]",
                  "[i]",  "[/i]",
                  "[em]", "[/em]",
                  "[sup]", "[/sup]"
                );
  return str_replace($bbcode, '', $text);
}

// Allow escaped HTML tags in menu links
function bootstrap_base_preprocess_menu_link(&$variables){
  $title = $variables['element']['#title'];
  $converted_title = bootstrap_base_bb2html($title);
  if ($title != $converted_title){  // tag is present, enable HTML for this link
    $variables['element']['#title'] = $converted_title;
    $variables['element']['#localized_options']['html'] = TRUE;
  }
}

/**
 * Returns the correct span class for a region
 */
function _bootstrap_base_content_span($columns = 1) {
  $class = FALSE;
  
  switch($columns) {
    case 1:
      $class = 'span12';
      break;
    case 2:
      $class = 'span8';
      break;
    case 3:
      $class = 'span6';
      break;
  }
  
  return $class;
}