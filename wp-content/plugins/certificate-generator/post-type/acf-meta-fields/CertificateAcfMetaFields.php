<?php

class CertificateAcfMetaFields {


	public function __construct() {
		add_action('acf/init', array($this, 'register_custom_fields'));
	}
	public function register_custom_fields(): void {
		if (function_exists('acf_add_local_field_group')) {
			acf_add_local_field_group(array(
				'key' => 'group_6546c45a43f26',
				'title' => 'Certificate Option',
				'fields' => array(
					array(
						'key' => 'field_6546c46c9e5f3',
						'label' => 'Certificate Email',
						'name' => 'certificate_email',
						'type' => 'email',
						'instructions' => '',
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
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'certificate',
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
		}
	}


}new CertificateAcfMetaFields();
