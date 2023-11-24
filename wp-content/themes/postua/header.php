<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?><?php wp_title('', true); ?></title>

    <?php wp_head(); ?>

</head>
<body class="body">
<header class="header">
    <div class="container">
        <div class="header-inner">
            <a href="<?php echo get_home_url() ?>" class="header-inner__img">
                <?php
                $image = get_field("menu_logo", 8);
                $image_url = null;
                $image_alt = null;

                if ($image) {
                    $image_alt = $image['alt'];
                    $image_url = $image['url'];
                }
                ?>
                <img class="header-inner__link-logo" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
            </a>
            <ul class="header-inner__list">
                <li class="header-inner__list-item"><a
                            href="<?php echo is_front_page() ? '' : esc_url(home_url('/')); ?>#about-us">

                        <?php
                        $current_language = pll_current_language();

                        if ($current_language === 'uk') {
                            the_field("menu_item_1", 8);

                        } elseif ($current_language === 'en') {
                            the_field("menu_item_1", 193);

                        }
                        ?>

                    </a></li>
                <li class="header-inner__list-item"><a
                            href="<?php echo is_front_page() ? '' : esc_url(home_url('/')); ?>#service">


                        <?php
                        $current_language = pll_current_language();

                        if ($current_language === 'uk') {
                            the_field("menu_item_2", 8);

                        } elseif ($current_language === 'en') {
                            the_field("menu_item_2", 193);

                        }
                        ?>


                    </a></li>
                <li class="header-inner__list-item"><a
                            href="<?php echo is_front_page() ? '' : esc_url(home_url('/')); ?>#delivery-stages">

                        <?php
                        $current_language = pll_current_language();

                        if ($current_language === 'uk') {
                            the_field("menu_item_3", 8);

                        } elseif ($current_language === 'en') {
                            the_field("menu_item_3", 193);

                        }
                        ?>

                    </a></li>
                <li class="header-inner__list-item"><a
                            href="<?php echo is_front_page() ? '' : esc_url(home_url('/')); ?>#calculator">
                        <?php
                        $current_language = pll_current_language();

                        if ($current_language === 'uk') {
                            the_field("menu_item_4", 8);

                        } elseif ($current_language === 'en') {
                            the_field("menu_item_4", 193);

                        }
                        ?>

                    </a></li>
                <li class="header-inner__list-item"><a
                            href="<?php echo is_front_page() ? '' : esc_url(home_url('/')); ?>#collection-points">
                        <?php
                        $current_language = pll_current_language();

                        if ($current_language === 'uk') {
                            the_field("menu_item_5", 8);

                        } elseif ($current_language === 'en') {
                            the_field("menu_item_5", 193);

                        }
                        ?>
                    </a></li>
            </ul>

            <a class="header-inner__btn-tel" href="tel:<?php
            $current_language = pll_current_language();

            if ($current_language === 'uk') {
                the_field("number_link", 'option');

            } elseif ($current_language === 'en') {
                the_field("number_link_en", 'option');

            }
            ?>">
                <?php
                $current_language = pll_current_language();

                if ($current_language === 'uk') {
                    the_field("number", 'option');

                } elseif ($current_language === 'en') {
                    the_field("number_en", 'option');

                }
                ?>
            </a>
            <div class="header-inner__btns-right">
                <a class="header-navigation__list-item-link link "
                   href="<?php
                   $current_language = pll_current_language();
                   global $post;
                   $current_page_id = $post->ID;
//                   $page_id = pll_get_post( $current_page_id,'en'); // Получить URL английской версии
//                   $page_url = get_permalink($page_id);
//                   echo $page_url;

                   if ($current_language === 'uk') {
	                   $page_id = pll_get_post( $current_page_id,'en'); // Получить URL английской версии
	                   $page_url = get_permalink($page_id);
	                   echo $page_url;

                   } elseif ($current_language === 'en') {
	                   $page_id = pll_get_post( $current_page_id,'uk'); // Получить URL английской версии
	                   $page_url = get_permalink($page_id);
	                   echo $page_url;
                   }
                   ?>">
                    <?php
                    $current_language = pll_current_language();

                    if ($current_language === 'uk') {
                        the_field("menu_language", 8);

                    } elseif ($current_language === 'en') {
                        the_field("menu_language", 193);

                    }
                    ?>
                </a>
                <button class="header-inner__btn js-open-menu" data-modal-open="">
                    <svg width="44" height="28" viewBox="0 0 44 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2L42 2" stroke="#A4A4A4" stroke-width="4" stroke-linecap="round"/>
                        <path d="M2 14H42" stroke="#A4A4A4" stroke-width="4" stroke-linecap="round"/>
                        <path d="M2 26H42" stroke="#A4A4A4" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>
<div class="mobile-menu js-menu-container is-hidden" data-modal="">
    <div class="mobile-menu-container">
        <button class="mobile-menu-inner__btn" data-modal-close="">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line y1="-1" x2="17.569" y2="-1" transform="matrix(0.717521 0.696537 -0.575454 0.817834 0 2.35205)"
                      stroke="black" stroke-width="2"/>
                <line y1="-1" x2="17.5323" y2="-1" transform="matrix(-0.726665 0.686991 -0.565271 -0.824906 13 1)"
                      stroke="black" stroke-width="2"/>
            </svg>
        </button>
        <ul class="mobile-menu__list list ">
            <li class="mobile-menu__item ">
                <a class="mobile-menu__item-link link " href="<?php echo is_front_page() ? '' : esc_url(home_url('/')); ?>#about-us">
                    <?php
                    $current_language = pll_current_language();

                    if ($current_language === 'uk') {
                        the_field("menu_item_1", 8);

                    } elseif ($current_language === 'en') {
                        the_field("menu_item_1", 193);

                    }
                    ?>
                </a>
            </li>
            <li class="mobile-menu__item ">
                <a class="mobile-menu__item-link link " href="<?php echo is_front_page() ? '' : esc_url(home_url('/')); ?>#service">
                    <?php
                    $current_language = pll_current_language();

                    if ($current_language === 'uk') {
                        the_field("menu_item_2", 8);

                    } elseif ($current_language === 'en') {
                        the_field("menu_item_2", 193);

                    }
                    ?>
                </a>
            </li>
            <li class="mobile-menu__item ">
                <a class="mobile-menu__item-link link " href="<?php echo is_front_page() ? '' : esc_url(home_url('/')); ?>#delivery-stages">
                    <?php
                    $current_language = pll_current_language();

                    if ($current_language === 'uk') {
                        the_field("menu_item_3", 8);

                    } elseif ($current_language === 'en') {
                        the_field("menu_item_3", 193);

                    }
                    ?>
                </a>
            </li>
            <li class="mobile-menu__item ">
                <a class="mobile-menu__item-link link " href="<?php echo is_front_page() ? '' : esc_url(home_url('/')); ?>#calculator"><?php
                    $current_language = pll_current_language();

                    if ($current_language === 'uk') {
                        the_field("menu_item_4", 8);

                    } elseif ($current_language === 'en') {
                        the_field("menu_item_4", 193);

                    }
                    ?></a>
            </li>
            <li class="mobile-menu__item ">
                <a class="mobile-menu__item-link link " href="<?php echo is_front_page() ? '' : esc_url(home_url('/')); ?>#collection-points"><?php
                    $current_language = pll_current_language();

                    if ($current_language === 'uk') {
                        the_field("menu_item_5", 8);

                    } elseif ($current_language === 'en') {
                        the_field("menu_item_5", 193);

                    }
                    ?></a>
            </li>
        </ul>
    </div>
</div>

