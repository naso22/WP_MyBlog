<!DOCTYPE html>
<html lang="en">

<? get_header(); ?>
<header class="header">
    <?php get_template_part('header-menu'); ?>
</header>

<body>
    <div class="content">
        <div class="content__inner content__container">
            <main class="post-main category-main">
                <div class="article-head">
                    <?php breadcrumb(); ?>
                    <h1><?php single_cat_title(); ?>記事の一覧</h1>
                </div>
                <div class="post show">
                    <div class="post__inner">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $current_category = single_cat_title('', false); // 現在のカテゴリー名を取得

                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 10, // 最大表示数を10に設定
                            'paged' => $paged,
                            'category_name' => $current_category // 現在のカテゴリー名を使用
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                        ?>
                                <div class="l-wrapper_02 card-radius_02">
                                    <a href="<?php the_permalink(); ?>">
                                        <article class="card_02">
                                            <div class="card__header_02">
                                                <figure class="card__thumbnail_02">
                                                    <?php the_post_thumbnail('full', array('class' => 'card__image_02')); ?>
                                                </figure>
                                                <time class="card__day" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                                                <p class="card__title_02"><?php the_title(); ?></p>
                                                <ul>
                                                    <li class="post-tag">
                                                        <span>
                                                            <?php
                                                            $tags = get_the_tags();
                                                            if ($tags) {
                                                                $first_tag = reset($tags);
                                                                echo '#' . $first_tag->name;
                                                            }
                                                            ?>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </article>
                                    </a>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="pagination">
                    <?php
                    if ($query->max_num_pages > 1) { // 投稿が複数ページに渡る場合にのみページネーションを表示
                        $args = array(
                            'mid_size' => 1,
                            'prev_text' => '&lt;',
                            'next_text' => '&gt;',
                            'screen_reader_text' => ' ',
                        );
                        the_posts_pagination($args);
                    }
                    ?>
                </div>
            </main>

            <?php get_sidebar(); ?>
        </div><!-- /content__inner -->
    </div>
    <?php get_footer(); ?>

    <?php get_sidebar(); ?>
    <?php get_footer(); ?>
</body>

</html>