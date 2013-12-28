<?php
$cat = get_category_by_slug( 'plugins' )->term_id;
$args = array( 'posts_per_page' => 10, 'meta_key' => 'post_views_count', 'orderby' => 'post_views_count', 'order' => 'DESC', 'cat' => $cat );
?>
<div class="panel">
	<div class="panel-heading" style="background-color:#111;color:#fff;">Top Stories</div>   
	<div class="panel-body">
<?php
	$loop = new WP_Query( $args ); $i = 0;
	while ( $loop->have_posts() ) : $loop->the_post();
	$i++;
?>
	<?php if( $i == 1 ) { ?>
		<div class="row">				
			<div class="col-md-8">
				<h2><?php the_title(); ?></h2>
				<?php the_excerpt(); ?>
				<button data-toggle="modal" data-target="#myModal" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" class="post_link btn btn-default">More</button>
			</div>
			<div id="featured_image" class="col col-sm-4">
				<?php echo get_the_post_thumbnail($post->ID, 'image-full', array('class' => 'img-responsive')); ?>
			</div> 
		</div>
		<hr>
	<?php } elseif( $i == 3 ) { ?>
		<div class="row">
			<div class="col-md-6">
				<a class="post_link" data-toggle="modal" data-target="#myModal" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" href="#"><?php echo get_the_post_thumbnail($post->ID, 'image-full', array('class' => 'img-responsive featured')); ?></a>
			</div> 
			<div class="col-md-6">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<hr>
	<?php } else { ?>
		<h2><?php the_title(); ?></h2>
		<?php echo get_the_post_thumbnail($post->ID, array(100,100), array('class' => 'img-responsive pull-right in-post')); ?>
		<?php the_excerpt(); ?>
		<button data-toggle="modal" data-target="#myModal" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" class="post_link btn btn-default">More</button>
		<hr>
	<?php } ?>
<?php endwhile; ?>
	<h4 class="related_header">Other News</h4>
	<?php
		$args = array( 'posts_per_page' => 5, 'category__not_in' => $cat, 'post__not_in' => array($post->ID) );
		$loop = new WP_Query( $args ); $i = 0;
		while ( $loop->have_posts() ) : $loop->the_post();
		$i++;
	?>
	<div class="col-md-6 related">
		<div class="col-md-4">
			<a class="post_link" data-toggle="modal" data-target="#myModal" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" href="#">
				<?php the_post_thumbnail( array(150,100) ); ?>
			</a>
		</div>
		<div class="col-md-8">		
			<a class="post_link" data-toggle="modal" data-target="#myModal" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" href="#">
				<h4><?php the_title(); ?></h4>
			</a>
		</div>
	</div>
	<?php if( $i%2 == 0 ) { ?>
		<hr class="related_sep">
	<?php } ?>
	<?php
	endwhile;
	wp_reset_query();
	?>
</div>
</div>