<footer class="footer">
    <div class="container">
        <div class="">
            <h3 class="footer-inner__content-title title">
                <?php
                $current_language = pll_current_language();

                if ($current_language == 'uk') {
                    the_field("footer_title", 8);

                } elseif ($current_language == 'en') {
                    the_field("footer_title", 193);
                }
                ?>


            </h3>
            <ul class="footer-inner__content-list">
                <li class="footer-inner__content-list-item">
                    <a class="footer-inner__content-link" href=" <?php
                            $current_language = pll_current_language();

                                if ($current_language === 'uk') {
                                    the_field("number_link", 'option');

                                } elseif ($current_language === 'en') {
                                    the_field("number_link_en", 'option');

                                }
                            ?>" target="_blank">
                        <svg width="25px" height="25px">
                            <use href="<?php echo bloginfo('template_url'); ?>/assets/images/icons.svg#icon-telephone"></use>
                        </svg>
                        <span> <?php
                            $current_language = pll_current_language();

                            if ($current_language === 'uk') {
                                the_field("number", 'option');

                            } elseif ($current_language === 'en') {
                                the_field("number_en", 'option');

                            }
                            ?></span>
                    </a>
                </li>
                <li class="footer-inner__content-list-item">
                    <a class="footer-inner__content-link" href="mailto: <?php the_field("email", 'option'); ?>"
                       target="_blank">
                        <svg width="25px" height="25px">
                            <use href="<?php echo bloginfo('template_url'); ?>/assets/images/icons.svg#icon-mail"></use>
                        </svg>
                        <span> <?php the_field("email", 'option'); ?></span>
                    </a>
                </li>
                <li class="footer-inner__content-list-item">
                    <a class="footer-inner__content-link" href="<?php the_field("telegram_link", 'option'); ?>"
                       target="_blank">
                        <svg width="25px" height="25px">
                            <use href="<?php echo bloginfo('template_url'); ?>/assets/images/icons.svg#icon-telegram"></use>
                        </svg>
                        <span class=""><?php the_field("telegram", 'option'); ?></span>
                    </a>
                </li>
                <li class="footer-inner__content-list-item">
                    <a class="footer-inner__content-link">
                        <svg width="25px" height="25px">
                            <use href="<?php echo bloginfo('template_url'); ?>/assets/images/icons.svg#icon-clock"></use>
                        </svg>
                        <span class="">
                        <?php
                        $current_language = pll_current_language();

                        if ($current_language === 'uk') {
                            the_field("time", 'option');

                        } elseif ($current_language === 'en') {
                            the_field("time_en", 'option');

                        }
                        ?>
                      </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
<div class="marker" data-attr="<?php the_field('marker_png', 'option');?>"></div>
<?php
$locations = [];

		while( have_rows('map_points', 'option') ) : the_row();
			$location = [
				'name' => get_sub_field('name'),
				'position' => [
					'lat' => (float)get_sub_field('lat'),
					'lng' => (float)get_sub_field('lng')
				]
			];
			$locations[] = $location;
		endwhile;
        $data = json_encode($locations, JSON_UNESCAPED_UNICODE);

?>
<div class="points" data-attr='<?php echo $data;?>'></div>

</body>
</html>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJ5ewdsCKSkgkJ1fb0rgPbtsnVTMlFD40&callback=initMap&language=uk" async defer></script>-->
<?php wp_footer(); ?>


</body>
</html>
