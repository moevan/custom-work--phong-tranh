<?php

if ( class_exists( 'MuseaCoreClassWidget' ) ) {
	class MuseaElatedClassSideAreaOpener extends MuseaCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'eltdf_side_area_opener',
				esc_html__( 'Musea Side Area Opener', 'musea' ),
				array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'musea' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_color',
					'title'       => esc_html__( 'Side Area Opener Color', 'musea' ),
					'description' => esc_html__( 'Define color for side area opener', 'musea' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_hover_color',
					'title'       => esc_html__( 'Side Area Opener Hover Color', 'musea' ),
					'description' => esc_html__( 'Define hover color for side area opener', 'musea' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'widget_margin',
					'title'       => esc_html__( 'Side Area Opener Margin', 'musea' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'musea' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'widget_title',
					'title' => esc_html__( 'Side Area Opener Title', 'musea' )
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$classes = array(
				'eltdf-side-menu-button-opener',
				'eltdf-icon-has-hover'
			);
			
			$classes[] = musea_elated_get_icon_sources_class( 'side_area', 'eltdf-side-menu-button-opener' );
			
			$styles = array();
			if ( ! empty( $instance['icon_color'] ) ) {
				$styles[] = 'color: ' . $instance['icon_color'] . ';';
			}
			if ( ! empty( $instance['widget_margin'] ) ) {
				$styles[] = 'margin: ' . $instance['widget_margin'];
			}
			?>
			<a <?php musea_elated_class_attribute( $classes ); ?> <?php echo musea_elated_get_inline_attr( $instance['icon_hover_color'], 'data-hover-color' ); ?> href="javascript:void(0)" <?php musea_elated_inline_style( $styles ); ?>>
				<?php if ( ! empty( $instance['widget_title'] ) ) { ?>
					<h5 class="eltdf-side-menu-title"><?php echo esc_html( $instance['widget_title'] ); ?></h5>
				<?php } ?>
				<span class="eltdf-side-menu-icon">
					<?php echo musea_elated_get_icon_sources_html( 'side_area' ); ?>
	            </span>
			</a>
		<?php }
	}
}