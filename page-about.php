<?php
/*
Template Name: このサイトについて
*/
?>

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
                <section>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <article class="article__wrapper">
                                <div class="article-head">
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