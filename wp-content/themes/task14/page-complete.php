<?php get_header() ;?>

<main class="p-contact">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php dimox_breadcrumbs(); ?>
        </div>
    </div>

    <div class="c-headpage">
        <div class="l-container">
            <h2 class="c-title">お問い合わせ</h2>
        </div>
    </div>

    <div class="p-contact__content">
        <div class="l-container2 complete">
            <h2>お問い合わせ、ありがとうございました。</h2>
            <p>メール確認後、担当者よりご連絡させていただきます。</p>
            <p>万一、当方からの返信がない場合は、メッセージの送信に失敗している可能性があります。<br>
                その際は大変恐縮ですが、再度お問い合わせいただくか、別の手段にてご連絡お願いいたします。</p>
        </div>
        
        <div class="c-btn c-btn--small">
            <a href="<?php echo home_url(); ?>">TOPに戻る</a>
        </div>
    </div>
</main>

<?php get_footer() ;?>