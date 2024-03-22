<!DOCTYPE html>
<html lang="en">

<? get_header(); ?>

<body>
    <header class="header">
        <?php get_template_part('header-menu'); ?>
        <div class="first-view">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/asset/img/noname.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/asset/img/noname.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/asset/img/noname.png" alt="">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </header>

    <div class="content">
        <div class="content__inner">
            <main>
                <div class="post-tab">
                    <div class="tab1 tab-title selected">最新記事</div>
                    <div class="tab2 tab-title">人気記事</div>
                    <div class="tab3 tab-title">プログラミング</div>
                    <div class="tab4 tab-title">デザイン</div>
                </div>

                <div class="post show">
                    <div class="post__inner">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $the_query = new WP_Query(array(
                            'post_status' => 'publish',
                            'post_type' => 'post', //　ページの種類（例、page、post、カスタム投稿タイプ名）
                            'paged' => $paged,
                            'posts_per_page' => 6, // 表示件数
                            'orderby'     => 'date',
                            'order' => 'DESC'
                        ));
                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post();
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
                        else :
                            echo '<div><p>ありません。</p></div>';
                        endif;
                        ?>
                        </ul>
                    </div>

                    <div class="pagination">
                        <?php
                        global $wp_rewrite;
                        $paginate_base = get_pagenum_link(1);
                        if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
                            $paginate_format = '';
                            $paginate_base = add_query_arg('paged', '%#%');
                        } else {
                            $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') .
                                user_trailingslashit('page/%#%/', 'paged');
                            $paginate_base .= '%_%';
                        }
                        echo paginate_links(array(
                            'base' => $paginate_base,
                            'format' => $paginate_format,
                            'total' => $the_query->max_num_pages,
                            'mid_size' => 1,
                            'current' => ($paged ? $paged : 1),
                            'prev_text' => '<',
                            'next_text' => '>',
                        ));
                        ?>
                    </div>
                </div>

                <div class="post">
                    <div class="post__inner">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 6,
                            'meta_key' => 'views',
                            'orderby' => 'meta_value_num'
                        );

                        $the_query = new WP_Query($args);
                        if ($the_query->have_posts()) :
                        ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
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
                        <?php else : ?>
                            <div>
                                <p>まだ記事はありません。</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="post">
                    <div class="post__inner">
                        <?php
                        $newslist = get_posts(array(
                            'category_name' => 'プログラミング',
                            'posts_per_page' => 6
                        ));
                        if ($newslist) :
                            foreach ($newslist as $post) :
                                setup_postdata($post);
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
                        <?php endforeach;
                            wp_reset_postdata();
                        else :
                            echo '<p>まだ記事はありません。</p>';
                        endif;
                        ?>
                    </div>
                </div>


                <div class="post">
                    <div class="post__inner">
                        <?php
                        $newslist = get_posts(array(
                            'category_name' => 'デザイン',
                            'posts_per_page' => 6
                        ));
                        if ($newslist) :
                            foreach ($newslist as $post) :
                                setup_postdata($post);
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
                            endforeach;
                            wp_reset_postdata();
                        else :
                            ?>
                            <p>まだ記事はありません。</p>
                        <?php endif; ?>
                    </div>
                </div>


            </main>

            <?php get_sidebar(); ?>

        </div>
    </div>
    <?php get_footer(); ?>
</body>

</html>