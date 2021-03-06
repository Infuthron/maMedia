<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly  ?>
<div id="main" class="content djax-updatable">
	<div id="pix-cart" class="cart  cart--widget  sticky-button">
		<div class="cart__btn  sticky-button__btn  btn  btn--large">
			<div class="widget_shopping_cart_content">
			
				<?php /* Placeholder until the page is loaded */ ?>
					<span class="cart-text">Cart</span>
					<i class="pixcode  pixcode--icon  icon-shopping-cart"></i>

					<ul>
						<li class="cart-item  sticky-button-item">
							<span class="cart-total"><span>$0</span></span>
						</li>

						
						<li class="cart-item  sticky-button-item">
							<a href="<?php echo wc_get_cart_url(); ?>" class="cart-link dJAX_internal"><?php _e( 'View Cart', 'woocommerce' ); ?></a>
						</li>

						<li class="cart-item  sticky-button-item">
							<a href="<?php echo wc_get_checkout_url(); ?>" class="cart-link dJAX_internal"><?php _e( 'Checkout', 'woocommerce' ); ?></a>
						</li>
					</ul>
				<?php /* End of Placeholder */ ?>

			</div>
		</div>
	</div>