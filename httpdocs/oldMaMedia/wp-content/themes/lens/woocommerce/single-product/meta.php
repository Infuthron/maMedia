<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>

<hr class="separator separator--striped">
<footer class="entry__meta  entry__meta-product  push--top  push--bottom">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( $product->is_type( array( 'simple', 'variable' ) ) && get_option( 'woocommerce_enable_sku' ) == 'yes' && $product->get_sku() ) : ?>
		<span itemprop="productID" class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo $product->get_sku(); ?></span>.</span>
	<?php endif;

		$size = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
		echo $product->get_categories( ' ', '<div class="entry__meta-box meta-box--categories"><span class="meta-box__box-title">' . _n( 'Category:', 'Categories:</span>', $size, 'woocommerce' ), '</span></div>' );

		$size = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
		echo $product->get_tags( ' ', '<div class="entry__meta-box meta-box--categories"><span class="meta-box__box-title">' . _n( 'Tag:', 'Tags:', $size, 'woocommerce' ), '</span></div>' );

		get_template_part( 'theme-partials/addthis-share' );

	do_action( 'woocommerce_product_meta_end' ); ?>

</footer><!-- .entry__meta .entry__meta-project -->