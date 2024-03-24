<!DOCTYPE html>
<html lang="en">

<? get_header(); ?>
<header class="header">
    <?php get_template_part('header-menu'); ?>
</header>

<body>

    <div class="content">
        <div class="content__inner">
            <main class="post-main category-main">
                <?php
                $cat = get_the_category();
                $catname = $cat[0]->cat_name;
                ?>
                <div class="article-head">
                    <h1>
                        <?php echo $catname; ?>の記事一覧
                    </h1>
                </div>

                <div class="post show">
                    <div class="post__inner">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'category_name' => $catname,
                            'posts_per_page' => 10,
                            'paged' => $paged
                        );
                        $query = new WP_Query($args);
                        ?>
                        <?php if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
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
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                    </div>
                </div>

                <?php
                            if (function_exists("pagination")) {
                                pagination($wp_query->max_num_pages);
                            }
                ?>
            <?php endif; ?>
            </main>

            <?php get_sidebar(); ?>

        </div>
    </div>
    <?php get_footer(); ?>
</body>

</html>