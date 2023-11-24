<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PostUA
 */

get_header();
?>


    <main>
        <!--        style="background-image: url('-->
		<?php //echo bloginfo('template_url'); ?><!--/assets/images/hero.webp');"-->
        <section class="hero" id="">
            <div class="container">
                <div class="hero-inner">
                    <h1 class="hero-inner__title"><?php the_field( "title" ); ?></h1>
                    <p class="hero-inner__caption"><?php the_field( "description" ); ?></p>
                    <a class="hero-inner__btn button" href="
                <?php
					$current_language = pll_current_language();

					if ( $current_language === 'uk' ) {
						echo home_url( '/forms' );

					} elseif ( $current_language === 'en' ) {
						echo home_url( '/form' );
					}
					?>
                    ">

						<?php the_field( "button" ); ?></a>
                </div>
            </div>
        </section>
        <section class="news" id="news">
            <div>
                <div class="container-news swiper" id="container-news">
                    <div class=" swiper-wrapper ">
						<?php
						if ( have_rows( 'certificate_list' ) ):
							while ( have_rows( 'certificate_list' ) ) : the_row();
								$sub_news_title  = get_sub_field( 'certificate_title' );
								$sub_news_descr  = get_sub_field( 'certificate_description' );
								$sub_news_price  = get_sub_field( 'certificate_price' );
								$sub_news_button = get_sub_field( 'certificate_button' );
								$sub_news_link   = get_sub_field( 'certificate_link' );
								?>
                                <div class="news-inner swiper-slide">
                                    <h2 class="hero-inner__title"><?php echo "$sub_news_title" ?></h2>
                                    <p class="news-inner-descr hero-inner__caption">  <?php echo "$sub_news_descr" ?></p>
                                    <div class="news-inner-price"><?php echo "$sub_news_price" ?></div>
                                    <a class="news-inner__btn button"
                                       href="<?php echo "$sub_news_link" ?>"><?php echo "$sub_news_button" ?></a>
                                </div>
							<?php endwhile; else : endif; ?>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </section>
        <section class="about-us" id="about-us">
            <div class="container">
                <div class="about-us-inner">
                    <div>
                        <h2 class="about-us-inner__title"><?php the_field( "about_us_title" ); ?></h2>
                        <p class="about-us-inner__descr">
							<?php the_field( "about_us_description" ); ?>
                        </p>
                        <a href="
                    <?php
						$current_language = pll_current_language();

						if ( $current_language === 'uk' ) {
							echo home_url( '/about-us-ua' );

						} elseif ( $current_language === 'en' ) {
							echo home_url( '/about-us-en' );
						}
						?>


" class="about-us-inner__btn button">
							<?php the_field( "about_us_button" ); ?>
                        </a>
                    </div>
					<?php
					$image1     = get_field( "about_us_images" );
					$image_url1 = null;
					$image_alt1 = null;

					if ( $image1 ) {
						$image_alt1 = $image1['alt'];
						$image_url1 = $image1['url'];
					}
					?>
                    <img class="about-us-inner__img" src="<?php echo $image_url1; ?>" alt="<?php echo $image_alt1; ?>">
                </div>
            </div>
        </section>
        <section class="service" id="service">
            <div class="container">
                <div class="about-us-inner service-inner">
                    <div>
                        <h2 class="about-us-inner__title">  <?php the_field( "our_services_title" ); ?></h2>
                        <ul class="service-inner__list">

							<?php
							if ( have_rows( 'services_list' ) ):
								while ( have_rows( 'services_list' ) ) : the_row();
									$sub_value = get_sub_field( 'services_item' );
									?>
                                    <li class="service-inner__list-item">
                                        <div>
                                            <svg width="45px" height="45px">
                                                <use href="<?php echo bloginfo( 'template_url' ); ?>/assets/images/icons.svg#icon-done"></use>
                                            </svg>
                                        </div>

										<?php echo "$sub_value" ?>
                                    </li>
								<?php endwhile; else : endif; ?>
                        </ul>
                    </div>

					<?php
					$image2     = get_field( "services_img" );
					$image_url2 = null;
					$image_alt2 = null;

					if ( $image1 ) {
						$image_alt2 = $image2['alt'];
						$image_url2 = $image2['url'];
					}
					?>
                    <img class="about-us-inner__img service-inner__img" src="<?php echo $image_url2; ?>"
                         alt="<?php echo $image_alt2; ?>">
                </div>
            </div>
        </section>
        <section class="delivery-stages" id="delivery-stages">
            <div class="container">
                <div class="delivery-stages-inner">
                    <h2 class="about-us-inner__title delivery-stages-inner__title"> <?php the_field( "delivery_stages_title" ); ?></h2>

                    <div class="delivery-stages-inner__box">
						<?php
						$image3     = get_field( "delivery_stages_images" );
						$image_url3 = null;
						$image_alt3 = null;

						if ( $image1 ) {
							$image_alt3 = $image3['alt'];
							$image_url3 = $image3['url'];
						}
						?>
                        <img class="delivery-stages-inner__img" src="<?php echo $image_url3; ?>"
                             alt="<?php echo $image_alt3; ?>">


                        <div class="delivery-stages-inner__wrap">
                            <div class="delivery-stages-inner__decor">
                                <div class="delivery-stages-inner__decor-1">1</div>
                                <div class="delivery-stages-inner__decor-1">2</div>
                                <div class="delivery-stages-inner__decor-1">3</div>
                            </div>
                            <div>
                                <div class="delivery-stages-inner__item">
                                    <h3 class="delivery-stages-inner__item-title"><?php the_field( "delivery_stages_title_item_1" ); ?></h3>
                                    <ul class="delivery-stages-inner__item-box">
										<?php
										if ( have_rows( 'delivery_stages_title_item_1_list' ) ):
											while ( have_rows( 'delivery_stages_title_item_1_list' ) ) : the_row();
												$sub_value_1 = get_sub_field( 'delivery_stages_title_item_1_list_item' );
												?>
                                                <li class="delivery-stages-inner__item-box-li">
													<?php echo "$sub_value_1" ?>
                                                </li>
											<?php endwhile; else : endif; ?>
                                    </ul>
                                </div>
                                <div class="delivery-stages-inner__item">
                                    <h3 class="delivery-stages-inner__item-title"><?php the_field( "delivery_stages_title_item_2" ); ?></h3>
                                    <ul class="delivery-stages-inner__item-box">
										<?php
										if ( have_rows( 'delivery_stages_title_item_2_list' ) ):
											while ( have_rows( 'delivery_stages_title_item_2_list' ) ) : the_row();
												$sub_value_2 = get_sub_field( 'delivery_stages_title_item_2_list_item' );
												?>
                                                <li class="delivery-stages-inner__item-box-li">
													<?php echo "$sub_value_2" ?>
                                                </li>
											<?php endwhile; else : endif; ?>
                                    </ul>
                                </div>
                                <div class="delivery-stages-inner__item">
                                    <h3 class="delivery-stages-inner__item-title"><?php the_field( "delivery_stages_title_item_3" ); ?></h3>
                                    <ul class="delivery-stages-inner__item-box">
										<?php
										if ( have_rows( 'delivery_stages_title_item_3_list' ) ):
											while ( have_rows( 'delivery_stages_title_item_3_list' ) ) : the_row();
												$sub_value_3 = get_sub_field( 'delivery_stages_title_item_3_list_item' );
												?>
                                                <li class="delivery-stages-inner__item-box-li">
													<?php echo "$sub_value_3" ?>
                                                </li>
											<?php endwhile; else : endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><?php $current_language = get_locale();
		if ( $current_language === 'uk' ) {
			?>
            <section class="calculator" id="calculator">
                <div class="container container-calc">

                    <div class="calculator-wrap">
                        <div class="container-calc-title">
                            <h2 class="about-us-inner__title"><?php the_field( "calculator_title" ); ?></h2>
                            <p><?php the_field( "calculator_descr" ); ?></p>
                        </div>
                        <div class="calculator-inner">
                            <form class="calculator__inner-form" action="" method="post" id="deliveryForm">
                                <label class="calculator__inner-form-label" for="#">Звідки</label><br>

                                <select class="calculator__inner-form-input select-with-arrow" id="departureCountry"
                                        name="departureCountry">
                                    <option value="Ірландія">Ірландія</option>
                                    <option value="Україна">Україна</option>
                                </select>

                                <label class="calculator__inner-form-label" for="#">Куди</label><br>
                                <select class="calculator__inner-form-input" id="destinationCountry"
                                        name="destinationCountry">
                                    <option value="Україна">Україна</option>
                                    <option value="Ірландія">Ірландія</option>

                                </select>

                                <label class="calculator__inner-form-label" for="#">Кількість місць</label><br>
                                <div class="calculator__inner-form-input" type="number" id="numberOfItems">1</div>


                                <label for="length">Довжина, см</label>
                                <input class="calculator__inner-form-input" type="number" id="length" name="length"
                                       min="1"
                                       value="" required>

                                <label for="width">Ширина, см</label>
                                <input class="calculator__inner-form-input" type="number" id="width" name="width"
                                       min="1"
                                       value="" required>

                                <label for="height">Висота, см</label>
                                <input class="calculator__inner-form-input" type="number" id="height" name="height"
                                       min="1"
                                       value="" required>

                                <label class="calculator__inner-form-label" for="#">Вага, кг</label><br>
                                <input class="calculator__inner-form-input" type="number" id="weight" name="вага"
                                       min="1"
                                       value="" required>

                                <div id="additionalItems"></div>
                                <button class="button" id="addPlace">Додати місце +</button>
                                <br>

                                <div id="result"></div>

                                <button class="calculator__inner-form-btn button" type="submit" value="Розрахувати">
                                    Розрахувати
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="calculator__inner-maps" id="map"></div>
                </div>

            </section>
		<?php } else {
			?>
            <section class="calculator" id="calculator">
                <div class="container container-calc">

                    <div class="calculator-wrap">
                        <div class="container-calc-title">
                            <h2 class="about-us-inner__title"><?php the_field( "calculator_title" ); ?></h2>
                            <p><?php the_field( "calculator_descr" ); ?></p>
                        </div>
                        <div class="calculator-inner">
                            <form class="calculator__inner-form" action="" method="post" id="deliveryForm">
                                <label class="calculator__inner-form-label" for="#">Where</label><br>

                                <select class="calculator__inner-form-input select-with-arrow" id="departureCountry"
                                        name="departureCountry">
                                    <option value="Ireland">Ireland</option>
                                    <option value="Ukraine">Ukraine</option>
                                </select>

                                <label class="calculator__inner-form-label" for="#">Where</label><br>
                                <select class="calculator__inner-form-input" id="destinationCountry"
                                        name="destinationCountry">
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="Ireland">Ireland</option>

                                </select>

                                <label class="calculator__inner-form-label" for="#">Number of seats</label><br>
                                <div class="calculator__inner-form-input" type="number" id="numberOfItems">1</div>


                                <label for="length">Length, centimeters</label>
                                <input class="calculator__inner-form-input" type="number" id="length" name="length"
                                       min="1"
                                       value="" required>

                                <label for="width">Width, centimeters</label>
                                <input class="calculator__inner-form-input" type="number" id="width" name="width"
                                       min="1"
                                       value="" required>

                                <label for="height">Height, centimeters</label>
                                <input class="calculator__inner-form-input" type="number" id="height" name="height"
                                       min="1"
                                       value="" required>

                                <label class="calculator__inner-form-label" for="#">Weight, kg</label><br>
                                <input class="calculator__inner-form-input" type="number" id="weight" name="вага"
                                       min="1"
                                       value="" required>

                                <div id="additionalItems"></div>
                                <button class="button" id="addPlace">Add place +</button>
                                <br>

                                <div id="result"></div>

                                <button class="calculator__inner-form-btn button" type="submit" value="Розрахувати">
                                    Calculate
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="calculator__inner-maps" id="map"></div>
                </div>

            </section>
			<?php
		}
		?>
        <section class="collection-points" id="collection-points">
            <div class="container">
                <div class="collection-points-title">
                    <h2 class="about-us-inner__title"><?php the_field( "collection_points_title" ); ?></h2>
                    <div class="collection-points-inner-btns">
                        <button class="collection-points-inner-btn custom-button-prev">
                            <svg width="80px" height="80px">
                                <use href="<?php echo bloginfo( 'template_url' ); ?>/assets/images/icons.svg#icon-arrow-left"></use>
                            </svg>
                        </button>
                        <button class="collection-points-inner-btn custom-button-next">
                            <svg width="80px" height="80px">
                                <use href="<?php echo bloginfo( 'template_url' ); ?>/assets/images/icons.svg#icon-arrow-right"></use>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="collection-points-slider swiper">
                    <ul class="collection-points__list swiper-wrapper collection-points-swiper">
						<?php
						if ( have_rows( 'collection_points_list' ) ):
							while ( have_rows( 'collection_points_list' ) ) : the_row();
								$sub_value_4 = get_sub_field( 'collection_points_list_item' );
								?>
                                <li class="collection-points__list-item swiper-slide">
                                    <div class="collection-points__list-item-title"> <?php echo "$sub_value_4" ?></div>
                                </li>
							<?php endwhile; else : endif; ?>
                    </ul>
                </div>
            </div>
        </section>
        <section class="message">
            <div class="container">
                <div class="message-inner">
                    <div>
                        <h2 class="about-us-inner__title message__title">  <?php the_field( "questions_title" ); ?></h2>

						<?php
						$current_language = pll_current_language();
						if ( $current_language == 'uk' ) {
							echo do_shortcode( '  [contact-form-7 id="057018b" title="Контактна форма 1"]' );

						} elseif ( $current_language == 'en' ) {
							echo do_shortcode( ' [contact-form-7 id="0d2beaf" title="Контактна форма 2"]' );
						}
						?>


                    </div>
					<?php
					$image4     = get_field( "questions_images" );
					$image_url4 = null;
					$image_alt4 = null;

					if ( $image1 ) {
						$image_alt4 = $image4['alt'];
						$image_url4 = $image4['url'];
					}
					?>
                    <img class="message-inner__img" src="<?php echo $image_url4; ?>" alt="<?php echo $image_alt4; ?>">
                </div>
            </div>
        </section>
    </main>


<?php
get_footer();
