<?php

get_header();

?>

<?php

if (have_rows('flex_content')):
	while (have_rows('flex_content')):
		the_row();
		$row_layout = get_row_layout();
		$row_layout = str_replace('_', '-', $row_layout);
		get_template_part("template-parts/$row_layout/$row_layout");
	endwhile;
endif;

?>
<?php the_content();?>

<?php get_footer(); ?>