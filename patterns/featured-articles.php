<?php
/**
 * Title: Featured Articles - Add the most recent post assigned the 'Featured' label
 * Slug: blockhaus/featured-articles
 * Categories: featured 
 * Description: Adds the most recent post assigned the 'Featured' label
 */
?>

<!-- wp:query {"queryId":0,"query":{"perPage":"2","pages":"2","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":{"category":[],"label":[9]}},"tagName":"section","align":"full","className":"space-y-6","layout":{"type":"default"}} -->
<section class="wp-block-query alignfull space-y-6"><!-- wp:heading {"style":{"typography":{"textDecoration":"underline"}},"className":"col-span-full font-black text-default"} -->
<h2 class="wp-block-heading col-span-full font-black text-default" style="text-decoration:underline">Featured articles</h2>
<!-- /wp:heading -->

<!-- wp:post-template {"className":"grid grid-cols-fit gap-12","layout":{"type":"default","columnCount":2}} -->
<!-- wp:group {"style":{"spacing":{}},"className":"flex flex-col h-full space-y-6","layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group flex flex-col h-full space-y-6"><!-- wp:post-featured-image {"sizeSlug":"landscape"} /-->

<!-- wp:group {"style":{"spacing":{}},"className":"space-y-6","layout":{"type":"default"}} -->
<div class="wp-block-group space-y-6"><!-- wp:post-title {"level":3,"className":"font-black","fontSize":"large"} /-->

<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:post-excerpt {"showMoreOnNewLine":false} /-->

<!-- wp:read-more {"content":"View article","className":"rounded-md text-sm inline-block w-fit bg-contrast text-white px-6 py-2 hover:ring-2 hover:ring-offset-2 focus:ring-2 focus:ring-offset-2 hover:ring-contrast ring-offset-base focus:ring-contrast"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></section>
<!-- /wp:query -->