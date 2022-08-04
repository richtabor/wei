<?php
/**
 * Wei: Block Patterns
 *
 * @since Wei 1.0
 */

if ( ! function_exists( 'wei_register_meta' ) ) :

	/**
	 * Add meta to have unique accent colors on pages and posts.
	 *
	 * @since Wei 1.0
	 *
	 * @return void
	 */
	function wei_register_meta() {

		// Use wei_accent_color_default filter to set a default for your site.
		// Use `is-{primary, secondary, tertiary, quarternary
		$default = apply_filters( 'wei_accent_color_default', 'is-primary-accent' );

		register_meta(
			'post',
			'wei_accentColor',
			array(
				'default'        => $default,
				'show_in_rest'   => true,
				'single'         => true,
				'type'           => 'string',
				'auth_callback'  => function() {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}

endif;

add_action( 'init', 'wei_register_meta' );

if ( ! function_exists( 'wei_accent_color_editor_assets' ) ) :

	/**
	 * Enqueue block editor scripts and styles scripts.
	 *
	 * @since Wei 1.0
	 *
	 * @return void
	 */
	function wei_accent_color_editor_assets() {

		wp_enqueue_style( 'wei-accent-color-styles', get_theme_file_uri( '/assets/css/accent-color.css' ), array(), null );
		wp_enqueue_script( 'wei-accent-color', get_theme_file_uri( '/assets/js/build/accent-color.js' ), array( 'wp-blocks' ), wp_get_theme()->get( 'Version' ), true );

	}

endif;

add_action( 'enqueue_block_editor_assets', 'wei_accent_color_editor_assets' );

if ( ! function_exists( 'wei_add_accent_body_class' ) ) :

	/**
	 * Add accent color class to the body.
	 */
	function wei_add_accent_body_class( $classes ) {
		global $post;

		if ( ! $post ) {
			return $classes;
		}

		if ( is_home() ) {
			return $classes;
		}

		$classes[] = get_post_meta( $post->ID, 'wei_accentColor', true );

		return $classes;
	}

endif;

add_filter( 'body_class', 'wei_add_accent_body_class' );

if ( ! function_exists( 'wei_add_accent_post_class' ) ) :

	/**
	 * Add accent color class to posts on the posts page.
	 */
	function wei_add_accent_post_class( $classes ) {

		global $post;

		if ( ! $post ) {
			return $classes;
		}

		$classes[] = get_post_meta( $post->ID, 'wei_accentColor', true );

		return $classes;

	}

endif;

add_filter( 'post_class', 'wei_add_accent_post_class' );

if ( ! function_exists( 'wei_add_accent_admin_body_class' ) ) :

	/**
	 * Add accent color class within the editor.
	 */
	function wei_add_accent_admin_body_class( $classes ) {
		global $post;

		if ( ! $post ) {
			return $classes;
		}

		$classes .= get_post_meta( $post->ID, 'wei_accentColor', true );

		return $classes;

	}

endif;

add_filter( 'admin_body_class', 'wei_add_accent_admin_body_class' );
