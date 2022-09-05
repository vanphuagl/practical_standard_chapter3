<?php get_header(); ?>

<main class="p-news">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php dimox_breadcrumbs(); ?>
        </div>
    </div>

    <div class="c-headpage">
        <h2 class="c-title">ニュース・お知らせ</h2>
    </div>

    <div class="p-news__content">
        <div class="l-container">
            <ul class="c-tabs2">
                <?php 
                    $args = array(
                        'type'      => 'post',
                        'hide_empty'  => 1,
                        'include' => '2, 3, 4, 5, 6',
                    );
                       
                    $categories = get_categories( $args );
                ?>

                <li class="active" data-content="cat_5" data-color="cat_5">
                    すべて
                </li>

                <?php foreach ($categories as $category): ?>
                <?php 
                    $active = 'active';
                ?>

                <li class="">
                    <?php echo '<a class="u-rede" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>'; ?>
                </li>

                <?php endforeach; ?>
            </ul>

            <div class="c-tabs__content">
                <ul class="c-listpost active" id="cat_1">
                    <?php 
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                        "post_type" => 'post',
                        "post_status" => 'publish',
                        'posts_per_page'=> 5,       
                        'paged'=>$paged
                        );
                    ?>

                    <?php query_posts("post_type=post&posts_per_page=5&post_status=publish&paged=$paged"); ?>
                    <?php $getposts = new WP_query($args);  ?>
                    <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

                    <li class="c-listpost__item">
                        <div class="c-listpost__info">
                            <span class="datepost"><?php echo get_the_date('Y年m月d日'); ?></span>
                            <?php 
                                $cate = get_the_category();
                            ?>
                            <?php foreach ($cate as $category): ?>
                            <span class="cat">
                                <i class="c-dotcat" style="background-color: <?php echo $category->description  ?>"></i>
                                <?php echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>'; ?>
                            </span>
                            <?php endforeach; ?>
                        </div>

                        <h3 class="titlepost"><a href="<?php the_permalink();?>"> <?php the_title();?> </a></h3>
                    </li>

                    <?php endwhile; wp_reset_postdata(); ?>

                    <div class="c-pagination">
                        <?php if (function_exists('pagination_bar')) pagination_bar(); ?>
                    </div>
                </ul>

                <?php foreach($categories as $category): ?>
                <ul class="c-listpost" id="cat_<?php echo $category->cat_ID ?>">
                    <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            "post_type" => 'post',
                            "post_status" => 'publish',
                            'posts_per_page'=> 5,       
                            'paged'=>$paged,
                            'cat' => $category->cat_ID,
                        );  
                    ?>

                    <?php $getposts = new WP_query($args); ?>
                    <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

                    <li class="c-listpost__item">
                        <div class="c-listpost__info">
                            <span class="datepost"><?php echo get_the_date('Y年m月d日'); ?></span>
                            <?php 
                                $categories = get_the_category();
                            ?>
                            <?php foreach ($categories as $category): ?>
                            <span class="cat">
                                <i class="c-dotcat" style="background-color: <?php echo $category->description ?>"></i>
                                <?php echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>'; ?>
                            </span>
                            <?php endforeach; ?>
                        </div>

                        <h3 class="titlepost"><a href="<?php the_permalink();?>"> <?php the_title();?> </a></h3>
                    </li>

                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>