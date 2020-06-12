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
                    
                        <p  class="entry-title eltdf-plc-title" style="text-align: center; margin-top: 4px">
                        <?php 
                            the_title();
                        ?>
                        </p>
                   
                    <div class="eltdf-plc-text thong-tin-tranh" <?php echo musea_elated_get_inline_style( $shader_styles ); ?>>
                        <div class="eltdf-plc-text-outer">
                            <div class="eltdf-plc-text-inner ">
                                <?php 
                                // musea_elated_get_module_template_part( 'templates/parts/add-to-cart', 'woocommerce', '', $params ); 
                                echo "<span>Năm sáng tác: </span>";
                                     if(get_field('nam_sang_tac') != null){
                                      
                                       echo get_field('nam_sang_tac');
                                     
                                     
                                    } ;
                                    echo '<br/>';
                                    echo "<span>Chất liệu: </span>";

                                    if(get_field('chat_lieu') != null){
                                        
                                      echo   get_field('chat_lieu');
                                      
                                    } ;
                                    echo '<br/>';
                                    echo "<span>Kích thước: </span>";
                                    if(get_field('kich_thuoc') != null){
                                       
                                        echo get_field('kich_thuoc');
                                    } ;

                                     ?>
                            </div>
                        </div>
                    </div>
					<a class="eltdf-plc-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
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