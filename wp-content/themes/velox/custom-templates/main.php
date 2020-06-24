<?php
/*
Template Name: Main
*/

?>

<?php get_header(); ?>
<main>
    <section class="banner" id="selectBicycle" >
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="carousel carousel-big banner-carousel">
                        <a class="banner-link" href="/product-category/mountain/">
                            <span class="banner-placeholder">Горні</span>
                            <img src="<?= get_template_directory_uri(); ?>/src/assets/images/main-banner/hero-img.jpg" alt="" class="banner-carousel__item">
                        </a>
                        <a class="banner-link" href="/product-category/highway/">
                            <span class="banner-placeholder">Шоссейні</span>
                            <img src="<?= get_template_directory_uri(); ?>/src/assets/images/main-banner/1.jpg" alt="" class="banner-carousel__item">
                        </a>
                        <a class="banner-link" href="/product-category/city/">
                            <span class="banner-placeholder">Міські</span>
                            <img src="<?= get_template_directory_uri(); ?>/src/assets/images/main-banner/2.jpg" alt="" class="banner-carousel__item">
                        </a>
                        <a class="banner-link" href="/product-category/niners/">
                            <span class="banner-placeholder">Найнери</span>
                            <img src="<?= get_template_directory_uri(); ?>/src/assets/images/main-banner/3.jpg" alt="" class="banner-carousel__item">
                        </a>
                        <a class="banner-link" href="/product-category/kids/">
                            <span class="banner-placeholder">Дитячі</span>
                            <img src="<?= get_template_directory_uri(); ?>/src/assets/images/main-banner/4.jpg" alt="" class="banner-carousel__item">
                        </a>
                    </div>
                </div>
                <div class="col-xl-4"><h2 class="heading-default align-center">Підібрати велосипед</h2>
                    <form action="#" class="select-bicycle banner__form">
                        <select class="select-bicycle__select pa_gender">
                            <option value="man,woman,kid" selected="selected">Для кого?</option>
                            <option value="man">чоловік</option>
                            <option value="woman">жінка</option>
                            <option value="kid">дитина</option>
                        </select>
                        <select class="select-bicycle__select pa_diameter">
                            <option value="24,26,27-5,28,29" selected="selected">Діаметр колес</option>
                            <option value="24">24</option>
                            <option value="26">26</option>
                            <option value="27.5">27.5</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                        </select>
                        <div class="price-select"><span>Ціна від</span>
                            <input type="text" class="select-bicycle__input price-select__input min_price">
                            <span>до</span>
                            <input type="text" class="select-bicycle__input price-select__input max_price">
                            <span>грн.</span>
                        </div>
                        <div class="select-bicycle__submit">
                            <input type="submit" class="btn btn-default " value="Підібрати">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="catalog" id="categories">
        <div class="container">
            <h2 class="heading-default align-center" >Категорії велосипедов</h2>
            <div class="row">
                <?php $terms = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                    'pad_counts' => true,
                    'orderby' => 'name',
                    'parent' => 0
                )); ?>
                <?php if ($terms) : ?>
                    <?php foreach ($terms as $term) : ?>
                        <div class="col-xl-3 col-md-4 col-6 mt-5">
                            <div class="catalog-item">
                                <a href="<?php echo get_term_link($term->term_id); ?>" class="catalog-item__link">
                                    <?php woocommerce_subcategory_thumbnail($term, 'catalog-item__image'); ?>
                                    <span class="catalog-item__text"><?php echo $term->name; ?></span>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="brands-carousel" id="brands">
        <div class="container">
            <div class="row">
                <div class="col-md-3"><h2 class="heading-default brands-carousel__heading mt-5">Марки в наявності</h2></div>
                <div class="col-md-9">
                    <div class="brands-carousel__wrap">
                        <div class="brands-carousel__item"><img src="<?= get_template_directory_uri()?>/src/assets/images/brands/1.png" alt="merida">
                        </div>
                        <div class="brands-carousel__item"><img src="<?= get_template_directory_uri()?>/src/assets/images/brands/2.png" alt="merida">
                        </div>
                        <div class="brands-carousel__item"><img src="<?= get_template_directory_uri()?>/src/assets/images/brands/3.png" alt="merida">
                        </div>
                        <div class="brands-carousel__item"><img src="<?= get_template_directory_uri()?>/src/assets/images/brands/1.png" alt="merida">
                        </div>
                        <div class="brands-carousel__item"><img src="<?= get_template_directory_uri()?>/src/assets/images/brands/2.png" alt="merida">
                        </div>
                        <div class="brands-carousel__item"><img src="<?= get_template_directory_uri()?>/src/assets/images/brands/3.png" alt="merida">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cards">
        <div class="container">
            <h2 class="heading-default align-center">Популярні велосипеди</h2>
            <div class="cards-wrap">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 10,
                'meta_key' => 'total_sales',
                'orderby' => 'meta_value_num',
            );
            $wc_query = new WP_Query($args);
            if ($wc_query->have_posts()) {
                while ($wc_query->have_posts()) {
                    $wc_query->the_post();

                    echo '<div class="cards-item">';
                    woocommerce_product_loop_start();
                    wc_get_template_part( 'content', 'product' );
                    woocommerce_product_loop_end();
                    echo '</div>';

                }
            }
            wp_reset_postdata();
            ?>
            </div>
        </div>
    </section>
    <section class="short-about">
        <?php get_sidebar(); ?>
    </section>
</main>


<?php get_footer(); ?>
