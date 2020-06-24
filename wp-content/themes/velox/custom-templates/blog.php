<?php
/*
Template Name: Blog
*/

?>

<?php get_header(); ?>

<div class="container mt-5">
    <h1>Блог</h1>
    <?php
    global $wp_query;
    $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // определяем текущую страницу блога
    $args = array(
        'posts_per_page' => get_option('posts_per_page'), // значение по умолчанию берётся из настроек, но вы можете использовать и собственное
        'paged'          => $current_page // текущая страница
    );
    query_posts( $args );

    $wp_query->is_archive = true;
    $wp_query->is_home = false;
    ?>

    <div class="blog-wrap">

    <?php while(have_posts()): the_post();
        ?>
        <a href="<?= get_permalink()?>" class="blog-item">
            <h3><?php the_title() /* заголовок */ ?></h3>
            <p><?php
                $my_content = apply_filters( 'the_content', get_the_content() );
                echo wp_trim_words($my_content,30, ' ...' ) /* содержимое поста */
                ?></p>
        </a>
    <?php
    endwhile;
    ?>
    </div>
    <?php
    if( function_exists('wp_pagenavi') ) wp_pagenavi(); // функция постраничной навигации

    ?>
</div>

<?php
get_sidebar();
get_footer(); ?>
