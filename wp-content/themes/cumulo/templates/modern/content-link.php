<article id="post-<?php the_ID(); ?>" <?php post_class( "cmo-post-in-list" ); ?>>
	<div class="cmo-article-featured-wrapper">
		<div class="cmo-article-stretcher">
			<?php $cmo_first_anchor = cmo_extract_first_anchor( get_the_content() );
			if ( $cmo_first_anchor ) { ?>
			<div class="cmo-article-link-wrapper">
				<div class="cmo-article-link-title"><?php echo cmo_do_kses( $cmo_first_anchor[0] ) ?></div>
				<div class="cmo-article-icon"><i class="fa fa-link"></i></div>
			</div>
			<div class="cmo-article-link-href"><?php echo esc_url( $cmo_first_anchor[1] ) ?></div>
			<?php } ?>
		</div>
	</div>
	<div class="cmo-article-contents">
		<div class="cmo-article-meta-wrapper">
			<h2><a href="<?php echo get_permalink( get_the_ID() ) ?>"><?php the_title(); ?></a></h2>

			<a class="cmo-article-meta-date" href="<?php echo get_permalink( get_the_ID() ) ?>">
				<i class="et-line icon-calendar"></i> Posted at
				<time datetime="<?php the_time("c"); ?>">
					<span class="time-day"><?php the_time("j"); ?></span>
					<span class="time-month"><?php the_time("M"); ?></span>
				</time>
			</a>
			<div class="cmo-article-meta-author">
				<i class="et-line icon-profile-male"></i> Written by <?php the_author_posts_link() ?>
			</div>
			<div class="cmo-article-meta-tags">
				<i class="et-line icon-ribbon"></i> Tagged As <?php cmo_the_tags() ?>
			</div>
		</div>
		<div class="cmo-article-excerpt">
			<?php
				the_excerpt();
			?>
		</div>
	</div>
</article>