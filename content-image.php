<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @package TwentyTwelvePlus
 *
 * @since Twenty Twelve Plus 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="<?php echo cuar_entry_class(); ?>">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twenty-twelve-plus' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<h1><?php the_title(); ?></h1>
				<h2><time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></h2>
			</a>
			<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twenty-twelve-plus' ) . '</span>', __( '1 Reply', 'twenty-twelve-plus' ), __( '% Replies', 'twenty-twelve-plus' ) ); ?>
			</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'twenty-twelve-plus' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
