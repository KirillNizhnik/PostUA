<?php

class CronEventGenerateCertificate {

	public function __construct() {
		new \Kama\WP\Kama_Cron( [
			'generateCertificate' => [
				'callback'      => [ $this, 'generateCertificate' ],
				'interval_name' => '1 min',
			],
		] );
		add_action( 'wp_ajax_import_certificate', [ $this, 'importCertificate' ] );
		add_action( 'wp_ajax_nopriv_import_certificate', [ $this, 'importCertificate' ] );
	}

	function generateCertificate(): void {
		$certificateGenerator = new CertificateGenerator();
		$certificateGenerator->generateCertificates();
	}

	public function importCertificate(): void {
		$this->generateCertificate();
		wp_die();
	}


}

new CronEventGenerateCertificate();
