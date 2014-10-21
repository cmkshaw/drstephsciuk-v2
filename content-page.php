<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Page thumbnail and title.
		twentyfourteen_post_thumbnail();
		the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
	?>

	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
<ul class="footer_social">
		<li><a class="facebook" href="https://www.facebook.com/StephanieSciuk"><span class="hide">Facebook</span></a></li>
		<li><a class="twitter" href="https://twitter.com/stephsciuk"><span class="hide">Twitter</span></a></li>
		<li><a class="linkedin" href="http://www.linkedin.com/pub/stephanie-sciuk/43/ab9/3a"><span class="hide">Linkedin</span></a></li>
	</ul>
