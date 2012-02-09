		<?php if (have_posts()) : ?>
		
			<ul data-role="listview" data-inset="true">
				<li data-role="list-divider">
					<?php echo _e( 'Search Results for: '.get_search_query() ) ?>
				</li>
				<?php while (have_posts()) : the_post(); ?> 
				<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
				 <?php endwhile; ?>
			</ul>
				


		<?php else: ?>
			<p>Nothing to display</p>
		<?php endif; ?>