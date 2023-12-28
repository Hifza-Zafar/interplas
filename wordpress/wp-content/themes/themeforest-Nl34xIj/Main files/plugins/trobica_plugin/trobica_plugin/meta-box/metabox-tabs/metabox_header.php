<?php
/**
 * Metabox For Header.
 *
 * @package Trobica
 */
?>
<?php 
trobica_meta_box_dropdown('trobica_header_format',
	esc_html__('Header Format', 'trobica_plg'),
	array('default' => esc_html__('Default', 'trobica_plg'),
		  'global' => esc_html__( 'Use Global Settings (in Theme Options)', 'trobica_plg' ),
		  'head_white' => esc_html__( 'Black Txt & White Background, Relative Position', 'trobica_plg' ),
		  'head_trans' => esc_html__( 'White Txt. & Trans. Background, Absolute Position','trobica_plg'),
		  'custom_header' => esc_html__( 'Use Custom Header', 'trobica_plg' ),
		  'no_header' => esc_html__( 'No Header', 'trobica_plg' )
	)
);

trobica_meta_box_dropdown_custom_headers('trobica_header_list',
	esc_html__('Choose Custom Header', 'trobica_plg'),
	'',
	esc_html__('Only if used "Custom Header" format', 'trobica_plg') 
);

trobica_meta_box_dropdown_menu('trobica_header_menu',
	esc_html__('Select Menu', 'trobica_plg'), 
	'',
	esc_html__('You can manage menu using Appearance > Menus', 'trobica_plg')
);

trobica_meta_box_dropdown('trobica_header_enable_social',
	esc_html__('Show Social', 'trobica_plg'),
	array('default' => esc_html__('Default', 'trobica_plg'),
		  'on' => esc_html__( 'On', 'trobica_plg' ),
		  'off' => esc_html__( 'Off', 'trobica_plg' ),
	)
);

trobica_meta_box_dropdown('trobica_header_search',
	esc_html__('Show Search icon', 'trobica_plg'),
	array('default' => esc_html__('Default', 'trobica_plg'),
		  'on' => esc_html__( 'On', 'trobica_plg' ),
		  'off' => esc_html__( 'Off', 'trobica_plg' ),
	)
);
trobica_meta_box_dropdown('trobica_header_cart',
	esc_html__('Show Cart', 'trobica_plg'),
	array('default' => esc_html__('Default', 'trobica_plg'),
		  'on' => esc_html__( 'On', 'trobica_plg' ),
		  'off' => esc_html__( 'Off', 'trobica_plg' ),
	)
);
trobica_meta_box_dropdown('trobica_header_btn',
	esc_html__('Show Button', 'trobica_plg'),
	array('default' => esc_html__('Default', 'trobica_plg'),
		  'on' => esc_html__( 'On', 'trobica_plg' ),
		  'off' => esc_html__( 'Off', 'trobica_plg' ),
	)
);


trobica_meta_box_colorpicker( 'trobica_main_menu',
	esc_html__( 'Main menu color', 'trobica_plg' )
);
trobica_meta_box_colorpicker( 'trobica_main_menu_hover',
	esc_html__( 'Main menu Hover', 'trobica_plg' )
); 
trobica_meta_box_colorpicker( 'trobica_stick_menu',
	esc_html__( 'Sticky menu trans. Background', 'trobica_plg' )
);
trobica_meta_box_colorpicker( 'trobica_stick_menu2',
	esc_html__( 'Sticky menu Background', 'trobica_plg' )
);
trobica_meta_box_colorpicker( 'trobica_menu_border',
	esc_html__( 'Menu border', 'trobica_plg' )
);


