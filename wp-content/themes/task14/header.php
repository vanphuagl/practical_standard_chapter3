<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Training Wordpress">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Phu Nguyen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if (is_home()) : ?>
    <title>Home | Training Wordpress</title>
    <?php else : ?>
    <title><?php wp_title(''); ?> | Training Wordpress</title>
    <?php endif;  ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/assets/css/style.css">
    <?php wp_head(); ?>
</head>

<body>
    <header class="c-header">
        <div class="l-container">
            <h1 class="c-logo"><a href="<?php echo home_url(); ?>"><img
                        src="<?php bloginfo('template_directory') ?>/assets/img/logo.png" alt="Allgrow Labo"></a></h1>
            <nav class="c-gnav">
                <ul>
                    <li><a href="<?php echo home_url(); ?>/services">サービス</a></li>
                    <li><a href="<?php echo home_url(); ?>/publish">出版物</a></li>
                    <li><a href="<?php echo home_url(); ?>/contact">お問い合わせ</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- end header -->