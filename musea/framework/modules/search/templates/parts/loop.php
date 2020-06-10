<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="eltdf-post-content">
	        <?php if ( has_post_thumbnail() ) { ?>
		        <div class="eltdf-post-image">
			        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				        <?php the_post_thumbnail( 'thumbnail' ); ?>
			        </a>
		        </div>
	        <?php } ?>
	        <div class="eltdf-post-title-area <?php if ( ! has_post_thumbnail() ) { echo esc_attr( 'eltdf-no-thumbnail' ); } ?>">
		        <div class="eltdf-post-title-area-inner">
			        <h5 itemprop="name" class="eltdf-post-title entry-title">
				        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			        </h5>
			        <?php
			        $eltdf_my_excerpt = get_the_excerpt();
			        
			        if ( ! empty( $eltdf_my_excerpt ) ) { ?>
				        <p itemprop="description" class="eltdf-post-excerpt"><?php echo wp_trim_words( esc_html( $eltdf_my_excerpt ), 30 ); ?></p>
			        <?php } ?>
		        </div>
	        </div>
        </div>
    </article>
<?php endwhile; ?>
<?php else: ?>
	<p class="eltdf-blog-no-posts"><?php esc_html_e( 'No posts were found.', 'musea' ); ?></p>
<?php endif; ?>