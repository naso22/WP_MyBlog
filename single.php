<!DOCTYPE html>
<html lang="en">

<? get_header(); ?>

<body>
    <header class="header">
        <div class="header__content">
            <div class="header__inner">
                <h1 class="header-logo">
                    <a href="<?php echo home_url(); ?>">Front Blog</a>
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
    </header>

    <div class="content">
        <div class="content__inner">
            <main class="post-main">
                <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="ホームのURL">
                            <span itemprop="name">ホーム</span>
                        </a>
                        <meta itemprop="position" content="1" />
                    </li>

                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="カテゴリー1のURL">
                            <span itemprop="name">カテゴリー1</span>
                        </a>
                        <meta itemprop="position" content="2" />
                    </li>

                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="カテゴリー2のURL">
                            <span itemprop="name">カテゴリー2</span>
                        </a>
                        <meta itemprop="position" content="3" />
                    </li>
                </ol>

                <section>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <article class="article__wrapper">
                                <div class="article-head">
                                    <ul>
                                        <li>
                                            <time class="article__time" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_time('Y-m-d')); ?></time>
                                        </li>
                                    </ul>

                                    <h1>
                                        <?php the_title(); ?>
                                    </h1>

                                    <div class="thum">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </article>
                    <?php endwhile;
                    endif; ?>
                </section>
            </main>

            <aside class="insidesp">
                <div class="widget">
                    <h4 class="widget__title profiel">
                        プロフィール
                    </h4>
                    <div class="widget__inner">
                        <div class="profiel__img">

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
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 5,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                        $the_query = new WP_Query($args);
                        if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <figure class="new-post__img">
                                            <?php the_post_thumbnail('full'); ?>
                                        </figure>
                                        <div class="widget__text">
                                            【<?php the_title(); ?>
                                        </div>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                </div>
            </aside>

        </div>
    </div>
    <?php get_footer(); ?>
</body>

</html>