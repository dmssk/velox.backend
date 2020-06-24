<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'row', $product ); ?>>

    <div class="col-xl-9 col-lg-10">

        <?php
        /**
         * Hook: woocommerce_before_single_product_summary.
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
        do_action( 'woocommerce_before_single_product_summary' );
        ?>

        <div class="summary entry-summary">
            <?php
            /**
             * Hook: woocommerce_single_product_summary.
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 10
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_meta - 40
             * @hooked woocommerce_template_single_sharing - 50
             * @hooked WC_Structured_Data::generate_product_data() - 60
             */
            do_action( 'woocommerce_single_product_summary' );
            ?>
        </div>
    </div>
    <div class="col-xl-2 offset-xl-1">
        <div class="features">
            <div class="features-item">
                <div class="features-item__image"><img src="<?= get_template_directory_uri()?>/src/assets/images/contacts/contacts-img-4.png"
                                                       alt=""></div>
                <div class="features-item__heading"><h3>Безкоштовна доставка</h3></div>
                <div class="features-item__description">По території України, 1-3 дні<br><a
                            href="/payment-and-delivery">Детальніше</a></div>
            </div>
            <div class="features-item">
                <div class="features-item__image"><img src="<?= get_template_directory_uri()?>/src/assets/images/contacts/contacts-img-5.png"
                                                       alt=""></div>
                <div class="features-item__heading"><h3>Обмін і повернення</h3></div>
                <div class="features-item__description">14 днів на повернення чи обмін товару<br><a href="/garanty-and-return">Детальніше</a>
                </div>
            </div>
            <div class="features-item">
                <div class="features-item__image"><img src="<?= get_template_directory_uri()?>/src/assets/images/contacts/contacts-img-6.png"
                                                       alt=""></div>
                <div class="features-item__heading"><h3>Знижка 5%</h3></div>
                <div class="features-item__description">На придбання 2 велосипедів<br><a
                            href="/about">Детальніше</a></div>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
do_action( 'woocommerce_after_single_product_summary' );
?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
