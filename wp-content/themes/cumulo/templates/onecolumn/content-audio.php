<article id="post-<?php the_ID(); ?>" <?php post_class( "cmo-post-in-list" ); ?>>
	<div class="cmo-article-featured-wrapper">
	<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} 
	?>
	<?php 
	$video_source = get_post_meta( get_the_ID(), "cmo_video_source", true );
	$cmo_audiourl = "";
	if ( $video_source == "file" ) {
		$cmo_audiourl = get_post_meta( get_the_ID(), "cmo_video_file", true );
	}
	else {
		$cmo_audiourl = cmo_get_src_from_embed ( get_post_meta( get_the_ID(), "cmo_video", true ) );
	}

	if ( !empty($cmo_audiourl) ) { 
	?>
	<div class="audio-wrapper">
		<?php if ( $video_source == "file" ) {
			if ( preg_match( '/.mp3$/', $cmo_audiourl ) ) {
				echo do_shortcode( "[audio mp3=\"$cmo_audiourl\"][/audio]" );
			}
			else if ( preg_match( '/.ogg$/', $cmo_audiourl ) ) {
				echo do_shortcode( "[audio ogg=\"$cmo_audiourl\"][/audio]" );
			}
			else if ( preg_match( '/.wma$/', $cmo_audiourl ) ) {
				echo do_shortcode( "[audio wma=\"$cmo_audiourl\"][/audio]" );
			}
			else if ( preg_match( '/.wav$/', $cmo_audiourl ) ) {
				echo do_shortcode( "[audio wav=\"$cmo_audiourl\"][/audio]" );
			}
		} else { ?>
			<iframe src="<?php echo esc_url( $cmo_audiourl ); ?>" ></iframe>
		<?php } ?>
	</div>
	<?php } ?>

	</div>
	<div class="cmo-article-contents">
		<div class="cmo-article-meta-wrapper">
			<a class="cmo-article-meta-date" href="<?php echo get_permalink( get_the_ID() ) ?>">
				<time datetime="<?php the_time("c"); ?>">
					<span class="time-day"><?php the_time("j"); ?></span>
					<span class="time-month"><?php the_time("M"); ?></span>
				</time>
			</a>

			<h2><a href="<?php echo get_permalink( get_the_ID() ) ?>"><?php the_title(); ?></a></h2>

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
