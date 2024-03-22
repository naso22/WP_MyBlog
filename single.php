<!DOCTYPE html>
<html lang="en">

<? get_header(); ?>

<body>
    <header class="header">
        <?php get_template_part('header-menu'); ?>
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

            <?php get_sidebar(); ?>

        </div>
    </div>
    <?php get_footer(); ?>
</body>

</html>