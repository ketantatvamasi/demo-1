<?php 

add_filter('acf/settings/show_admin', '__return_false');

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5f05c346b8f7f',
	'title' => 'Featured Video',
	'fields' => array(
		array(
			'key' => 'field_5f05c35002b3e',
			'label' => 'Video URL',
			'name' => 'video_url',
			'type' => 'text',
			'instructions' => 'Enter your video URL here. Only .mp4 videos supported. URL must be like that: http://domain.com/video.mp4',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'portfolios',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5f05b37bdb1a3',
	'title' => 'Page Settings',
	'fields' => array(
		array(
			'key' => 'field_5f05ba3317bca',
			'label' => 'Page Settings',
			'name' => 'page_settings',
			'type' => 'group',
			'instructions' => 'Select your page settings here.
"Default" option is the global option which setted on theme options.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5f0dc0265637d',
					'label' => 'Background Color',
					'name' => 'background_color',
					'type' => 'button_group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'default' => 'Default',
						'custom' => 'Custom',
					),
					'allow_null' => 0,
					'default_value' => 'default',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5f0dc03d5637e',
					'label' => 'Background Color Select',
					'name' => 'background_color_select',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f0dc0265637d',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '#ffffff',
				),
				array(
					'key' => 'field_5f09a6f26e20d',
					'label' => 'Fullscreen Page',
					'name' => 'fullscreen_page',
					'type' => 'true_false',
					'instructions' => 'If you switch this to \'yes\' page will be fit on screen and overflow elements will not be visible.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5f0d8f7573022',
					'label' => 'Footer Style',
					'name' => 'footer_style',
					'type' => 'button_group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'none' => 'No Footer',
						'classic' => 'Classic',
					),
					'allow_null' => 0,
					'default_value' => 'classic',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'portfolios',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5f05a7575b216',
	'title' => 'Portfolio Metas',
	'fields' => array(
		array(
			'key' => 'field_5f05ac0726f03',
			'label' => '',
			'name' => 'meta_1_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => 'Meta 1 Title',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f05ad5ec619b',
			'label' => '',
			'name' => 'meta_1_content',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => 'Meta 1 Content',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f05add8db132',
			'label' => '',
			'name' => 'meta_2_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => 'Meta 2 Title',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f05adf6625f5',
			'label' => '',
			'name' => 'meta_2_content',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => 'Meta 2 Content',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f05ae12ed00d',
			'label' => '',
			'name' => 'meta_3_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => 'Meta 3 Title',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f05ae1ded00e',
			'label' => '',
			'name' => 'meta_3_content',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => 'Meta 3 Content',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f05ae932d461',
			'label' => 'Summary',
			'name' => 'summary',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 6,
			'new_lines' => '',
		),
		array(
			'key' => 'field_5f05b2db6096e',
			'label' => 'Year',
			'name' => 'year',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '20',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f08e2480e8b3',
			'label' => 'Excerpt',
			'name' => 'excerpt',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '40',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 4,
			'new_lines' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'portfolios',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5f05bc2d9900b',
	'title' => 'Project Settings',
	'fields' => array(
		array(
			'key' => 'field_5f0ca41946250',
			'label' => 'Custom Header Image',
			'name' => 'custom_header_image',
			'type' => 'image',
			'instructions' => 'You can upload a specific image for project header.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium_large',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5f05c156db1a6',
			'label' => 'Header Image Size',
			'name' => 'header_image_size',
			'type' => 'button_group',
			'instructions' => 'Select header image size here. This value will be change header image size based on screen height.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'project-image-half' => 'Halfscreen',
				'project-image-full' => 'Fullscreen',
			),
			'allow_null' => 0,
			'default_value' => 'project-image-half',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5f05c0985296b',
			'label' => 'Header Image Type',
			'name' => 'header_image_type',
			'type' => 'button_group',
			'instructions' => 'You can select project header image type here. If you select "Video" you must enter a video URL. If you select "None" nothing will be displayed on project header.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'image' => 'Image',
				'video' => 'Video',
				'none' => 'None',
			),
			'allow_null' => 0,
			'default_value' => 'Image',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5f05c2007a2b9',
			'label' => 'Header Overlays',
			'name' => 'header_overlays',
			'type' => 'true_false',
			'instructions' => 'Switch "No" if you don\'t want to display header image overlays.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5f8c0f474eafd',
			'label' => 'Project Title Color',
			'name' => 'project_title_color',
			'type' => 'color_picker',
			'instructions' => 'You can select a custom color for project title.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5f8c137c8300e',
			'label' => 'Project Category Color',
			'name' => 'project_category_color',
			'type' => 'color_picker',
			'instructions' => 'You can select a custom color for project title.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5f0ca46a21bad',
			'label' => 'Next Project',
			'name' => 'next_project',
			'type' => 'post_object',
			'instructions' => 'Next post section is automatically detect posts by publishing date but you can also select the next post here.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'portfolios',
			),
			'taxonomy' => '',
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'portfolios',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5f1ae67d0326e',
	'title' => 'Showcase Orders',
	'fields' => array(
		array(
			'key' => 'field_5f1ae68497638',
			'label' => '',
			'name' => 'bs_order',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 10,
			'placeholder' => '',
			'prepend' => 'Big Slider',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5f1ae7440573d',
			'label' => '',
			'name' => 'horizontal_order',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 10,
			'placeholder' => '',
			'prepend' => 'Horizontal',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5f1ae7440573c',
			'label' => '',
			'name' => 'vertical_order',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 10,
			'placeholder' => '',
			'prepend' => 'Vertical',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5f1ae7440573b',
			'label' => '',
			'name' => 'list_order',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 10,
			'placeholder' => '',
			'prepend' => 'List Carousel',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5f1ae7430573a',
			'label' => '',
			'name' => 'wall_order',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 10,
			'placeholder' => '',
			'prepend' => 'Wall',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5f1ae74305739',
			'label' => '',
			'name' => 'detailed_order',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 10,
			'placeholder' => '',
			'prepend' => 'Detailed',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5f1ae78d0573e',
			'label' => '',
			'name' => 'grid_order',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 10,
			'placeholder' => '',
			'prepend' => 'Grid',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'portfolios',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5f0982fc02eca',
	'title' => 'Spesific Showcase Images',
	'fields' => array(
		array(
			'key' => 'field_5f0983096ea39',
			'label' => 'Big Slider',
			'name' => 'big_slider',
			'type' => 'group',
			'instructions' => 'Spesific image/video for "Big Slider" showcase element.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33333',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5f0983216ea3a',
					'label' => 'Enable',
					'name' => 'enable',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5f0984ae78463',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => 'You can upload a specific image or video for this showcase layout.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f0983216ea3a',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5f0985aa79775',
					'label' => 'Video',
					'name' => 'video',
					'type' => 'text',
					'instructions' => 'Only .mp4 videos supported.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f0983216ea3a',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'http://domain.com/video.mp4',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_5f098885e2afe',
			'label' => 'List Carousel',
			'name' => 'list_carousel',
			'type' => 'group',
			'instructions' => 'Spesific image/video for "List Carousel" showcase element.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33333',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5f098885e2aff',
					'label' => 'Enable',
					'name' => 'enable',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5f098885e2b00',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f098885e2aff',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5f098885e2b01',
					'label' => 'Video',
					'name' => 'video',
					'type' => 'text',
					'instructions' => 'Only .mp4 videos supported.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f098885e2aff',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'http://domain.com/video.mp4',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_5f09889f94521',
			'label' => 'Wall',
			'name' => 'wall',
			'type' => 'group',
			'instructions' => 'Spesific image/video for "Wall" showcase element.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33333',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5f09889f94522',
					'label' => 'Enable',
					'name' => 'enable',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5f09889f94523',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f09889f94522',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5f09889f94524',
					'label' => 'Video',
					'name' => 'video',
					'type' => 'text',
					'instructions' => 'Only .mp4 videos supported.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f09889f94522',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'http://domain.com/video.mp4',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_5f0988ac0c07e',
			'label' => 'Horizontal',
			'name' => 'horizontal',
			'type' => 'group',
			'instructions' => 'Spesific image/video for "Horizontal" showcase element.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33333',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5f0988ac0c07f',
					'label' => 'Enable',
					'name' => 'enable',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5f0988ac0c080',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f0988ac0c07f',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5f0988ac0c081',
					'label' => 'Video',
					'name' => 'video',
					'type' => 'text',
					'instructions' => 'Only .mp4 videos supported.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f0988ac0c07f',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'http://domain.com/video.mp4',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_5f0988bb0c082',
			'label' => 'Vertical',
			'name' => 'vertical',
			'type' => 'group',
			'instructions' => 'Spesific image/video for "Vertical" showcase element.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33333',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5f0988bb0c083',
					'label' => 'Enable',
					'name' => 'enable',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5f0988bb0c084',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f0988bb0c083',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5f0988bb0c085',
					'label' => 'Video',
					'name' => 'video',
					'type' => 'text',
					'instructions' => 'Only .mp4 videos supported.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f0988bb0c083',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'http://domain.com/video.mp4',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_5f1b4e32e23d8',
			'label' => 'Detailed',
			'name' => 'detailed',
			'type' => 'group',
			'instructions' => 'Spesific image/video for "Detailed" showcase element.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33333',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5f1b4e32e23d9',
					'label' => 'Enable',
					'name' => 'enable',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5f1b4e32e23da',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f1b4e32e23d9',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5f1b4e32e23db',
					'label' => 'Video',
					'name' => 'video',
					'type' => 'text',
					'instructions' => 'Only .mp4 videos supported.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f1b4e32e23d9',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'http://domain.com/video.mp4',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_5f1b57476836f',
			'label' => 'Grid',
			'name' => 'grid',
			'type' => 'group',
			'instructions' => 'Spesific image/video for "Grid" showcase element.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33333',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5f1b574768370',
					'label' => 'Enable',
					'name' => 'enable',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5f1b574768371',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f1b574768370',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5f1b574768372',
					'label' => 'Video',
					'name' => 'video',
					'type' => 'text',
					'instructions' => 'Only .mp4 videos supported.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f1b574768370',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'http://domain.com/video.mp4',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'portfolios',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;