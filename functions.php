<?php
/**
 * Wei functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wei
 * @since Wei 1.0
 */

if ( ! function_exists( 'wei_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Wei 1.0
	 *
	 * @return void
	 */
	function wei_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'wei_support' );

if ( ! function_exists( 'wei_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Wei 1.0
	 *
	 * @return void
	 */
	function wei_styles() {
		$theme_version  = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;

		// Register main stylesheet.
		wp_register_style(
			'wei-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue main stylesheet.
		wp_enqueue_style( 'wei-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'wei_styles' );

if ( ! function_exists( 'wei_block_styles' ) ) :
	/**
	 * Enqueue block style scripts.
	 *
	 * @since Wei 1.0
	 *
	 * @return void
	 */
	function wei_block_styles() {
		$theme_version  = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;

		wp_enqueue_script(
			'wei-block-styles',
			get_theme_file_uri( '/assets/js/block-styles.js' ),
			array( 'wp-blocks' ),
			$theme_version,
			true
		);

	}

endif;

add_action( 'enqueue_block_editor_assets', 'wei_block_styles' );

if ( ! function_exists( 'wei_inline_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since Wei 1.0
	 *
	 * @return void
	 */
	function wei_inline_editor_styles() {

		// Add editor styles inline.
		wp_add_inline_style( 'wp-block-library', wei_editor_styles() );
		wp_add_inline_style( 'wp-block-library', wei_accent_colors() );
	}

endif;

add_action( 'admin_init', 'wei_inline_editor_styles' );

if ( ! function_exists( 'wei_accent_colors' ) ) :

	/**
	 * Set accent color variables.
	 * Called by functions wei_styles() and wei_inline_editor_styles() above.
	 *
	 * @since Wei 1.0
	 *
	 * @return string
	 */
	function wei_accent_colors() {

		return '
		.is-secondary-accent .editor-styles-wrapper {
			--wp--custom--color--background: var(--wp--preset--color--secondary, var(--wp--preset--color--primary) );
			--wp--preset--color--foreground: var(--wp--preset--color--foreground-secondary);
		}

		.is-tertiary-accent .editor-styles-wrapper {
			--wp--custom--color--background: var(--wp--preset--color--tertiary, var(--wp--preset--color--primary) );
			--wp--preset--color--foreground: var(--wp--preset--color--foreground-tertiary);
		}

		.is-quarternary-accent .editor-styles-wrapper {
			--wp--custom--color--background: var(--wp--preset--color--quarternary, var(--wp--preset--color--primary) );
			--wp--preset--color--foreground: var(--wp--preset--color--foreground-quarternary);
		}
		';

	}

endif;

if ( ! function_exists( 'wei_editor_styles' ) ) :

	/**
	 * Get editor styles.
	 * Called by function wei_inline_editor_styles() above.
	 *
	 * @since Wei 1.0
	 *
	 * @return string
	 */
	function wei_editor_styles() {

		$palette = wp_get_global_settings( array( 'layout', 'wideSize' ) );

		return "

                .post-type-post:not(.is-iceberg) .edit-post-visual-editor__post-title-wrapper > *,
		.post-type-page:not(.is-iceberg) .edit-post-visual-editor__post-title-wrapper > * {
                        max-width: $palette !important;
			text-align: center;
                }

		.post-type-post:not(.is-iceberg) .edit-post-visual-editor__post-title-wrapper,
		.post-type-page:not(.is-iceberg) .edit-post-visual-editor__post-title-wrapper {
                        padding-bottom: calc( 2 * var(--wp--custom--spacing--small));
                        padding-top:calc( 2 * var(--wp--custom--spacing--small));
                        margin-bottom: 3.5rem !important;
                }

		.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > p + h1,
		.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > p + h2,
		.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > p + h3,
		.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > p + h4 {
			margin-top: var(--wp--custom--spacing--medium, 6rem) !important;
		}
		";

	}

endif;

if ( ! function_exists( 'wei_register_block_pattern_categories' ) ) :

	/**
	 * Registers block patterns and categories.
	 *
	 * @since Wei 1.0
	 *
	 * @return void
	 */
	function wei_register_block_pattern_categories() {
		$block_pattern_categories = array(
			'footer' => array( 'label' => __( 'Footers', 'wei' ) ),
			'header' => array( 'label' => __( 'Headers', 'wei' ) ),
			'query'  => array( 'label' => __( 'Query', 'wei' ) ),
		);

		/**
		 * Filters the theme block pattern categories.
		 *
		 * @since Wei 1.0
		 *
		 * @param array[] $block_pattern_categories {
		 *     An associative array of block pattern categories, keyed by category name.
		 *
		 *     @type array[] $properties {
		 *         An array of block category properties.
		 *
		 *         @type string $label A human-readable label for the pattern category.
		 *     }
		 * }
		 */
		$block_pattern_categories = apply_filters( 'wei_block_pattern_categories', $block_pattern_categories );

		foreach ( $block_pattern_categories as $name => $properties ) {

			if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
				register_block_pattern_category( $name, $properties );
			}
		}
	}

endif;

add_action( 'init', 'wei_register_block_pattern_categories', 9 );

// Add accent color functionality
require get_template_directory() . '/inc/accent-color.php';
