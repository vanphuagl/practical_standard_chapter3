<?php get_header() ;?>

<div class="c-mainvisual">
    <div class="js-slider">

        <?php $images = get_field('mainvisual', 'option'); ?>
        <?php if ($images): ?>
            <?php foreach ($images as $image): ?>
                <img src="<?php echo esc_url($image['image']['url']);?>"
                    alt="<?php echo esc_attr($image['image']['alt']); ?>" />
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
</div>
<!-- end mainvisual -->

<main class="p-home">
    <section class="service">
        <div class="l-container">
            <h2 class="c-title"><span>幅広い案件に対応できるひかりのワンストップサービス</span>目的に応じて、最適な方法をご提案できます</h2>
            <div class="service__inner">
                <div class="service__item">
                    <img src="<?php bloginfo('template_directory') ?>/assets/img/img_service01.png" alt="">
                </div>
                <div class="service__item">
                    <img src="<?php bloginfo('template_directory') ?>/assets/img/img_service02.png" alt="">
                </div>
                <div class="service__item">
                    <img src="<?php bloginfo('template_directory') ?>/assets/img/img_service03.png" alt="">
                </div>
                <div class="service__item">
                    <img src="<?php bloginfo('template_directory') ?>/assets/img/img_service04.png" alt="">
                </div>
            </div>
            <div class="l-btn l-btn--2btn">
                <div class="c-btn">
                    <a href="<?php echo home_url() ?>/services">ひかり税理士法人のサービス一覧を見る</a>
                </div>
                <div class="c-btn">
                    <a href="<?php echo home_url() ?>/cases">ひかり税理士法人の成功事例を見る</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end service -->

    <section class="news">
        <div class="l-container">
            <h2 class="c-title1">
                <span class="ja">ニュース</span>
                <span class="en">News</span>
            </h2>
            <div class="news__inner">
				<ul class="c-tabs">
					<?php 
                        $args = array(
                            'type'      => 'post',
                            'hide_empty'  => 1,
                            'include' => '2, 3, 4, 5, 6',
                        );
                       
                        $categories = get_categories( $args );
                    ?>
					
					<li class="active" data-content="cat_1" data-color="cat_1">
                        すべて
                    </li>

					<?php foreach ($categories as $category): ?>
                        <?php 
                            $active = 'active';
                        ?>
                        
						<li 
                            data-content="cat_<?php echo $category->cat_ID ?>" 
                            data-color="<?php echo $category->description  ?>" 
                            class=""
                        >
                            <?php
                                echo $category->name;
                            ?>
                        </li>
                    <?php endforeach; ?>
				</ul>
                <!-- end tabs -->
                
                <div class="c-tabs__content">
					<!-- all post - display 5 post -->
					<ul class="c-listpost active" id="cat_1">

						<?php 
							$args = array(
							"post_type" => 'post',
							"post_status" => 'publish',
							'posts_per_page'=> 5,       
							);
                        ?>

                        <?php $getposts = new WP_query($args);  ?>
						<?php global $wp_query; $wp_query->in_the_loop = true; ?>
						<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>                   
							<li class="c-listpost__item">
								<div class="c-listpost__info">
									<span class="datepost"><?php echo get_the_date('Y年m月d日'); ?></span>

									<?php $cate = get_the_category(); ?>
									<?php foreach ($cate as $category): ?>
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

                    <!-- other post -->
                    <?php foreach($categories as $category): ?>
                        <ul class="c-listpost" id="cat_<?php echo $category->cat_ID ?>">
                        
                            <?php
                                $args = array(
                                    "post_type" => 'post',
                                    "post_status" => 'publish',
                                    'posts_per_page'=> 5,       
                                    'cat' => $category->cat_ID,
                                );
                            ?>

                            <?php $getposts = new WP_query($args); ?>
                            <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>                   
                                <li class="c-listpost__item">
                                    <div class="c-listpost__info">
                                        <span class="datepost"><?php echo get_the_date('Y年m月d日'); ?></span>

                                        <?php $categories = get_the_category(); ?>
                                        <?php foreach ($categories as $category): ?>
                                            <span class="cat">
                                                <i class="c-dotcat" style="background-color: <?php echo $category->description  ?>"></i>
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
                <!-- end post -->
                
                <div class="l-btn">
                    <div class="c-btn c-btn--small">
                        <a href="<?php echo home_url() ?>/news">ニュース一覧を見る</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end news -->

    <section class="publish">
		<div class="l-container">
			<h2 class="c-title1">
				<span class="ja">出版物</span>
				<span class="en">Publish</span>
			</h2>

			<div class="publish__inner">
				<ul class="c-gridpost">

                    <?php $args = array(
                        'post_type' => 'publish',
                        'posts_per_page' => 4,
                        'post_status' => 'publish'
                    );
                    ?>

                    <?php $getposts = new WP_query($args); ?>
                    <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

                        <li class="c-gridpost__item">
                            <a href="<?php the_permalink();?>">
                                <div class="c-gridpost__thumb">
                                    <?php the_post_thumbnail(); ?>
                                </div>

                                <p class="datepost"><?php echo get_the_date('Y年m月d日'); ?></p>

                                <h3><?php the_title();?></h3>
                            </a>
                        </li>

                    <?php endwhile; wp_reset_postdata(); ?>

				</ul>
			</div>
            
			<div class="l-btn">
				<div class="c-btn c-btn--small">
					<a href="<?php echo home_url() ?>/publish">出版物一覧を見る</a>
				</div>
			</div>
		</div>
	</section>
    <!-- end publish -->
</main>
<!-- end main -->

<?php get_footer() ;?>