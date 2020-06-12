<?php
$shader_styles          = $this_object->getShaderStyles( $params );
$params['title_styles'] = $this_object->getTitleStyles( $params );
?>
<div class="eltdf-plc-holder <?php echo esc_attr( $holder_classes ) ?>">
	<div class="eltdf-plc-outer eltdf-owl-slider" <?php echo musea_elated_get_inline_attrs( $holder_data ); ?>>
		<?php if ( $query_result->have_posts() ): while ( $query_result->have_posts() ) : $query_result->the_post(); ?>
			<div class="eltdf-plc-item">
				<div class="eltdf-plc-image-outer">
                    <div class="eltdf-plc-image">
                        <?php  musea_elated_get_module_template_part( 'templates/parts/image', 'woocommerce', '', $params ); ?>
                      

                    </div>
                    <div class="eltdf-plc-text" <?php echo musea_elated_get_inline_style( $shader_styles ); ?>>
                        <div class="eltdf-plc-text-outer">
                            <div class="eltdf-plc-text-inner thong-tin-tranh">
                                <?php 
                                // musea_elated_get_module_template_part( 'templates/parts/add-to-cart', 'woocommerce', '', $params ); 
                                   
                                     if(get_field('nam_sang_tac') != null){
                                        echo "<span>Năm sáng tác: </span>";
                                       echo get_field('nam_sang_tac');
                                       echo '<br/>';
                                     
                                    } ;
                                    if(get_field('chat_lieu') != null){
                                        echo "<span>Chất liệu: </span>";
                                      echo   get_field('chat_lieu');
                                      echo '<br/>';
                                    } ;
                                    if(get_field('kich_thuoc') != null){
                                        echo "<span>Kích thước: </span>";
                                        echo get_field('kich_thuoc');
                                    } ;

                                     ?>
                            </div>
                        </div>
                    </div>
					<a class="eltdf-plc-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
				</div>
                <div class="eltdf-plc-text" <?php echo musea_elated_get_inline_style( $shader_styles ); ?>>
                    <div class="eltdf-plc-text-outer">
                        <div class="eltdf-plc-text-inner">
                            <?php musea_elated_get_module_template_part( 'templates/parts/title', 'woocommerce', '', $params ); ?>

                            <?php musea_elated_get_module_template_part( 'templates/parts/category', 'woocommerce', '', $params ); ?>

                            <?php musea_elated_get_module_template_part( 'templates/parts/excerpt', 'woocommerce', '', $params ); ?>

                            <?php musea_elated_get_module_template_part( 'templates/parts/rating', 'woocommerce', '', $params ); ?>

                            <?php musea_elated_get_module_template_part( 'templates/parts/price', 'woocommerce', '', $params ); ?>

                            <?php
                            $author_id = get_post_meta(get_the_ID(), "author", true);
                            if ($author_id) {
                                $args = array(
                                    "post_type" => "painter",
                                    "p" => intval($author_id),
                                );
                                query_posts($args);
                                while(have_posts()) : the_post();
                                ?>
                                <p class="entry-title eltdf-plc-title" style="text-align: center; margin-top: 4px">
                                    - <a title="Tác giả <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> -
                                </p>
                            <?php
                                endwhile; wp_reset_query();
                            }
                            ?>
                        </div>
                    </div>
                </div>
			</div>
		<?php endwhile;
		else:
			musea_elated_get_module_template_part( 'templates/parts/no-posts', 'woocommerce', '', $params );
		endif;
		wp_reset_postdata();
		?>
	</div>
</div>