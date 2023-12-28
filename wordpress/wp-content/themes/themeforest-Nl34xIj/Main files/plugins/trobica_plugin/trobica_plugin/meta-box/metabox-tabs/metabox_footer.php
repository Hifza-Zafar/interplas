<?php
/**
 * Metabox For Footer.
 *
 * @package Trobica
 */
?>
<?php 
trobica_meta_box_dropdown('trobica_footer_format',
	esc_html__('Footer Format', 'trobica_plg'),
	array('default' => esc_html__('Default', 'trobica_plg'),
		  'global' => esc_html__( 'Use Global Settings (in Theme Options)', 'trobica_plg' ),
		  'custom_footer' => esc_html__( 'Use Custom Footer', 'trobica_plg' ),
		  'no_footer' => esc_html__( 'No Footer', 'trobica_plg' )
	)
);

trobica_meta_box_dropdown_custom_footers('trobica_footer_list',
	esc_html__('Choose Custom Footer', 'trobica_plg'),
	'',
	esc_html__('Only if used "Custom Footer" format', 'trobica_plg')
);

trobica_meta_box_colorpicker( 'trobica_footer_color',
	esc_html__( 'Footer color', 'trobica_plg' )
);


