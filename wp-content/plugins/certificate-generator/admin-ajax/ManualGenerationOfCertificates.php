<?php

class ManualGenerationOfCertificates {

	public function __construct() {
		add_action( 'wp_ajax_create_certificate', [ $this, 'manualGenerationOfCertificate' ] );
		add_action( 'wp_ajax_nopriv_create_certificate', [ $this, 'manualGenerationOfCertificate' ] );
		add_action( 'wp_ajax_update_secret_key', [ $this, 'updateSecretKey' ] );
		add_action( 'wp_ajax_nopriv_update_secret_key', [ $this, 'updateSecretKey' ] );
	}

	public function manualGenerationOfCertificate(): void {
		$email = $_POST['email'];
		$price = $_POST['price'];
		if ( $email !== '' ) {

			$certificate = new CertificateModel( $email, $price, 'manual generate' );
			wp_send_json_success( $certificate->getCertificateKey());
		} else {
			wp_send_json_error();
		}
		wp_die();
	}

	public function updateSecretKey(): void {
		$secretKey = $_POST['secretKey'];
		update_option('my_secret_key', $secretKey);
		wp_send_json_success();
		wp_die();
	}




}

new ManualGenerationOfCertificates();