<?php
if( $_SERVER['HTTP_X_REQUESTED_WITH'] ) {
	$cat = get_the_category();
	$next_post = get_next_post( $cat[0]->cat_ID );
	$previous_post = get_previous_post( $cat[0]->cat_ID );
	USACore::_set_post_views( $post->ID );
?>
<div class="next_previous">
	<?php if( $previous_post ) { ?>
	<a data-url="<?php echo get_permalink( $previous_post->ID ); ?>" data-title="<?php echo $previous_post->post_title; ?>" class="btn btn-default left post_link"><i class="icon-chevron-left"></i> &nbsp;<?php echo $previous_post->post_title; ?></a>
	<?php } ?>
	<?php if( $next_post ) { ?>
	<a data-url="<?php echo get_permalink( $next_post->ID ); ?>" data-title="<?php echo $next_post->post_title; ?>" class="btn btn-default right post_link"><?php echo $next_post->post_title; ?> &nbsp;<i class="icon-chevron-right"></i></a>
	<?php } ?>
</div>
<br><br>
<p><?php echo get_the_post_thumbnail($post->ID, 'image-full', array('class' => 'img-responsive')); ?></p>

<div class="tagline">
	<strong><?php echo get_the_author_meta( 'display_name', $post->post_author ); ?></strong> &mdash; <?php echo get_the_date(); ?> <span class="right"><?php echo USACore::_get_post_views( $post->ID ); ?></span>
</div>

<?php
	$url = get_permalink();
	$json = file_get_contents("http://api.sharedcount.com/?url=" . rawurlencode($url));
	$counts = json_decode($json, true);
?>				
<div class="social_stats">
	<div class="col-md-6 col stats">
		Social Stats: Post, Tweet, Comment.
	</div>
	<div class="col-md-2 col social">
		<a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(rtrim($url, '/')); ?>', '_blank', 'toolbar=no, scrollbars=yes, resizable=yes, width=480, height=400');return false;">
			<span class="shareFB"><i class="icon-facebook"></i> <?php echo $counts["Facebook"]["like_count"]; ?></span>
			<small>SHARE</small>
		</a>
	</div>
	<div class="col-md-2 col social">
		<a href="#" onclick="window.open('https://twitter.com/intent/tweet?original_referer=<?php echo rawurlencode(rtrim($url, '/')); ?>&text=<?php urlencode(the_title()); ?>&url=<?php echo rtrim($url, '/'); ?>', '_blank', 'toolbar=no, scrollbars=yes, resizable=yes, width=500, height=400');return false;">
			<span class="shareTW"><i class="icon-twitter"></i> <?php echo $counts["Twitter"]; ?></span>
			<small>TWEET</small>
		</a>
	</div>
	<div class="col-md-2 col social last">
		<a href="#comments">
			<span class="share_cmnts"><i class="icon-comment"></i> <?php echo get_comments_number(); ?></span>
			<small>COMMENT</small>
		</a>
	</div>
</div>
<div>
	<?php echo apply_filters( 'the_content', $post->post_content ); ?>
</div>
<hr>
<div id="comments">
	<?php comments_template(); ?>
</div>

<?php } else { ?>
	<?php get_header(); ?>
	<div class="container">
		<div class="no-gutter row">
			<?php get_template_part('partials/left.nav'); ?>
			<div id="new-content" class="col-md-3">
				<?php get_template_part('partials/mid.column'); ?>
			</div>
			<div id="top-stories" class="col-md-7" id="content">
				<?php get_template_part('partials/right.column'); ?>
			</div>
	   	</div>
	</div>
	<?php get_footer(); ?>
<?php } ?>