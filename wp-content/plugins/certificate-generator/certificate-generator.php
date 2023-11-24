<?php

/**
 * Plugin Name: Certificate Generator
 * Description:
 * Version: 1.0
 * Author: Anastasia(by kirill)
 */


function connectPluginFiles(): void {

	//Stripe Library
	require_once 'stripe-php/init.php';
	//core
	//model
	require_once 'core/model/CertificateModel.php';

	//post-type
	require_once 'post-type/Certificate.php';


	//meta-fields
	//ACF
	require_once 'post-type/acf-meta-fields/CertificateAcfMetaFields.php';
	//WP
	require_once 'post-type/wp-meta-fields/CertificateWpMetaFields.php';


	//cron job
	require_once 'cron-job/cron.php';
	require_once 'cron-job/CronEventGenerateCertificate.php';

	//logic
	require_once 'core/CertificateGenerator.php';


	//templates
	require_once 'template/OptionGenerateCertificatePage.php';


	//admin-ajax
	require_once 'admin-ajax/ManualGenerationOfCertificates.php';
}

connectPluginFiles();






