<?php get_header(); ?>

<main class="p-publish">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php dimox_breadcrumbs(); ?>
        </div>
    </div>

    <div class="l-container">
        <div class="p-publish__single">
            <div class="feature_img">
                <?php the_post_thumbnail('', ['class' => 'orbit-image', 'loading' => false]); ?>
            </div>

            <div class="p-publish__info">
                <h2><?php the_title();?></h2>
                <?php 
                    $date_string = get_field('publication_date');
                    $date = date("Y年m月d日", strtotime($date_string));
                ?>
                <p class="datepost"><?php echo $date; ?> 発行</p>
                <!-- echo get_the_date('Y年m月d日'); -->

                <p class="author">
                    著者  : <?php the_field('author'); ?><br>
                    出版社 : <?php the_field('publisher'); ?>
                </p>

                <p class="price">¥<?php the_field('price'); ?> (税別)</p>

                <div class="desc">
                    <p>■<?php the_field('description'); ?></p>
                    <h4>目次</h4>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <div class="l-btn">
            <div class="c-btn c-btn--small2">
                <a href="<?php echo home_url(); ?>/publish">出版物一覧へ</a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>