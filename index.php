<!DOCTYPE html>
<html lang="en">

<? get_header(); ?>

<body>
    <header class="header">
        <div class="header__content">
            <div class="header__inner">
                <h1 class="header-logo">
                    <a href="">Front Blog</a>
                </h1>

                <div class="drawer_bg"></div>
                <nav class="header-nav">
                    <ul class="header-nav-list">
                        <li class="header-nav-list__item"><a href="">ホーム</a></li>
                        <li class="header-nav-list__item"><a href="">プロフィール</a></li>
                        <li class="header-nav-list__item"><a href="">お問い合わせ</a></li>
                    </ul>
                </nav>

                <div class="header-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>
        </div>

        <div class="first-view">
            <div class="swiper">
                <!-- スライド要素を包む要素 -->
                <div class="swiper-wrapper">
                    <!-- 各スライド -->
                    <div class="swiper-slide">
                        <img src="https://pengi-n.co.jp/blog/wp-content/themes/penginblog/assets/img/front/kv01.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://pengi-n.co.jp/blog/wp-content/themes/penginblog/assets/img/front/kv01.png" alt="">

                    </div>
                    <div class="swiper-slide">
                        <img src="https://pengi-n.co.jp/blog/wp-content/themes/penginblog/assets/img/front/kv01.png" alt="">

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
                    <div class="tab1 tab-title selected">人気記事</div>
                    <div class="tab2 tab-title">プログラミング</div>
                    <div class="tab3 tab-title">デザイン</div>
                    <div class="tab4 tab-title">WordPress</div>
                </div>

                <div class="post show">
                    <div class="post__inner">
                        <?php
                        $newslist = get_posts(array(
                            'category_name' => '人気記事',
                            'posts_per_page' => 6
                        ));
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
                        wp_reset_postdata(); ?>
                    </div>
                </div>

                <div class="post">
                    <div class="post__inner">
                        <?php
                        $newslist = get_posts(array(
                            'category_name' => 'プログラミング',
                            'posts_per_page' => 6
                        ));
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
                        wp_reset_postdata(); ?>
                    </div>
                </div>

                <div class="post">
                    <div class="post__inner">
                        <?php
                        $newslist = get_posts(array(
                            'category_name' => 'デザイン',
                            'posts_per_page' => 6
                        ));
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
                        wp_reset_postdata(); ?>
                    </div>
                </div>

                <div class="post">
                    <div class="post__inner">
                        <?php
                        $newslist = get_posts(array(
                            'category_name' => 'WordPress',
                            'posts_per_page' => 6
                        ));
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
                        wp_reset_postdata(); ?>
                    </div>
                </div>

            </main>

            <aside class="insidesp">
                <div class="widget">
                    <h4 class="widget__title profiel">
                        プロフィール
                    </h4>
                    <div class="widget__inner">
                        <div class="profiel__img">
                            <img src="https://kyomoneyblog.com/wp-content/uploads/7051304f37a3653aa23d9cdad05e7688-96x96.png" alt="">
                        </div>
                        <p class="widget__name">さかもと</p>
                        <div class="widget__text">
                            テキストテキストテキストテキ
                            ストテキストテキストテキストテ
                            キストテキストテキスト
                        </div>
                    </div>

                </div>
                <div class="widget new-post">
                    <h4 class="widget__title">最新記事</h4>
                    <ul class="show_num">
                        <li>
                            <a href="">
                                <figure class="new-post__img">
                                    <img src="https://kyomoneyblog.com/wp-content/uploads/%E6%AD%A3%E7%A4%BE%E5%93%A1%E7%99%BB%E7%94%A8%E8%90%BD%E3%81%A1%E3%82%8B%E4%BA%BA%E3%81%AE%E7%89%B9%E5%BE%B4-1-160x160.jpg" alt="">
                                </figure>
                                <div class="widget__text">
                                    【経験者目線】正社員登用制度に落ちる人、受かる人の特徴は？
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <figure class="new-post__img">
                                    <img src="https://kyomoneyblog.com/wp-content/uploads/%E6%AD%A3%E7%A4%BE%E5%93%A1%E7%99%BB%E7%94%A8%E8%90%BD%E3%81%A1%E3%82%8B%E4%BA%BA%E3%81%AE%E7%89%B9%E5%BE%B4-1-160x160.jpg" alt="">
                                </figure>
                                <div class="widget__text">
                                    【経験者目線】正社員登用制度に落ちる人、受かる人の特徴は？
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <figure class="new-post__img">
                                    <img src="https://kyomoneyblog.com/wp-content/uploads/%E6%AD%A3%E7%A4%BE%E5%93%A1%E7%99%BB%E7%94%A8%E8%90%BD%E3%81%A1%E3%82%8B%E4%BA%BA%E3%81%AE%E7%89%B9%E5%BE%B4-1-160x160.jpg" alt="">
                                </figure>
                                <div class="widget__text">
                                    【経験者目線】正社員登用制度に落ちる人、受かる人の特徴は？
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <figure class="new-post__img">
                                    <img src="https://kyomoneyblog.com/wp-content/uploads/%E6%AD%A3%E7%A4%BE%E5%93%A1%E7%99%BB%E7%94%A8%E8%90%BD%E3%81%A1%E3%82%8B%E4%BA%BA%E3%81%AE%E7%89%B9%E5%BE%B4-1-160x160.jpg" alt="">
                                </figure>
                                <div class="widget__text">
                                    【経験者目線】正社員登用制度に落ちる人、受かる人の特徴は？
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <figure class="new-post__img">
                                    <img src="https://kyomoneyblog.com/wp-content/uploads/%E6%AD%A3%E7%A4%BE%E5%93%A1%E7%99%BB%E7%94%A8%E8%90%BD%E3%81%A1%E3%82%8B%E4%BA%BA%E3%81%AE%E7%89%B9%E5%BE%B4-1-160x160.jpg" alt="">
                                </figure>
                                <div class="widget__text">
                                    【経験者目線】正社員登用制度に落ちる人、受かる人の特徴は？
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

        </div>
    </div>
    <?php get_footer(); ?>
</body>

</html>