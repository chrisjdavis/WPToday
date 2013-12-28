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