<?php get_header(); ?>

<main class="p-service">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php dimox_breadcrumbs(); ?>
        </div>
    </div>

    <div class="c-headpage">
        <div class="l-container2">
            <h2 class="c-title">ご提供サービス</h2>
        </div>
    </div>

    <div class="feature_img">
        <img src="<?php bloginfo('template_directory'); ?>/assets/img/img_services01.png" alt="">
    </div>

    <div class="p-service__content">
        <div class="l-container">
            <p class="notice">ひかり税理士法人がご提供するすべてのサービスを目的別に検索していただけます</p>

            <div class=" p-service__checkArea">
                <form id="serviceSearch" method="get" action="#">
                    <?php 
                        $array1 = array(
                            'post_type' => 'services',
                            'taxonomy'  => 'services-products',
                            'hide_empty' => 0,
                            'include' => '9, 11, 12, 13'
                        );
                        $array2 = array(
                            'post_type' => 'services',
                            'taxonomy'  => 'services-products',
                            'hide_empty' => 0,
                            'include' => '15, 16, 17, 18, 19'
                        );
                        $category1 = get_categories( $array1 );
                        $category2 = array_reverse(get_categories( $array2 ));
                        $categories = array_merge($category1, $category2);
                    ?>

                    <div class="checkArea__form">
                        <legend class="servicesList-heading">サービスの対象で選ぶ</legend>
                        <div class="checkArea__inner">
                            <?php foreach($category1 as $i):?>
                            <div class="c-w240">
                                <label>
                                    <input class="chkbutton" type="checkbox" name="" id="<?php echo $i->term_id ?>"
                                        value="<?php echo $i->term_id ?>"><?php echo $i->name ?>
                                </label>
                            </div>
                            <?php endforeach?>
                        </div>
                    </div>

                    <div class="checkArea__form form2">
                        <legend class="servicesList-heading">サービスの内容で選ぶ</legend>
                        <div class="checkArea__inner">
                            <?php foreach($category2 as $i): ?>
                            <?php $className = $i->term_id >= 18 ? 'c-w240' : 'c-w156'; ?>
                            <div class="<?php echo $className; ?>">
                                <label>
                                    <input class="chkbutton" type="checkbox" name="" id="<?php echo $i->term_id ?>"
                                        value="<?php echo $i->term_id ?>"><?php echo $i->name ?>
                                </label>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end checkArea -->

            <p class="p-service__result"><span id="totalServices">0</span>件が該当しました</p>

            <ul class="c-column" id="services">

            </ul>

            <div class="endcontent">
                <?php 
					$images = get_field('choose_img','option');
					if ($images): ?>
                    <?php foreach ($images as $image): ?>
                        <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>