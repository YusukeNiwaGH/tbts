<?php
$download            = get_field('product_cta_download');
$webinar             = get_field('product_cta_webinar');
$inquiry             = get_field('product_cta_inquiry');
$download_text       = '';
$download_url        = '';
$webinar_text        = '';
$webinar_url         = '';
$inquiry_text        = '';
$inquiry_url         = '';
if ( $download ) {
    $download_text       = $download['product_cta_download_text'];
    $download_url        = $download['product_cta_download_url'];
}
if ( $webinar ) {
    $webinar_text        = $webinar['product_cta_webinar_text'];
    $webinar_url         = $webinar['product_cta_webinar_url'];
}
if ( $inquiry ) {
    $inquiry_text        = $inquiry['product_cta_inquiry_text'];
    $inquiry_url         = $inquiry['product_cta_inquiry_url'];
}
$allowed_html = array(
    'br' => array(),
);
?>
<?php if ( $download_url || $webinar_url || $inquiry_url ): ?>
<div class="p-product-cta">
    <ul class="p-product-cta__list">
        <?php if ( $download_text && $download_url ): ?>
        <li class="p-product-cta__item">
            <a href="<?php echo esc_url( $download_url ); ?>" class="p-product-cta__link">
                <span class="p-product-cta__text"><?php echo wp_kses( $download_text, $allowed_html ); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"><rect width="15" height="15" fill="#043d78" opacity="0"/><g transform="translate(1.5 1.049)"><path d="M103.657,78.357l3.977-3.544h-3.186V68.36h-1.581v6.452H99.68Z" transform="translate(-97.657 -68.36)" fill="#043d78"/><path d="M103.657,78.857a.5.5,0,0,1-.333-.127l-3.977-3.544a.5.5,0,0,1,.333-.873h2.686V68.36a.5.5,0,0,1,.5-.5h1.581a.5.5,0,0,1,.5.5v5.952h2.686a.5.5,0,0,1,.333.873l-3.977,3.544A.5.5,0,0,1,103.657,78.857Zm-2.664-3.544,2.664,2.375,2.664-2.375h-1.874a.5.5,0,0,1-.5-.5V68.86h-.581v5.952a.5.5,0,0,1-.5.5Z" transform="translate(-97.657 -68.36)" fill="#043d78"/><rect width="12" height="1.422" transform="translate(0 11.481)" fill="#043d78"/><path d="M0-.5H12a.5.5,0,0,1,.5.5V1.422a.5.5,0,0,1-.5.5H0a.5.5,0,0,1-.5-.5V0A.5.5,0,0,1,0-.5ZM11.5.5H.5V.922h11Z" transform="translate(0 11.481)" fill="#043d78"/></g></svg>
            </a>
        </li>
        <?php endif; ?>
        <?php if ( $webinar_text && $webinar_url ): ?>
        <li class="p-product-cta__item">
            <a href="<?php echo esc_url( $webinar_url ); ?>" class="p-product-cta__link">
                <span class="p-product-cta__text"><?php echo wp_kses( $webinar_text, $allowed_html ); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g transform="translate(-6394 5524)"><rect width="20" height="20" transform="translate(6394 -5524)" fill="#043d78" opacity="0"/><g transform="translate(6389.112 -5528.466)"><g transform="translate(7.888 6.527)"><path d="M101.293,79.751l-12.116-7a.942.942,0,0,0-1.413.816v13.99a.942.942,0,0,0,1.413.816l12.116-7a.942.942,0,0,0,0-1.632" transform="translate(-87.764 -72.629)" fill="#043d78"/></g></g></g></svg>
            </a>
        </li>
        <?php endif; ?>
        <?php if ( $inquiry_text && $inquiry_url ): ?>
        <li class="p-product-cta__item">
            <a href="<?php echo esc_url( $inquiry_url ); ?>" class="p-product-cta__link">
                <span class="p-product-cta__text"><?php echo wp_kses( $inquiry_text, $allowed_html ); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g transform="translate(-6394 5524)"><rect width="20" height="20" transform="translate(6394 -5524)" fill="#043d78" opacity="0"/><g transform="translate(6141 -5521)"><g transform="translate(253 0)"><g transform="translate(0 0)"><path d="M20,1.178A1.227,1.227,0,0,0,18.776,0H1.224A1.227,1.227,0,0,0,0,1.178L10,8.343ZM10,9.548,0,2.382V12.8a1.228,1.228,0,0,0,1.224,1.224H18.776A1.228,1.228,0,0,0,20,12.8V2.382Z" fill="#043d78"/></g></g></g></g></svg>
            </a>
        </li>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?>