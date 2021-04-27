<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>
<header id="navbar" role="banner" class="navbar">
  <div class="line-1">
    <div class="container">
      <div class="navbar-top">
        <div class=""></div>
        <div class="navbar-user" role="navigation">
          <?php if (!empty($secondary_nav)): ?>
            <?php print render($secondary_nav); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="line-2">
    <div class="container">
      <div class="navbar-header">
        <div class="brand">
          <?php if ($logo): ?>
            <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              <img src="/sites/default/files/images/logo.png" alt="<?php print t('Home'); ?>" />
            </a>
          <?php endif; ?>

          <?php if (!empty($site_name)): ?>
            <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
          <?php endif; ?>
        </div>

        <div class="navigation" role="navigation">
        <?php if (!empty($primary_nav)): ?>
          <?php print render($primary_nav); ?>
        <?php endif; ?>
        <?php if (!empty($page['navigation'])): ?>
          <?php hide($page["navigation"]["commerce_cart_cart"]); ?>
          <?php print render($page['navigation']); ?>
        <?php endif; ?>
        </div>

        <div class="search">
          <?php
          $search_page = entity_load_single('search_api_page', 1);
          $search_form = drupal_get_form('search_api_page_search_form', $search_page);
          print drupal_render($search_form);
          ?>
        </div>
        <div class="cart">
          <? print render($page["navigation"]["commerce_cart_cart"]); ?>
        </div>

      </div>
    </div>
  </div>
</header>

<div class="undertop" style="background-image: url(/sites/default/files/images/_dev/bg-header.jpg);">
  <div class="container">
    <div class="content">
      <div class="breadcrumbs">
        <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      </div>
      <div class="title">
        <?php print render($title_prefix); ?>
        <?php if (!empty($title)): ?>
          <h1><?php print $title; ?></h1>
        <?php endif; ?>
      </div>
      <?php print render($title_suffix); ?>
    </div>
  </div>
</div>

<div class="main-container container">

  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->

  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>

      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>

  <footer class="container">
    <?php if (!empty($page['footer'])):
      print render($page['footer']);
    endif; ?>
    <div class="footer">
      <div class="c1">
        <img src="/sites/default/files/images/logo.png" alt="<?php print t('Home'); ?>" />
      </div>
      <div class="c2">
        <strong>О КОМПАНИИ</strong>
        <ul>
          <li><a href="">Общая информация</a></li>
          <li><a href="">Доставка и оплата</a></li>
          <li><a href="">Отзывы</a></li>
          <li><a href="">Как купить</a></li>
          <li><a href="">Общие условия покупки</a></li>
        </ul>
      </div>
      <div class="c3">
        <strong>КОНТАКТЫ</strong>
        <ul>
          <li><a href="">Региональные  представители</a></li>
          <li>
            Мы в соцсетях<br />
            <a href=""><img src="/sites/default/files/images/_dev/vk.png" alt="vkontakte"></a>
            <a href=""><img src="/sites/default/files/images/_dev/in.png" alt="instagram"></a>
            <a href=""><img src="/sites/default/files/images/_dev/yt.png" alt="youtube"></a>
          </li>
        </ul>
      </div>
      <div class="c4">
        <strong>ПОДПИШИТЕСЬ<br />НА НАШУ РАССЫЛКУ!</strong>
        <ul>
          <li>Новинки, скидки, предложения!</li>
          <li>
            <input type="text" class="form-control">
            <p>Нажимая на кнопку, я подтверждаю своё согласие с “Политикой по обработке персональных данных”</p>
          </li>
        </ul>
      </div>
    </div>
  </footer>
