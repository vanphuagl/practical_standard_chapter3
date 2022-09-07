<?php get_header() ;?>

<main class="p-contact">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php dimox_breadcrumbs();?>
        </div>
    </div>

    <div class="c-headpage">
        <div class="l-container2">
            <h2 class="c-title">お問い合わせ</h2>
        </div>
    </div>

    <div class="p-contact__content">
        <div class="l-container">
            <p class="notice">以下の内容を送信してもよろしいですか？</p>
            <?php echo do_shortcode('[mwform_formkey key="216"]'); ?>
        </div>
    </div>
</main>

<?php get_footer() ;?>