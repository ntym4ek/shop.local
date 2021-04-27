<?php

/**
 * Checkout pane callback: returns the contents View for inclusion in the checkout form.
 */
function checkout_address_pane_checkout_form($form, &$form_state, $checkout_pane, $order)
{
  $checkout_form = [
    '#type' => 'container',
    '#attributes' => ['id' => ['checkout-address'], 'class' => ['checkout-address']],
  ];
  $checkout_form['title'] = [
    '#markup' => '<h2>Адрес доставки</h2>',
  ];
  $checkout_form['address'] = [
    '#type' => 'textarea',
    '#rows' => 2,
  ];

  return $checkout_form;
}

/**
 * Checkout pane callback: validation callback.
 */
function checkout_address_pane_checkout_form_validate($form, &$form_state, $checkout_pane, $order)
{
}

/**
 * Checkout pane callback: submit callback.
 */
function checkout_address_pane_checkout_form_submit($form, &$form_state, $checkout_pane, $order)
{
  $address = $form_state['values']['checkout_address_pane']['address'];

  // сохранить введённый адрес в массиве с данными о доставке
  if (!empty($address)) {
    $wrapper = entity_metadata_wrapper('commerce_order', $order);
    $delivery_data = json_decode($wrapper->field_delivery_data->value());
    $delivery_data['address'] = $address;
    $wrapper->field_delivery_data = json_encode($delivery_data);
  }
}
