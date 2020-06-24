<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package velox
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">
            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Упс! Такої сторінки немає :(.', 'velox' ); ?></h1>
                    <h2><a href="/">На головну</a></h2>
                </header><!-- .page-header -->
            </section><!-- .error-404 -->
        </div>

	</main><!-- #main -->

<?php
get_footer();
