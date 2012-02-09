		<?php if (have_posts()) : ?>
		
			<ul data-role="listview" data-inset="true">
				<li data-role="list-divider">
					<?php if ( is_day() ) : ?>
						<?php printf( __( 'Daily Archives: %s' ), '<span>' . get_the_date() . '</span>' ); ?>
					<?php elseif ( is_month() ) : ?>
						<?php printf( __( 'Monthly Archives: %s'), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
					<?php elseif ( is_year() ) : ?>
						<?php printf( __( 'Yearly Archives: %s'), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
					<?php else : ?>
						<?php _e( 'Blog Archives' ); ?>
					<?php endif; ?>
				</li>
				<?php while (have_posts()) : the_post(); ?> 
				<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
				 <?php endwhile; ?>
			</ul>
				


		<?php else: ?>
			<p>Nothing to display</p>
		<?php endif; ?>