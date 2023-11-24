<?php

class OptionGenerateCertificatePage {


	public function __construct() {
		add_action('admin_menu', [$this,'add_custom_settings_page']);
	}

	function certificate_settings_page(): void {
		include 'certificate-settings-page.php';
	}

	function add_custom_settings_page(): void {
		add_options_page('Налаштування сертифікатів', 'Сертифікати', 'manage_options', 'certificate-settings', [$this,'certificate_settings_page']);
	}

}new OptionGenerateCertificatePage();