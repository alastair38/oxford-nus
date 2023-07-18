<?php
/**
 * Title: Hero - Add the most recent post assigned the 'Front Page' label
 * Slug: blockhaus/hero
 * Categories: featured 
 * Description: Adds the most recent post assigned the 'Front Page' label
 */
?>

<!-- wp:query {"queryId":0,"query":{"perPage":"1","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":{"label":[10]}},"tagName":"section","displayLayout":{"type":"list","columns":2},"align":"full","className":"blockhaus-hero","layout":{"type":"default"}} -->
<section class="wp-block-query alignfull blockhaus-hero"><!-- wp:post-template -->
<!-- wp:group {"className":"grid grid-cols-2 bg-primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group grid grid-cols-2 bg-primary"><!-- wp:post-featured-image {"sizeSlug":"hero","className":"aspect-hero"} /-->

<!-- wp:group {"style":{"spacing":{}},"className":"flex h-full items-center","layout":{"type":"constrained"}} -->
<div class="wp-block-group flex h-full items-center"><!-- wp:group {"style":{"spacing":{}},"className":"p-6 md:p-12 flex-1","layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group p-6 md:p-12 flex-1"><!-- wp:post-title {"style":{"typography":{"fontStyle":"normal","fontWeight":"900","lineHeight":"1"}},"className":"font-black","fontSize":"huge"} /-->

<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:post-excerpt {"showMoreOnNewLine":false} /-->

<!-- wp:read-more {"content":"View article","className":"rounded-md text-sm inline-block w-fit bg-contrast text-white px-6 py-2 hover:ring-2 hover:ring-offset-2 focus:ring-2 focus:ring-offset-2 hover:ring-contrast ring-offset-primary focus:ring-contrast"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></section>
<!-- /wp:query -->