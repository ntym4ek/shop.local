<?php
/**
 * @file
 * Stub file for "page" theme hook [pre]process functions.
 */

/**
 * Pre-processes variables for the "node" theme hook.
 *
 * See template for list of available variables.
 *
 * @see node.tpl.php
 *
 * @ingroup theme_preprocess
 */
function shop_preprocess_field(&$vars)
{
  switch ($vars["element"]["#field_name"]) {
    case 'field_pd_cultures':
      $arr = [];
      foreach($vars["items"] as $item) {
        $arr[] = $item['#markup'];
      }
      $vars['items'] = [0 => implode(', ', $arr)];
      break;

    case 'field_pd_ingredients':
      foreach($vars["items"] as $key => $item) {
        $entity = array_shift($item["entity"]["field_collection_item"]);
        $vars["items"][$key] = $entity["field_pd_i_ingredient"][0]["#markup"] . ', ' . (int)$entity["field_pd_i_concentration"][0]["#markup"] . ' г/л';
      }
      break;
  }
}
