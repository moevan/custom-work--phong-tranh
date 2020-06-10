<?php
get_header();

if (have_posts()) : while (have_posts()) : the_post();
    //Get blog single type and load proper helper
    musea_elated_include_blog_helper_functions('singles', 'standard');

    //Action added for applying module specific filters that couldn't be applied on init
    //do_action( 'musea_elated_action_blog_single_loaded' );

    //Get classes for holder and holder inner
    $eltdf_holder_params = musea_elated_get_holder_params_blog();
    ?>

    <div class="hehe eltdf-container-inner clearfix">
        <div class="eltdf-grid-row  eltdf-grid-large-gutter">
            <div class="eltdf-page-content-holder eltdf-grid-col-12">
                <div class="eltdf-blog-holder eltdf-blog-single eltdf-blog-single-standard">
                    <article class="painter type-painter status-publish hentry">
                        <div class="eltdf-post-content">
                            <div class="eltdf-post-text">
                                <div class="eltdf-post-text-inner">
                                    <div class="eltdf-post-text-main">
                                        <div class="eltdf-grid-row" style="padding-top: 30px;">
                                            <div class="eltdf-grid-col-3">
                                                <?php $thumbnail = get_the_post_thumbnail_url(); ?>
                                                <img src="<?php echo $thumbnail; ?>"/>
                                            </div>
                                            <div class="eltdf-grid-col-9">
                                                <h2 itemprop="name"
                                                    class="entry-title eltdf-post-title"><?php the_title(); ?></h2>
                                                <p style="font-size: 17px;text-transform: uppercase;font-weight: bold"><?php echo get_post_meta(get_the_ID(), "title", true) ?></p>
                                                <p style="font-size: 30px;"><?php echo get_post_meta(get_the_ID(), "year", true) ?></p>
                                                <div><?php the_excerpt(); ?></div>
                                            </div>
                                        </div>

                                        <div class="author-content">
                                            <?php the_content(); ?>
                                        </div>

                                        <h3>Các tác phẩm</h3>

                                        <div class="author-paintings">
                                            <div class="eltdf-grid-list eltdf-four-columns">
                                                <div class="eltdf-bl-wrapper eltdf-outer-space">
                                                    <div class="eltdf-blog-list">
                                                        <?php
                                                        $args = array(
                                                            "post_type" => "product",
                                                            "meta_key" => "author",
                                                            "meta_value" => get_the_ID(),
                                                        );
                                                        $query = new WP_Query($args);
                                                        if ($query->have_posts()) :
                                                            while ($query->have_posts()) : $query->the_post();
                                                                ?>
                                                                <div class="eltdf-bl-item eltdf-item-space">
                                                                    <div class="eltdf-plc-item">
                                                                        <div class="eltdf-plc-image-outer">
                                                                            <div class="eltdf-plc-image">
                                                                                <a href="<?php the_permalink(); ?>">
                                                                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="eltdf-plc-text">
                                                                            <div class="eltdf-plc-text-outer">
                                                                                <div class="eltdf-plc-text-inner">
                                                                                    <h5 itemprop="name"
                                                                                        class="entry-title eltdf-plc-title">
                                                                                        <a itemprop="url"
                                                                                           href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            endwhile;
                                                            wp_reset_query();
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; endif;

get_footer(); ?>