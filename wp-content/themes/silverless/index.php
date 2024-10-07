<?php

get_header();

?>


<section class="container main-container">
	<div class="row col-10">
				<h2 class="heading-4 heading-alt"><?php the_title();?></h2>
<?php the_content();?>
	</div>
</section>


<?php get_footer(); ?>