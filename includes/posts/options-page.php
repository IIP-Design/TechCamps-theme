<?php
/**
 * Post settings page.
 */
class TechCamp_Post_Settings extends TechCamp_Admin {

	/**
	 * Define properties.
	 */
	function __construct() {
		$this->key = 'post_settings';
		$this->metabox_id = 'post_settings_metabox';
		$this->title = 'Post Settings';
		$this->parent = 'edit.php';
	}

	/**
	 * Add box and fields.
	 */
	function add_options_page_metabox() {

		// hook in our save notices
		add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );

		$cmb = new_cmb2_box( array(
			'id'         => $this->metabox_id,
			'hookup'     => false,
			'cmb_styles' => true,
			'show_on'    => array(
				'key'    => 'options-page',
				'value'  => array( $this->key, )
			),
		) );

		$cmb->add_field( array(
			'id'         => 'hero_image',
			'name'       => __( 'Main Page Hero Image', 'techcamp' ),
			'type'       => 'file',
			'options'    => array(
				'url'    => false,
			),
		) );

		$cmb->add_field( array(
			'id'         => 'hero_text',
			'name'       => __( 'Main Page Hero Text', 'techcamp' ),
			'type'       => 'textarea',
			'default'    => '<h1>Heading here</h1>' . "\r\n" . '<p>Description here</p>',
		) );

	}

}
$post_settings = new TechCamp_Post_Settings();
$post_settings->hooks();
