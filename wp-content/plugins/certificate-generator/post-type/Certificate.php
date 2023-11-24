<?php

class Certificate {


	public function __construct() {
		add_action( 'init', [$this, 'register_certificate_post_type']);
	}

	function register_certificate_post_type(): void {
		$labels = array(
			'name'               => 'Сертифікати',
			'singular_name'      => 'Сертифікат',
			'add_new'            => 'Додати новий',
			'add_new_item'       => 'Додати новий сертифікат',
			'edit_item'          => 'Редагувати сертифікат',
			'new_item'           => 'Новий сертифікат',
			'view_item'          => 'Переглянути сертифікат',
			'search_items'       => 'Пошук сертифікатів',
			'not_found'          => 'Сертифікати не знайдені',
			'not_found_in_trash' => 'У кошику сертифікатів не знайдено',
			'menu_name'          => 'Сертифікати',
		);

		$args = array(
			'description' => false,
			'labels'              => $labels,
			'public'              => false,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'query_var'           => true,
			'rewrite'             => array( 'slug' => 'certificates' ),
			'capability_type'     => 'post',
			'has_archive'         => true,
			'hierarchical'        => false,
			'menu_position'       => 5,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
			'menu_icon'           => 'dashicons-awards',

		);

		register_post_type( 'certificate', $args );
	}


}new Certificate();