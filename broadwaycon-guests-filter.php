<?php 

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 *
   Template Name:  SpecialGuests
 *
 * @file           BWC_special_guests.php

 */


 get_header(); ?>


<div class="container">
		
		<div id="featured-inside" class="row">

		</div>
	</div>
	
</div>

<div class="row wr">
   <div class="container next-slide">
<div class="col-sm-12">
<h3>BROADWAYCON 2017 SPECIAL GUESTS</h3>
</div>
<?php while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<div class="col-sm-12">
<select name="guestType" id="guestType">
<option value="all">All</option>
  <option value="performers">Performers</option>
  <option value="creativeproductionteams">Creative/Production Teams</option>
  <option value="writers">Writers</option>
  <option value="administrators">Administrators</option>
</select>
<div id="myselect">
</div>
</div>
<div class="col-sm-12" id="parent">
<?PHP 
//Check if there is a replacement category
//If yes, put into category
//If not, keep original one
if( has_action( 'ftrdpsts_featured_posts' ) ) { do_action( 'ftrdpsts_featured_posts' ); } 
$args = array( 'posts_per_page' => 150, 'post_type' => 'featuredguests' );
//$args = array( 'posts_per_page' => 150, 'category' => 2 );

$myposts = get_posts( $args );
$i = 1;
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<?php
foreach((get_the_category()) as $category) { 
    $catname = $category->cat_name; 
} 
?>
<?php $type = get_post_meta($post->ID, "type", true);
$type = str_replace(","," ",$type);
$type = strtolower($type); ?>

<!--<?php if ($i == 9){ ?>
<a href="/register">
<span class="guest-box col-sm-2 col-xs-6" style="padding-top:25px;">
<img src="/wp-content/uploads/2015/12/BC16_BuyTickets_promo.jpg"/>
</span>
</a>
<?php } ?>-->

<!--<?php if ($i == 17){ ?>
<a href="/marketplace">
<span class="guest-box col-sm-2 col-xs-6" style="padding-top:25px;">
<img src="/wp-content/themes/BroadwayCon/bwc_images/BC_Vendors_Promo.jpg"/>
</span>
</a>
<?php } ?>-->




<?php echo "<span class='square_headshot col-sm-2 col-xs-6 $type' id='$catname'>" ?>
<img src="<?php echo $feat_image;?>"/>
<h5><?php the_title(); ?></h5>
<p><?php echo get_post_meta($post->ID, "known_for", true); ?></p>
<div class="guest-bio"><?php the_content(); ?></div>
</span>
<?php $i++;
	 endforeach; 
wp_reset_postdata();?>

<span class="square_headshot">
</span>
   </div>

   </div>
 


</div>	
	


		<?php endwhile; ?>
<script type="text/javascript">

 function newList()
{
	
	var x = document.getElementById("guestType").value;
	
} 

/* onload = function()
{
	var idx, foo = document.getElementById('guestType');
	foo.selectedIndex = (idx = self.name.split('fooidx')) ?	idx[1] : 0;
	alert(foo.selectedIndex);
} */

</script>

	
	<?php get_footer(); ?>