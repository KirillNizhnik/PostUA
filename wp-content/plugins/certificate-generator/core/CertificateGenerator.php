<?php

class CertificateGenerator {
	private string $secretKey;



	public function __construct() {
		$this->setSecretKey();
	}

	/**
	 * @throws \Stripe\Exception\ApiErrorException
	 */
	public function generateCertificates(): void {
		\Stripe\Stripe::setApiKey($this->secretKey);

		$endTime = time();
		$startTime = $endTime - 1800;


		$purchases = \Stripe\Charge::all([
			'created' => [
				'gte' => $startTime,
				'lte' => $endTime,
			],
			'status' => 'succeeded',
		]);
		foreach ($purchases->data as $purchase) {
			$id_transaction = $purchase->id;

			$existing_certificate = get_posts([
				'post_type'   => 'certificate',
				'numberposts' => 1,
				'meta_query'  => [
					[
						'key'   => '_certificate_meta_key',
						'value' => $id_transaction,
					],
				],
			]);

			if ($purchase->status !== 'succeeded' || $existing_certificate) {
				continue;
			}

			$amount = (string) $purchase->amount / 100;
			$email  = $purchase['billing_details']['email'];
			try {
				$certificate = new CertificateModel( $email, $amount, $id_transaction );
			} catch ( Exception $e ) {
			}
		}
	}

	private function setSecretKey(): void {
		$this->secretKey = get_option('my_secret_key');
	}


}