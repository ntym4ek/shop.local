<?php

/**
 * @file
 * Bootstrap sub-theme.
 *
 * Place your custom PHP code in this file.
 */

/**
 * Implements hook_preprocess_HOOK().
 */
function shop_preprocess_html(&$vars)
{
  // Подлкючаем Google шрифты.
    drupal_add_html_head([
      '#tag' => 'link',
      '#attributes' => array(
        'href' => 'https://fonts.gstatic.com',
        'rel' => 'preconnect',
      ),
    ], 'google_font_init');
    drupal_add_html_head([
      '#tag' => 'link',
      '#attributes' => array(
        'href' => 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700&display=swap',
        'rel' => 'stylesheet',
      ),
    ], 'google_font_load');
}
