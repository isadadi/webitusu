<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$event_id = get_the_ID();
?>

	<div id="main">

		<?php
		if (!is_active_sidebar('sidebar-left')) { $no_side_left = true; }
		$no_side_right = true;
		?>

		<div class="wrapper">

			<?php if (!isset($no_side_left)) { ?>
			<div class="column column-narrow">

				<?php dynamic_sidebar('Sidebar: Left Column'); ?>

				<div class="cleaner">&nbsp;</div>

			</div><!-- end .column .column-narrow -->
			<?php } ?>

			<div class="column <?php
			if (isset($no_side_left) && !isset($no_side_right)) {
				echo 'column-wide';
			} elseif (!isset($no_side_left) && isset($no_side_right)) {
				echo 'column-wide column-last';
			} elseif (isset($no_side_left) && isset($no_side_right)) {
				echo 'column-full column-last';
			} else {
				echo 'column-medium';
			} ?>">

				<div class="content-block widget-tribe-events">

					<div id="tribe-events-content" class="tribe-events-single vevent hentry">

						<div class="section-title">
							<a href="<?php echo tribe_get_events_link() ?>"> <?php _e( '&laquo; All Events', 'wpzoom' ) ?></a>
						</div>


						<?php while ( have_posts() ) :  the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<!-- Event featured image, but exclude link -->
								<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

								<div class="event_content">

									<!-- Notices -->
									<?php tribe_events_the_notices() ?>

									<?php the_title( '<h1 class="tribe-events-single-event-title summary entry-title post-title">', '</h1>' ); ?>

									<!-- Event header -->
									<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
										<!-- Navigation -->
										<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'wpzoom' ) ?></h3>
										<ul class="tribe-events-sub-nav">
											<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
											<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
										</ul>
										<!-- .tribe-events-sub-nav -->
									</div>
									<!-- #tribe-events-header -->


									<!-- Event Meta -->
									<?php do_action( 'tribe_events_before_the_meta' ) ?>
									<div class="tribe-event-meta vcard post-meta">
										<div class="author <?php if (isset($has_venue_address)) { echo $has_venue_address; } ?>">

											<!-- Schedule & Recurrence Details -->
											<div class="updated published time-details">
												<span class="event_meta_title"><?php _e('Date', 'wpzoom'); ?></span>
						 						<?php echo tribe_events_event_schedule_details( $event_id ); ?>
											</div>

											<?php if ( isset($venue_details) ) : ?>
												<!-- Venue Display Info -->
												<div class="tribe-events-venue-details">
													<span class="event_meta_title"><?php _e('Location', 'wpzoom'); ?></span>
													<?php echo implode( ', ', $venue_details ); ?>
												</div> <!-- .tribe-events-venue-details -->
											<?php endif; ?>


											<?php if ( tribe_get_cost() ) : ?>
												<div class="tribe-events-event-cost">
													<span class="event_meta_title"><?php _e('Price', 'wpzoom'); ?></span>
													<span><?php echo tribe_get_cost( null, true ); ?></span>
												</div>

											<?php endif; ?>

										</div>
									</div><!-- .tribe-events-event-meta -->
									<?php do_action( 'tribe_events_after_the_meta' ) ?>


								</div><!-- .event_content -->
								<div class="clear"></div>


								<!-- Event content -->
								<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
								<div class="tribe-events-single-event-description tribe-events-content entry-content description">
									<?php the_content(); ?>
								</div>
								<!-- .tribe-events-single-event-description -->
								<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>


								<!-- Event meta -->
								<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
								<?php
								/**
								 * The tribe_events_single_event_meta() function has been deprecated and has been
								 * left in place only to help customers with existing meta factory customizations
								 * to transition: if you are one of those users, please review the new meta templates
								 * and make the switch!
								 */
								if ( ! apply_filters( 'tribe_events_single_event_meta_legacy_mode', false ) ) {
									tribe_get_template_part( 'modules/meta' );
								} else {
									echo tribe_events_single_event_meta();
								}
								?>
								<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>

								<?php if ( get_post_type() == TribeEvents::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>


								<!-- Event footer -->
								<div id="tribe-events-footer">
									<!-- Navigation -->
									<!-- Navigation -->
									<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'wpzoom' ) ?></h3>
									<ul class="tribe-events-sub-nav">
										<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
										<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
									</ul>
									<!-- .tribe-events-sub-nav -->
								</div><!-- #tribe-events-footer -->

							</div> <!-- #post-x -->

						<?php endwhile; ?>

					</div><!-- #tribe-events-content -->

				</div><!-- .content-block .widget-tribe-events -->

				<div class="cleaner">&nbsp;</div>

			</div><!-- end .column .column-medium -->

			<div class="cleaner">&nbsp;</div>

		</div><!-- end .wrapper -->

	</div><!-- end #main -->
