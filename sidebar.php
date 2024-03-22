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
                            都内でフロントエンジニアとして働いています。<br />
                            本サイトではフロントエンドを中心に情報を発信しています
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