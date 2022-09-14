<?php get_header(); ?>

<main class="p-news">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php dimox_breadcrumbs(); ?>
        </div>
    </div>

    <div class="p-news__content">
        <div class="l-container">
            <div class="feature_img">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="c-ttlpostpage">
                <h2><?php the_title(); ?></h2>
                <span><?php echo get_the_date('Y年m月d日'); ?></span>

                <?php $categories = get_the_category(); ?>
                <?php foreach ($categories as $category): ?>
                <span class="cat">
                    <i class="c-dotcat" style="background-color: <?php echo $category->description ?>"></i>
                    <?php echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>'; ?>
                </span>
                <?php endforeach; ?>
            </div>

            <div class="single__content">
                <?php the_content(); ?>
            </div>

            <div class="l-btn">
                <div class="c-btn c-btn--small2">
                    <a href="<?php echo home_url(); ?>/news">ニュース一覧を見る</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>