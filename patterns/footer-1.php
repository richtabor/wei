<?php
/**
 * Title:          Footer #1
 * Slug:           wei/footer-1
 * Categories:     footer
 * Viewport Width: 900
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dsmall)","bottom":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dsmall)"}},"border":{"top":{"color":"var:preset|color|foreground","style":"solid","width":"1px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignfull"
	style="border-top-color:var(--wp--preset--color--foreground);border-top-style:solid;border-top-width:1px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;padding-top:var(--wp--custom--spacing--small);padding-bottom:var(--wp--custom--spacing--small)">
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false}} -->
	<div class="wp-block-group">
		<!-- wp:site-title /-->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9rem"}},"textColor":"foreground-alt"} -->
		<p class="has-foreground-alt-color has-text-color" style="font-size:0.9rem">
			<?php esc_html_e( 'Powered by', 'wei' ); ?> <a href="https://wordpress.org" rel="nofollow">WordPress</a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"right"}} -->
	<div class="wp-block-group">
		<!-- wp:social-links {"size":"has-normal-icon-size","className":"is-style-logos-only","layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","justifyContent":"center"},"style":{"spacing":{"blockGap":{"top":"1rem","left":"1rem"}}}} -->
		<ul class="wp-block-social-links has-normal-icon-size is-style-logos-only">
			<!-- wp:social-link {"url":"#","service":"twitter"} /-->

			<!-- wp:social-link {"url":"#","service":"instagram"} /-->
		</ul>
		<!-- /wp:social-links -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
