<?php get_header() ;?>

<main class="p-news">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php dimox_breadcrumbs(); ?>
        </div>
    </div>

    <div class="c-headpage">
        <h2 class="c-title"><?php single_cat_title(); ?></h2>

        <?php  
                $category = single_term_title("", false);
                $catid = get_cat_ID( $category );
                $paged= (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
            ?>
    </div>

    <div class="p-news__content">
        <div class="l-container">
            <ul class="c-listpost">

                <?php query_posts("cat=$catid&post_type=post&posts_per_page=5&post_status=publish&paged=$paged"); ?>
                <?php while (have_posts()) : the_post(); ?>
                <?php $categories = get_the_category(); ?>
                <?php foreach ($categories as $category): ?>
                <?php if($catid === $category->term_id): ?>
                <li class="c-listpost__item" id="cat_<?php echo $category->term_id ?>">
                    <div class="c-listpost__info">
                        <span class="datepost"><?php echo get_the_date('Y年m月d日'); ?></span>
                        <span class="cat">
                            <i class="c-dotcat" style="background-color: <?php echo $category->description ?>"></i>
                            <?php echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>'; ?>
                        </span>
                    </div>
                    <h3 class="titlepost"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
                </li>
                <?php endif ?>
                <?php endforeach; ?>
                <?php endwhile; wp_reset_postdata(); ?>

            </ul>

            <div class="c-pagination">
                <?php if (function_exists('pagination_bar')) pagination_bar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer() ;?>