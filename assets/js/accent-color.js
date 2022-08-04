/**
 * WordPress dependencies
 */
import { registerPlugin } from '@wordpress/plugins';
import { PluginPostStatusInfo } from '@wordpress/editPost';
import { __ } from '@wordpress/i18n';
import { withSelect, withDispatch } from '@wordpress/data';
import { Icon, check } from '@wordpress/icons';
import {
        PanelRow,
        __experimentalToggleGroupControl as ToggleGroupControl,
        __experimentalToggleGroupControlOption as ToggleGroupControlOption } from '@wordpress/components';
import { compose } from '@wordpress/compose';
import { useCallback } from '@wordpress/element';
import { useSelect, useDispatch } from '@wordpress/data';

/**
 * usePostMeta
 *
 * Hook that allows you to easily consume and update Post Meta values
 *
 * @return {Object} meta values and setMetaValue function
 */
function usePostMeta( fieldName ) {
	const { editPost } = useDispatch('core/editor');
	const value = useSelect(
		(select) => select('core/editor').getEditedPostAttribute('meta')?.[fieldName],
		[fieldName],
	);
	const editValue = useCallback(
		(newValue) => {
			editPost({ meta: { [fieldName]: newValue } });
		},
		[editPost, fieldName],
	);
	return [value, editValue];
}

const WeiColors = ( { postType } ) => {

	// Only show this on post and page post types
	// if ( 'post' === postType || 'page' === postType ) {
	// 	return null;
	// }

	const [ color, setColor ] = usePostMeta( 'wei_accentColor' );

        const checkIcon = <Icon icon={ check } size={ 28 } />

	return(
		<PluginPostStatusInfo>
                        <PanelRow className="components-wei-accent-color-row">
                                <ToggleGroupControl
                                        value={ color }
                                        className="components-wei-accent-color"
                                        onChange={ ( newColor ) => {
                                                setColor( newColor );
                                                document.body.classList.remove('is-primary-accent','is-secondary-accent', 'is-tertiary-accent','is-quarternary-accent','is-quinary-accent','is-senary-accent','is-background-accent');
                                                document.body.classList.toggle( newColor );
                                        } }
                                        label={ __( 'Accent color' ) }
                                        isBlock
                                >
                                        <ToggleGroupControlOption
                                                className="is-primary-accent"
                                                value="is-primary-accent"
                                                label={ color == 'is-primary-accent' ? checkIcon : null }
                                        />
                                        <ToggleGroupControlOption
                                                className="is-secondary-accent"
                                                value="is-secondary-accent"
                                                label={ color == 'is-secondary-accent' ? checkIcon : null }
                                        />
                                        <ToggleGroupControlOption
                                                className="is-tertiary-accent"
                                                value="is-tertiary-accent"
                                                label={ color == 'is-tertiary-accent' ? checkIcon : null }
                                        />
                                        <ToggleGroupControlOption
                                                className="is-quarternary-accent"
                                                value="is-quarternary-accent"
                                                label={ color == 'is-quarternary-accent' ? checkIcon : null }
                                        />
                                </ToggleGroupControl>
                        </PanelRow>
		</PluginPostStatusInfo>
	);
}

const WeiColorswithSelect = compose( [
	withSelect( ( select ) => {
		return {
			postType: select( 'core/editor' ).getCurrentPostType(),
		};
	} ),
	withDispatch( ( dispatch ) => {
		const { editPost } = dispatch( 'core/editor' );
		return { editPost };
	} ),
] )( WeiColors );

registerPlugin( 'wei-colors', { render: WeiColorswithSelect } );
