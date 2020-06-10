<?php
/**
 * The template for displaying all single posts
 *
 * @package k2_kinhdo
 */

get_header();
?>
    
    <div class="page-title">
        
        <div class="container">

            <h1><?php echo k2_pixel_get_page_titles(); ?></h1>
        </div>
    </div>

    <div class="content-paint">

        <div class="container">

            <?php

                while ( have_posts() )
                {
                    the_post();

                    ?>

                    <div class="w-paint">
                        
                        <div class="col-xs-12 col-md-7">

                            <div class="grap-image">
                                <?php
                                    $gallery = k2_kinhdo_get_price_opt('grap_gallery');
                                    if( $gallery == '' ) :

                                        the_post_thumbnail('full');
                                    else :
                                        $b = explode(",", $gallery);
                                        ?>
                                        <div class="swiper-container gallery-top">
                                            <div class="swiper-wrapper">
                                                <?php
                                                foreach ($b as $key => $value) {
                                                    $l = wp_get_attachment_image_src( $value, 'full' );

                                                    ?>
                                                    <div class="swiper-slide">
                                                        <a href="<?php echo $l[0]; ?>">
                                                            <div class="w-item">
                                                                <img src="<?php echo $l[0]; ?>" alt="slider">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-next swiper-button-white"></div>
                                            <div class="swiper-button-prev swiper-button-white"></div>
                                        </div>

                                        <div class="swiper-container gallery-thumbs">
                                            <div class="swiper-wrapper">
                                              <?php
                                                foreach ($b as $key => $value) {
                                                    $l = wp_get_attachment_image_src( $value, 'full' );

                                                    ?>
                                                    <div class="swiper-slide">
                                                        <img src="<?php echo $l[0]; ?>" alt="slider">
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                    endif;
                                ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <div class="w-info">
                                <h2><?php the_title(); ?></h2>

                                <div class="info-paint">
                                    <ul>
                                        <li><span>Năm sáng tác:</span> <?php echo k2_kinhdo_get_price_opt('grap_year','1993'); ?></li>
                                        <li><span>Chất liệu:</span> <?php echo k2_kinhdo_get_price_opt('grap_var','Cói'); ?></li>
                                        <li><span>Kích thước:</span> <?php echo k2_kinhdo_get_price_opt('grap_size','393x284'); ?></li>
                                        <li><span>Bộ sưu tập:</span> <?php echo k2_kinhdo_get_price_opt('grap_add','393x284'); ?></li>
                                    </ul>
                                </div>

                                <div class="pain-content">
                                    <h3>Mô tả: </h3>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
<?php
get_footer();
