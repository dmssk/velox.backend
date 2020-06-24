<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package velox
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>


<header id="header" class="header">
    <div class="desctop-only">
        <div class="navbar-top">
            <div class="container">
                <nav class="site-navigation">


                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'top-menu',
                            'menu_id' => 'top-menu',
                        )
                    );
                    ?>
                    <ul class="site-navigation__contacts">
                        <li>
                            <a href="https://www.facebook.com/profile.php?id=100011833057337" target="_blank">
                                <span class="round-icon">
                                    <i class="icon icon-facebook"></i>
                                </span>
                                facebook
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/_dmssk/?hl=ru" target="_blank">
                                <span class="round-icon">
                                    <i class="icon icon-instagram"></i>
                                </span>
                                instagram
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="navbar-middle">
                <?php get_search_form(); ?>
                <div class="phone-contacts">
                    <a href="tel:+380673907332" class="phone-contacts__link kievstar">+38 (067) 390 73 32</a>
                    <a href="tel:+380636880061" class="phone-contacts__link lifecell">+38 (063) 688 00 61</a>
                </div>
                <div class="shop-items">
                    <?php global $woocommerce; ?>
                    <a href="#" class="shop-items__buy icon icon-basket">
                        <span class="shop-items__amount"><?= sprintf($woocommerce->cart->cart_contents_count); ?></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="navbar-bottom">
            <div class="container">
                <div class="navbar-bottom__left-part">
                    <div class="logo"><a href="/"><img
                                    src="<?= get_template_directory_uri() ?>/src/assets/images/logo.png"
                                    alt="VELOX"></a></div>
                </div>
                <div class="navbar-bottom__right-part">
                    <nav class="site-navigation">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'bottom-menu',
                                'menu_id' => 'bottom-menu-header',
                                'menu_class' => 'site-navigation__list',
                                'container_class' => 'site-navigation__list'
                            )
                        );
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-only">
        <div class="navbar-mobile">
            <div class="navbar-mobile__logo"><a href="/">VELOX</a></div>
            <div class="shop-items">
                <a href="#" class="shop-items__buy icon icon-basket">
                    <span class="shop-items__amount">2</span>
                </a>
            </div>
            <a href="#" class="navbar-mobile__burger mobile-menu-trigger"></a>
        </div>
    </div>
    <div class="mobile-menu">
        <div class="mobile-menu__overlay"></div>
        <div class="mobile-menu__wrap"><a href="#" class="mobile-menu__close"></a>
            <h2 class="mobile-menu__heading">Меню</h2>
            <nav class="mobile-menu__main-nav">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'bottom-menu',
                        'menu_id' => 'bottom-menu-header-mobile',
                    )
                );
                ?>
            </nav>
            <nav class="mobile-menu__secondary-nav">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'top-menu',
                        'menu_id' => 'top-menu-mobile',
                    )
                );
                ?>
            </nav>
        </div>
    </div>
    <div class="modal modal-basket">
        <div class="modal__wrap"><a href="#" class="modal__close"></a>
            <h2 class="heading-default modal__heading align-center">Кошик</h2>
            <span class="modal-basket__label">В кошику: <b><?= sprintf($woocommerce->cart->cart_contents_count);?></b></span>
            <div class="modal-basket__wrap">
                <?php
                $cart_items = WC()->cart->get_cart();
                $sum = 0;
                foreach ($cart_items as $cart_item_key => $item) {
                    $price = $item['data']->get_price();
                    $sum += $price;
                    ?>
                    <div class="modal-basket__item">
                        <div class="img">
                            <a href="<?= $item['data']->get_slug(); ?>">
                                <?= $item['data']->get_image(); ?>
                            </a>
                        </div>
                        <div class="details">
                            <div class="details__name">
                                <a href="<?= $item['data']->get_slug(); ?>"><?= $item['data']->get_name(); ?></a>
                            </div>
                            <div class="details__price">
                                <span class="price"><?= $price; ?> грн.</span>
                            </div>
                        </div>
                        <?php
                        echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                            '<a href="%s" class="modal-basket__trash" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
                            esc_url(wc_get_cart_remove_url($cart_item_key)),
                            __('Remove this item', 'woocommerce'),
                            esc_attr($item['product_id']),
                            esc_attr($item['data']->get_sku())
                        ), $cart_item_key);
                        ?>
                    </div>
                <?php } ?>
            </div>
            <span class="modal-basket__summary">Всього: <b><?= $sum ?> грн.</b></span>
            <div class="modal-basket__buttons">
                <a href="/checkout" class="btn btn-default">Оформити замовлення</a>
                <a href="/shop" class="btn btn-disabled">Продовжити покупки</a>
            </div>
        </div>
    </div>
</header>
