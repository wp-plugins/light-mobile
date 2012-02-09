		<?php if (have_posts()) : ?>
		   <?php while (have_posts()) : the_post(); ?> 
			<ul data-role="listview" data-theme="c" data-dividertheme="d">
				<li data-role="list-divider"><?php the_title() ?></li>		   
			</ul>
			<p><?php the_content(); ?></p>
		   <?php endwhile; ?>
		<?php else: ?>
			<p>Nothing to display</p>
		<?php endif; ?>