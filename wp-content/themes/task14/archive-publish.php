<?php get_header(); ?>

<main class="p-publish">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php 
                dimox_breadcrumbs();
                $paged = ( get_query_var("paged") ? get_query_var("paged") : 1);
            ?>
        </div>
    </div>

    <div class="c-headpage">
        <h2 class="c-title">出版物</h2>
        <p>ひかり税理士法人では、税務・会計・経営・相続などに関する書籍の執筆を行っています。</p>
    </div>

    <div class="l-container">
        <div class="p-publish__content">
            <ul class="c-gridpost">
                <?php query_posts("post_type=publish&posts_per_page=12&post_status=publish&paged=$paged"); ?>
                <?php while (have_posts()) : the_post(); ?>

                <li class="c-gridpost__item">
                    <div class="c-gridpost__thumb">
                        <?php the_post_thumbnail(); ?>
                    </div>

                    <div class="c-gridpost__info">
                        <p class="datepost"><?php echo get_the_date('Y年m月d日'); ?></p>
                        <h3><?php the_title(); ?></h3>
                        <p class="price">¥<?php the_field('price'); ?> (税別)</p>
                        <a href="<?php the_permalink(); ?>" class="c-btnview">詳しく見る</a>
                    </div>
                </li>

                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>

        <div class="c-pagination">
            <?php if (function_exists('pagination_bar')) pagination_bar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>