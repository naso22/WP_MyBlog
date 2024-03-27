<?php
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}
?>

<?php
add_action('parse_query', 'my_parse_query');
function my_parse_query($query)
{
  if (!isset($query->query_vars['paged']) && isset($query->query_vars['page']))
    $query->query_vars['paged'] = $query->query_vars['page'];
}

?>

<?php
function category_link_custom($query = array())
{
  if (isset($query['name']) && $query['name'] === 'page' && isset($query['page'])) {
    $paged = trim($query['page'], '/');
    if (is_numeric($paged)) {
      unset($query['name']);
      unset($query['page']);
      $query['paged'] = (int) $paged;
    }
  }
  return $query;
}
add_filter('request', 'category_link_custom');
?>

<?php
function breadcrumb()
{
?>
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="<?php echo esc_url(home_url()); ?>">
        <span itemprop="name">ブログトップ</span>
      </a>
      <meta itemprop="position" content="1">
    </li>

    <!-- 固定ページの子ページの場合 -->
    <?php if (is_page() && $post->post_parent) : ?>
      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_page_link($post->post_parent); ?>" href="<?php echo get_page_link($post->post_parent); ?>">
          <span itemprop="name"><?php echo get_the_title($post->post_parent); ?></span>
        </a>
        <meta itemprop="position" content="2">
      </li>

      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name"><?php echo get_the_title(); ?></span>
        <meta itemprop="position" content="3">
      </li>

      <!-- 固定ページの場合 -->
    <?php elseif (is_page()) : ?>
      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name"><?php echo get_the_title(); ?></span>
        <meta itemprop="position" content="2">
      </li>

      <!-- 年別アーカイブページの場合 -->
    <?php elseif (is_year()) : ?>
      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
          <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
        </a>
        <meta itemprop="position" content="2">
      </li>

      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name"><?php echo get_query_var('year'); ?>年</span>
        <meta itemprop="position" content="3">
      </li>

      <!-- 月別アーカイブページの場合 -->
    <?php elseif (is_month()) : ?>
      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
          <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
        </a>
        <meta itemprop="position" content="2">
      </li>

      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_year_link(get_query_var("year")); ?>?post_type=<?php echo esc_html(get_post_type_object(get_post_type())->name); ?>" href="<?php echo get_year_link(get_query_var("year")); ?>?post_type=<?php echo esc_html(get_post_type_object(get_post_type())->name); ?>">
          <span itemprop="name"><?php echo get_query_var('year'); ?>年</span>
        </a>
        <meta itemprop="position" content="3">
      </li>

      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name"><?php echo get_query_var('monthnum'); ?>月</span>
        <meta itemprop="position" content="4">
      </li>

      <!-- タクソノミーのアーカイブページの場合 -->
    <?php elseif (is_tax()) : ?>
      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
          <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
        </a>
        <meta itemprop="position" content="2">
      </li>

      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name"><?php single_term_title(); ?></span>
        <meta itemprop="position" content="3">
      </li>

      <!-- カスタム投稿のアーカイブページの場合 -->
    <?php elseif (is_post_type_archive()) : ?>
      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name"><?php post_type_archive_title(); ?></span>
        <meta itemprop="position" content="2">
      </li>

      <!-- 記事ページの場合 -->
    <?php elseif (is_single()) : ?>
      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
          <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
        </a>
        <meta itemprop="position" content="2">
      </li>

      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name"><?php single_post_title(); ?></span>
        <meta itemprop="position" content="3">
      </li>

      <!--  404エラーページの場合 -->
    <?php elseif (is_404()) : ?>
      <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name">404</span>
        <meta itemprop="position" content="2">
      </li>

    <?php endif; ?>
  </ol>
<?php
}
