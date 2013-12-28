<div class="panel" id="midCol">
	<div class="panel-heading" style="background-color:#555;color:#eee;">New Stories</div> 
	<div class="panel-body">
		<?php if ( have_posts() ) : $i = 0; ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php $i++; ?>
				<?php if( $i == 1 ) { ?>
				<?php echo get_the_post_thumbnail($post->ID, array(300,300), array('class' => 'img-responsive featured')); ?>
				<div class="well">
					<h3><a class="post_link" data-toggle="modal" data-target="#myModal" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" href="#"><?php the_title(); ?></a></h3>
					<p><?php echo USACore::_limit_words( $post->post_content, 50 ); ?></p>
				</div>				
				<?php } else { ?>
				<div class="media">
					<a class="pull-left post_link" data-toggle="modal" data-target="#myModal" data-url="<?php the_permalink(); ?>" href="#" data-title="<?php the_title(); ?>">
						<?php echo get_the_post_thumbnail($post->ID, array(80,80), array('class' => 'media-object')); ?>
					</a>
					<div class="media-body">
						<h5 class="media-heading"><a class="post_link" data-toggle="modal" data-target="#myModal" data-url="<?php the_permalink(); ?>" href="#" data-title="<?php the_title(); ?>"><strong><?php the_title(); ?></strong></a></h5>
							<small><?php echo USACore::_limit_words( $post->post_content, 50 ); ?></small>
							<p><span class="badge"><a href="<?php the_permalink(); ?>"><?php echo get_comments_number(); ?></a></span></p>
						</div>
						<hr>
					</div>
				<?php } ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>