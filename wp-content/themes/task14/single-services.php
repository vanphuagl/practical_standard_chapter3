<?php get_header(); ?>

<main class="p-service">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php dimox_breadcrumbs() ?>
        </div>
    </div>

    <div class="c-headpage">
        <div class="l-container2">
            <h2 class="c-title"><?php the_title(); ?></h2>
        </div>
        <div>
            <?php the_content(); ?>
        </div>
    </div>

    <div class="feature_img">
        <?php $img = get_field('img_service'); ?>
        <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
    </div>

    <div class="p-service__consultation">
        <dl class="l-container2">
            <dt>このような方はご相談ください</dt>

            <?php $contacts = get_field('contact_service'); ?>
            <?php if ($contacts): ?>
            <?php foreach ($contacts as $i): ?>
            <dd class="c-checkMark"><?php echo $i['title_contact_service'] ?></dd>
            <?php endforeach; ?>
            <?php endif; ?>
        </dl>
    </div>

    <div class="p-service__merit">
        <div class="l-container2">
            <h3 class="p-service__title">ひかり税理士法人を選ぶメリット</h3>

            <dl>
                <?php $benefit = get_field('advantage'); ?>
                <?php if ($benefit): ?>
                <?php foreach ($benefit as $i): ?>
                <dt class="c-checkMark"><?php echo $i['advantage_title'] ?></dt>
                <dd><?php echo $i['advantage_description'] ?></dd>
                <?php endforeach; ?>
                <?php endif; ?>
            </dl>
        </div>
    </div>

    <div class="p-service__flow">
        <div class="l-container2">
            <h3 class="p-service__title">サービスの流れ</h3>

            <?php $services = get_field('service_flow'); ?>
            <?php if ($services): ?>
            <?php foreach ($services as $i): ?>
            <table>
                <tbody>
                    <tr>
                        <th>STEP<?php echo $i['step_service_flow'] ?></th>
                        <td>
                            <h4 class="flow-title"><?php echo $i['title_service_flow'] ?></h4>

                            <?php $subtitles = $i['content_service_flow']; ?>
                            <?php foreach ($subtitles as $i): ?>
                            <h5 class="flow-subtitle"><?php echo $i['subtitle_service_flow'] ?></h5>
                            <p class="c-checkMark"><?php echo $i['description_service_flow'] ?></p>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="p-service__division">
        <div class="l-container">
            <h3 class="p-service__subtitle">関連サービス</h3>

            <ul class="division-list c-flex">
                <?php 
                    // prev   
                    $prev_post =  get_previous_post();
                    if (!empty($prev_post)){
                        $prev_id = $prev_post->ID;
                        $permalinkPrev = get_permalink( $prev_id );
                        $getTitlePrev = get_the_title($prev_id);
                        $getThumbnailPrev = get_the_post_thumbnail_url($prev_id);
                    }
                    
                    // next
                    $next_post = get_next_post();
                    if (!empty($next_post)) {
                        $next_id = $next_post->ID; 
                        $permalinkNext = get_permalink($next_id);
                        $getTitleNext = get_the_title($next_id);
                        $getThumbnailNext = get_the_post_thumbnail_url($next_id);
                    }
                ?>

                <li class="small-12 medium-4">
                    <?php if(get_previous_post()): ?>
                    <a href="<?php echo $permalinkPrev ?>">
                        <p class="img"><img src="<?php echo $getThumbnailPrev ?>"></p>
                        <p class="text"><span class="arrow"><?php echo $getTitlePrev ?></span></p>
                    </a>
                    <?php endif ?>
                </li>

                <li class="small-12 medium-4">
                    <?php if(get_next_post()): ?>
                    <a href="<?php echo $permalinkNext ?>">
                        <p class="img"><img src="<?php echo $getThumbnailNext ?>"></p>
                        <p class="text"><span class="arrow"><?php echo $getTitleNext ?></span></p>
                    </a>
                    <?php endif ?>
                </li>
            </ul>
        </div>

        <div class="l-btn">
            <div class="c-btn c-btn--small">
                <a href="<?php echo home_url(); ?>/services">ご提供サービス一覧へ</a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>