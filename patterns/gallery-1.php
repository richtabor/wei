<?php
/**
 * Title:       Collage of three gallery images
 * Slug:        wei/gallery-1
 * Categories:  gallery, featured
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"1rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group alignwide"><!-- wp:columns {"isStackedOnMobile":false,"verticalAlignment":null,"align":"wide","style":{"spacing":{"blockGap":"1rem"}}} -->
<div class="wp-block-columns alignwide is-not-stacked-on-mobile"><!-- wp:column {"width":"66%"} -->
<div class="wp-block-column" style="flex-basis:66%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/image-1-square.jpg'; ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"33%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:33%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/image-2-square.jpg'; ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"isStackedOnMobile":false,"verticalAlignment":null,"align":"wide","style":{"spacing":{"blockGap":"0rem"}}} -->
<div class="wp-block-columns alignwide is-not-stacked-on-mobile"><!-- wp:column {"width":"32.25%"} -->
<div class="wp-block-column" style="flex-basis:32.25%"></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"33%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:33%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/image-3-square.jpg'; ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
