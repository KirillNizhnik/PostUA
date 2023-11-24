<?php
/*
* Template name: about-us-page
*/ ?>

<?php get_header() ?>

    <main>
        <section class="about">
            <div class="container">
                <div class="about-inner">
                    <h1 class="about-title"><?php the_field("about_us_page_title"); ?></h1>
                    <?php
                    $image_a = get_field("about_us_page_image");
                    $image_url_a = null;
                    $image_alt_a = null;

                    if ($image_a) {
                        $image_alt_a = $image_a['alt'];
                        $image_url_a = $image_a['url'];
                    }
                    ?>
                    <img class="about-inner__img" src="<?php echo $image_url_a; ?>" alt="<?php echo $image_alt_a; ?>">

                    <p class="about-inner__descr">
                        <?php the_field("about_us_page_content"); ?>
                    </p>
                </div></div>
        </section>
    </main>


<?php
get_footer();
