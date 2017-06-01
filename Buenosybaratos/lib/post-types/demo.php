<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 *
 * @link http://metabox.io/docs/registering-meta-boxes/
 */


add_filter( 'rwmb_meta_boxes', 'your_prefix_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function your_prefix_register_meta_boxes( $meta_boxes ) {
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'your_prefix_';

	// 2nd meta box
	$meta_boxes[] = array(
		'title' => esc_html__( 'Advanced Fields', 'your-prefix' ),

		'fields' => array(
			
			
			// EMAIL
			array(
				'name' => esc_html__( 'Email', 'your-prefix' ),
				'id'   => "{$prefix}email",
				'desc' => esc_html__( 'Email description', 'your-prefix' ),
				'type' => 'email',
				'std'  => 'name@email.com',
			),
			
			// URL
			array(
				'name' => esc_html__( 'URL', 'your-prefix' ),
				'id'   => "{$prefix}url",
				'desc' => esc_html__( 'URL description', 'your-prefix' ),
				'type' => 'url',
				'std'  => 'http://google.com',
			),
			

			// DIVIDER
			array(
				'type' => 'divider',
			),
			// FILE UPLOAD
			array(
				'name' => esc_html__( 'File Upload', 'your-prefix' ),
				'id'   => "{$prefix}file",
				'type' => 'file',
			),
			// FILE ADVANCED (WP 3.5+)
			array(
				'name'             => esc_html__( 'File Advanced Upload', 'your-prefix' ),
				'id'               => "{$prefix}file_advanced",
				'type'             => 'file_advanced',
				'max_file_uploads' => 4,
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
			// IMAGE ADVANCED - RECOMMENDED
			array(
				'name'             => esc_html__( 'Image Advanced Upload (Recommended)', 'your-prefix' ),
				'id'               => "{$prefix}imgadv",
				'type'             => 'image_advanced',

				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,

				// Maximum image uploads
				'max_file_uploads' => 2,

				// Display the "Uploaded 1/2 files" status
				'max_status'       => true,
			),
			// IMAGE UPLOAD
			array(
				'id'               => 'image_upload',
				'name'             => esc_html__( 'Image Upload', 'your-prefix' ),
				'type'             => 'image_upload',

				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,

				// Maximum image uploads
				'max_file_uploads' => 2,

				// Display the "Uploaded 1/2 files" status
				'max_status'       => true,
			),
			// PLUPLOAD IMAGE UPLOAD (ALIAS OF IMAGE UPLOAD)
			array(
				'name'             => esc_html__( 'Plupload Image (Alias of Image Upload)', 'your-prefix' ),
				'id'               => "{$prefix}plupload",
				'type'             => 'plupload_image',

				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,

				// Maximum image uploads
				'max_file_uploads' => 2,

				// Display the "Uploaded 1/2 files" status
				'max_status'       => true,
			),
			// THICKBOX IMAGE UPLOAD (WP 3.3+)
			array(
				'name'         => esc_html__( 'Thickbox Image Upload', 'your-prefix' ),
				'id'           => "{$prefix}thickbox",
				'type'         => 'thickbox_image',

				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete' => false,
			),
			// IMAGE
			array(
				'name'             => esc_html__( 'Image Upload', 'your-prefix' ),
				'id'               => "{$prefix}image",
				'type'             => 'image',

				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,

				// Maximum image uploads
				'max_file_uploads' => 2,
			),
			// VIDEO
			array(
				'name'             => __( 'Video', 'your-prefix' ),
				'id'               => 'video',
				'type'             => 'video',

				// Maximum video uploads. 0 = unlimited.
				'max_file_uploads' => 3,

				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,

				// Display the "Uploaded 1/3 files" status
				'max_status'       => true,
			),
			// BUTTON
			array(
				'id'   => "{$prefix}button",
				'type' => 'button',
				'name' => ' ', // Empty name will "align" the button to all field inputs
			),
			// TEXT-LIST
			array(
				'name'    => esc_html__( 'Text List', 'rwmb' ),
				'id'      => "{$prefix}text_list",
				'type'    => 'text_list',
				// Options of inputs, in format 'Placeholder' => 'Label'
				'options' => array(
					'Placehold1' => esc_html__( 'Label1', 'rwmb' ),
					'Placehold2' => esc_html__( 'Label2', 'rwmb' ),
					'Placehold3' => esc_html__( 'Label3', 'rwmb' ),
				),
			),

		),
	);

	return $meta_boxes;
}
