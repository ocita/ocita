<?php
function ocita_preprocess_token_tree(&$variables) {
  if (array_intersect(array('node', 'user'), $variables['token_types'])) {
    $variables['recursion_limit'] = 2;
  }
}
/**
 * @file
 * template.php
 */

// add google fonts, font-awesome & js hacks
function ocita_preprocess_html(&$variables) {
 drupal_add_css('https://fonts.googleapis.com/css?family=Open+Sans:400,700', array('type' => 'external'));
 drupal_add_css('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array('type' => 'external'));
 drupal_add_js(drupal_get_path('theme', 'ocita') . '/js/hacks.js');
 }

 // add placeholder text to search form
function ocita_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'views-exposed-form-vejledninger-page-1') {
    // HTML5 placeholder attribute
    $form['views-exposed-form-vejledninger-page-1']['#attributes']['placeholder'] = t('Find svar i dokumentationen');
  }
}

// change page title on user/login and user/password page
function ocita_preprocess_page(&$vars) {
  if (arg(0) == 'user') {
   switch (arg(1)) {
     case 'password':
       drupal_set_title(t('Ny adgangskode'));
       break;
     case '':
     case 'login':
       drupal_set_title(t('Log ind'));
       break;
   }
 }
 if (isset($variables['node']->type)) {
   $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
 }
}

// show fill username
function ocita_preprocess_username(&$vars) {
  $vars['name'] = $vars['name_raw'];
}


function drupal_urlencode($text) {
  if (variable_get('clean_url', '0')) {
    return str_replace(array('%2F', '%3F', '%3D', '%26', '%2523', '%2B'),
                       array('/', '?', '=', '&', '#', '+'),
                       urlencode($text));
  }
  else {
    return str_replace('%2F', '/', urlencode($text));
  }
}

function ocita_theme_registry_alter(&$theme_registry)
{
    if(isset($theme_registry["file_entity"]))
    {
        $OC_template_repo = "file_entity";
        $ModuleTemplatePath = drupal_get_path('theme','ocita') . "/templates";
        $theme_registry["file_entity"]["template"] = $OC_template_repo;
        $theme_registry["file_entity"]["path"] =  $ModuleTemplatePath; 
    }
}

//require_once(drupal_get_path('theme', 'bootstrap') . '/theme/process.inc');
