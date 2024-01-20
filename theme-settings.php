<?php

/**
 * Implements hook_form_theme_settings_alter().
 */
function skyseldulac_new_form_system_theme_settings_alter(&$form, $form_state) {
  $form['logo']['title_hide'] = [
    '#title' => t('Logo incorporates title and slogan'),
    '#type' => 'checkbox',
    '#default_value' => theme_get_setting('title_hide')
  ];
  $form['skyseldulac_new_menus'] = [
    '#type' => 'details',
    '#title' => 'Menu',
    '#open' => TRUE,
    '#tree' => true
  ];
  $menus_list = \Drupal::entityTypeManager()->getStorage('menu')->loadMultiple();
  $configs = theme_get_setting('skyseldulac_new_menus');
  foreach ($menus_list as $key => $menu) {
    $menuId = $menu->get("id");
    $form['skyseldulac_new_menus'][$menuId] = [
      '#type' => 'checkbox',
      '#title' => $menu->get("label"),
      '#default_value' => $configs[$menuId] ?? false
    ];
  }
}