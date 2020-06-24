<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package velox
 */

?>
<footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-2">
                <div class="footer-contacts">
                    <div class="footer-contacts__logo">
                        <a href="/">
                            <img src="<?= get_template_directory_uri()?>/src/assets/images/logo.png" alt="VELOX">
                        </a>
                    </div>
                    <ul class="footer-contacts-list">
                        <li class="footer-contacts-list__item">
                            <b>Телефон:</b>
                            <a href="tel:380636880061">+38 (063) 688 00 61</a>
                        </li>
                        <li class="footer-contacts-list__item">
                            <b>Email:</b>
                            <a href="mailto:myaczt@gmail.com">myaczt@gmail.com</a>
                        </li>
                        <li class="footer-contacts-list__item">
                            <b>Адреса:</b>
                            <span>м. Житомир, вул. Радивілівська 33</span>
                        </li>
                        <li class="footer-contacts-list__item">
                            <b>Час роботи:</b>
                            <span>Понеділок - Неділя<br>09:00 - 22:00</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer-nav-wrap">
                    <div class="footer-nav"><h3>Компанія</h3>
                        <nav class="footer-nav__nav">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'top-menu',
                                    'menu_id' => 'footer-menu',
                                    'menu_class' => 'footer-nav-list company-list'
                                )
                            );
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'bottom-menu',
                                    'menu_id' => 'bottom-menu-footer',
                                    'menu_class' => 'footer-nav-list company-list'
                                )
                            );
                            ?>

                        </nav>
                    </div>
                    <div class="footer-nav"><h3>Категорії</h3>
                        <nav class="footer-nav__nav">
                            <ul class="footer-nav-list for-client-list">
                                <?php $terms = get_terms(array(
                                    'taxonomy' => 'product_cat',
                                    'hide_empty' => true,
                                    'pad_counts' => true,
                                    'orderby' => 'name',
                                    'parent' => 0
                                )); ?>
                                <?php if ($terms) : ?>
                                    <?php foreach ($terms as $term) : ?>
                                        <li><a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="js/1.71c1a7f3.chunk.js"></script>
<script src="js/app.9e8d5ddc.js"></script>

<?php wp_footer(); ?>
</body>
</html>
