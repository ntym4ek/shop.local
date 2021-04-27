<?php

/**
 * Checkout pane callback: returns the contents View for inclusion in the checkout form.
 */
function checkout_services_pane_checkout_form($form, &$form_state, $checkout_pane, $order)
{
  $services = [
    'Консультация агронома', 'Диагностика полей', 'Сопровождение культуры', 'Лабораторные исследованичя', 'Ответственное хранение', 'Доставка'
  ];

  $checkout_form = [
    '#type' => 'container',
    '#attributes' => ['id' => ['checkout-services'], 'class' => ['checkout-services']],
  ];
  $checkout_form['title'] = [
    '#markup' => '<h2>Услуги</h2>',
  ];
  $checkout_form['services'] = [
    '#type' => 'container',
    '#attributes' => ['class' => ['services-list']],
  ];

  foreach($services as $key => $service) {
    $checkout_form['services']['s-' . $key] = [
      '#type' => 'checkbox',
      '#title' => '<div class="box"></div><div>' . $service . '</div>',
    ];
  }

  return $checkout_form;
}

/**
 * Checkout pane callback: validation callback.
 */
function checkout_services_pane_checkout_form_validate($form, &$form_state, $checkout_pane, $order)
{
}

/**
 * Checkout pane callback: submit callback.
 */
function checkout_services_pane_checkout_form_submit($form, &$form_state, $checkout_pane, $order)
{
}
