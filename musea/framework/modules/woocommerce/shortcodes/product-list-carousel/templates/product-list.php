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
                        <a class="eltdf-plc-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>

                    </div>
                    <p  class="ten-tranh accordion" style="text-align: center; margin-top: 4px">
                        <?php                      
                            the_title();
                                           
                        ?>
                        </p>
                        <p  class="entry-title eltdf-plc-title panel" style="text-align: center; margin-top: 4px">
                        <?php
                      
                     
                            echo get_post(get_post_meta(get_the_ID(), "author", true))->post_title;
                            echo ', ';
                            the_field('nam_sang_tac');
                            echo ', ';
                            the_title();
                            echo ', ';
                            the_field('kich_thuoc') 

                            
                        ?>
                        </p>
                    
                   
			
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