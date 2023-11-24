<?php

class CertificateWpMetaFields {


	public function __construct() {
		add_action('add_meta_boxes', [$this, 'add_certificate_meta_box']);
		add_action('add_meta_boxes', [$this,'add_certificate_price_meta_box']);
		add_action('add_meta_boxes', [$this,'add_certificate_status_meta_box']);
		add_action('save_post', [$this,'save_certificate_status_meta_data']);
		add_filter('manage_certificate_posts_columns', [$this,'add_certificate_custom_columns']);
		add_action('manage_certificate_posts_custom_column', [$this,'display_certificate_custom_columns'], 10, 2);
		add_action('restrict_manage_posts', [$this,'add_certificate_status_filter']);
		add_action('pre_get_posts', [$this,'apply_certificate_status_filter']);
	}

	function add_certificate_meta_box(): void {
		add_meta_box(
			'certificate_meta_box',
			'TransactionID',
			[$this,'display_certificate_meta_box'],
			'certificate',
			'normal',
			'high'
		);
	}

	function display_certificate_meta_box($post): void {
		$value = get_post_meta($post->ID, '_certificate_meta_key', true);
		?>
		<label>Transaction ID:
			<input type="text" readonly name="certificate_meta_field" value="<?php echo esc_attr($value); ?>">
		</label>
		<?php
	}

	function add_certificate_price_meta_box(): void {
		add_meta_box(
			'certificate_price_meta_box',
			'Price Certificate',
			[$this,'display_certificate_price_meta_box'],
			'certificate',
			'normal',
			'high'
		);
	}



	function display_certificate_price_meta_box($post): void {
		$price = get_post_meta($post->ID, '_certificate_price', true);
		?>
        <label>Price:
            <input readonly type="text" name="certificate_price_field" value="<?php echo esc_attr($price); ?>">
        </label>
		<?php
	}

	function add_certificate_status_meta_box(): void {
		add_meta_box(
			'certificate_status_meta_box',
			'Status',
			[$this,'display_certificate_status_meta_box'],
			'certificate',
			'side',
			'default'
		);
	}


	function display_certificate_status_meta_box($post): void {
		$status = get_post_meta($post->ID, '_certificate_status', true);
		?>
        <label for="certificate_status">Status:</label><br>
        <label>
            <input type="radio" name="certificate_status" value="active" <?php checked($status, 'active'); ?>>
        </label> Active<br>
        <label>
            <input type="radio" name="certificate_status" value="deactivated" <?php checked($status, 'deactivated'); ?>>
        </label> Deactivated<br>
		<?php
	}

	function save_certificate_status_meta_data($post_id): void {
		if (array_key_exists('certificate_status', $_POST)) {
			$status = sanitize_text_field($_POST['certificate_status']);
			update_post_meta($post_id, '_certificate_status', $status);
		}
	}
	function add_certificate_custom_columns($columns) {
		$columns['price'] = 'Price';
		$columns['status'] = 'Status';
		return $columns;
	}



	function display_certificate_custom_columns($column, $post_id): void {
		switch ($column) {
			case 'price':
				$price = get_post_meta($post_id, '_certificate_price', true);
				echo esc_html($price);
				break;
			case 'status':
				$status = get_post_meta($post_id, '_certificate_status', true);
                if ($status === 'active'){
				?>
                    <span style="font-size: 18px; color:green">ACTIVE</span>
                    <?php
                }
				if ($status === 'deactivated'){
					?>
                    <span style="font-size: 18px; color:red">DEACTIVATED</span>
					<?php
				}
				break;
			default:
				break;
		}
	}

	function add_certificate_status_filter(): void {
		global $post_type;

		if ($post_type == 'certificate') { // Замените 'certificate' на ваш тип записи
			$selected = $_GET['certificate_status_filter'] ?? '';
			?>
            <label>
                <select name="certificate_status_filter">
                    <option value="">Все</option>
                    <option value="active" <?php selected($selected, 'active'); ?>>Активі</option>
                    <option value="deactivated" <?php selected($selected, 'deactivated'); ?>>Неактивні</option>
                </select>
            </label>
			<?php
		}
	}


	function apply_certificate_status_filter($query): void {
		if (!is_admin() || !$query->is_main_query()) {
			return;
		}

		if (isset($_GET['certificate_status_filter'])) {
			$status = sanitize_text_field($_GET['certificate_status_filter']);

			if ($status === 'active') {
				$query->set('meta_key', '_certificate_status');
				$query->set('meta_value', 'active');
			} elseif ($status === 'deactivated') {
				$query->set('meta_key', '_certificate_status');
				$query->set('meta_value', 'deactivated');
			}
		}
	}

}new CertificateWpMetaFields();