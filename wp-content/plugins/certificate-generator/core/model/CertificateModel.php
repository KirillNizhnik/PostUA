<?php

class CertificateModel {

	private string $certificateKey;
	private string $emailBuyer;
	private string $price;
	private string $transactionID;

	/**
	 * @throws Exception
	 */
	public function __construct( $emailBuyer, $price, $transactionId ) {
		$this->emailBuyer = $emailBuyer;
		$this->price = $price;
		$this->transactionID = $transactionId;
		$this->saveCertificate();
	}

	/**
	 * @throws Exception
	 */
	public function generateCertificateKey(): void {
		$token = '';
		$is_unique = false;

		while (!$is_unique) {
			$random_bytes = random_bytes(32);
			$token = bin2hex($random_bytes);

			$args = array(
				'post_type' => 'certificate',
				'name' => $token,
			);

			$existing_posts = new WP_Query($args);

			if (!$existing_posts->have_posts()) {
				$is_unique = true;
			}
		}

		$this->certificateKey = $token;
		wp_reset_query();
	}

	/**
	 * @throws Exception
	 */
	public function saveCertificate(): void {
		$this->generateCertificateKey();
		$post_data = array(
			'post_title' => $this->certificateKey,
			'post_type' => 'certificate',
			'post_status' => 'publish',
		);
		$post_id = wp_insert_post($post_data);
		$this->setMetaInfo($post_id);
		$this->mail();

	}

	/**
	 * @return string
	 */
	public function getCertificateKey(): string {
		return $this->certificateKey;
	}
	private function setMetaInfo($post_id): void {
		$this->setEmail($post_id);
		$this->setTransactionId($post_id);
		$this->setPrice($post_id);
		$this->setStatusActive($post_id);
	}

	private function setEmail($post_id): void {
		update_field('certificate_email', $this->emailBuyer, $post_id);
	}

	private function setTransactionId($post_id): void {
		update_post_meta($post_id, '_certificate_meta_key', $this->transactionID);
	}

	private function setPrice($post_id): void {
		update_post_meta($post_id, '_certificate_price', $this->price);
	}

	private function setStatusActive( $post_id ): void {
		update_post_meta($post_id, '_certificate_status', 'active');
	}

	private function mail() : void {
		wp_mail($this->emailBuyer, 'Certificate POST UA', 'Ваш сертифікат: ' . $this->certificateKey);
	}


}