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
                            <a href="<?php echo get_the_post_thumbnail_url(); ?>" class="image-popup-fit-width">
                                <div class="w-image">
                                    <?php
                                        the_post_thumbnail('full');
                                    ?>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <div class="w-info">
                                <h2><?php the_title(); ?></h2>

                                <div class="info-paint">
                                    <ul>
                                        <li><span>Năm sáng tác:</span> <?php echo k2_kinhdo_get_pro_opt('paint_year','1993'); ?></li>
                                        <li><span>Chất liệu:</span> <?php echo k2_kinhdo_get_pro_opt('paint_var','Cói'); ?></li>
                                        <li><span>Kích thước:</span> <?php echo k2_kinhdo_get_pro_opt('paint_size','393x284'); ?></li>
                                        <li><span>Bộ sưu tập:</span> <?php echo k2_kinhdo_get_pro_opt('paint_add','393x284'); ?></li>
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
