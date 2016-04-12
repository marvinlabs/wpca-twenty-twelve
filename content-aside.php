<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package TwentyTwelvePlus
 *
 * @since Twenty Twelve Plus 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="aside">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<div class="<?php echo cuar_entry_class(); ?>">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twenty-twelve-plus' ) ); ?>
			</div><!-- .entry-content -->
		</div><!-- .aside -->

		<footer class="entry-meta">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twenty-twelve-plus' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo get_the_date(); ?></a>
			<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twenty-twelve-plus' ) . '</span>', __( '1 Reply', 'twenty-twelve-plus' ), __( '% Replies', 'twenty-twelve-plus' ) ); ?>
			</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'twenty-twelve-plus' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
