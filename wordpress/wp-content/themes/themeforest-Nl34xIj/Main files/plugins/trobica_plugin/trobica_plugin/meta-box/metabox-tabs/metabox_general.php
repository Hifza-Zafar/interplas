<?php
/**
 * Metabox For General.
 *
 * @package Trobica 
 */
?>
<?php 

trobica_meta_box_dropdown('trobica_sidebar_format', 
	esc_html__('Sidebar Format', 'trobica_plg'),
	array('default' => esc_html__( 'Use Global Settings (in Theme Options)', 'trobica_plg' ),
		  'right_sidebar' => esc_html__( 'Right Sidebar', 'trobica_plg' ),
		  'left_sidebar' => esc_html__( 'Left Sidebar','trobica_plg'),
		  'no_sidebar' => esc_html__( 'No Sidebar', 'trobica_plg' )
	)
);


trobica_meta_box_colorpicker( 'trobica_color_general',
	esc_html__( 'General scheme color ', 'trobica_plg' )
); 

trobica_meta_box_colorpicker( 'trobica_custom_hovers',
	esc_html__( 'Custom hovers', 'trobica_plg' )
);

trobica_meta_box_colorpicker( 'trobica_color_scheme',
	esc_html__( 'Color scheme', 'trobica_plg' )
);
trobica_meta_box_colorpicker( 'general_color',
	esc_html__( 'General color', 'trobica_plg' )
);

