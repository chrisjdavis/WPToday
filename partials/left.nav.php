<div id="left-menu" class="col-md-2">
	<div class="panel panel-default" id="sidebar">
		<div class="panel-heading" style="background-color:#888;color:#fff;">Sections</div>
		<div class="panel-body">
			<ul id="sections" class="nav nav-stacked">
				<li><a data-url="<?php bloginfo('home'); ?>/category/plugins/" data-title="<?php echo strip_tags(category_description( get_category_by_slug('plugins')->term_id )); ?>" id="section-plugins" class="plugins active" href="#">Plugins</a></li>				
				<li><a data-url="<?php bloginfo('home'); ?>/category/themes/" data-title="<?php echo strip_tags(category_description( get_category_by_slug('themes')->term_id )); ?>" id="section-themes" class="themes" href="#">Themes</a></li>				
				<li><a data-url="<?php bloginfo('home'); ?>/category/buddypress/" data-title="<?php echo strip_tags(category_description( get_category_by_slug('buddypress')->term_id )); ?>" id="section-buddypress" class="buddypress" href="#">BuddyPress</a></li>
			</ul>
			<hr>
			<div id="quick_links" class="col col-span-12">
				<h4>Quick Links</h4>
				<ul>
					<li><a href="">Our Favorite Plugins</a></li>
					<li><a href="">Our Favorite Themes</a></li>
				</ul>
			</div>
			<hr>
			<div id="social" class="col col-span-12">
				<i class="icon-2x icon-facebook"></i>&nbsp;
				<i class="icon-2x icon-twitter"></i>&nbsp;
				<i class="icon-2x icon-linkedin"></i>&nbsp;
				<i class="icon-2x icon-pinterest"></i>
			</div>
		</div>
	</div>
</div>