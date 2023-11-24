<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package PostUA
 */

get_header();
?>
	<main id="primary" class="site-main">
        <section class="hero">
            <div class="container">
                <div class="hero-inner">
                    <h1 class="hero-inner__title">Oops! That page can’t be found</h1>
                    <a class="hero-inner__btn button" href="<?php echo get_home_url()?>">Home page</a>
                </div>
            </div>
        </section>
	</main>

<?php
get_footer();
