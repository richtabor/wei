wp.domReady( () => {
	wp.blocks.registerBlockStyle(
		'core/query-pagination', {
			name: 'buttons',
			label: 'Buttons',
		}
	);
	wp.blocks.registerBlockStyle(
		'core/post-terms', {
			name: 'buttons',
			label: 'Buttons',
		}
	);
	wp.blocks.registerBlockStyle(
		'core/button', {
			name: 'transparent',
			label: 'Transparent',
		}
	);
} );
