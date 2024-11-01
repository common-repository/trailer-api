<?php
/*
Plugin Name: Trailer API
Plugin URI: http://www.trailerapi.com/
Description: Based on the post name this plugin will add a suitable trailer.
Version: 1.0
Author: Richard Künzi
Author URI: http://www.trailerapi.com/
*/

function WP_Trailer_API($content) {

    global $post;
    $post_title = get_the_title($post->ID);


 if(is_single()){

	$trailer = file_get_contents("http://www.trailerapi.com/t/$post_title");

 	if($trailer == "none"){
	   echo"Sorry no movie found.";
	 }
	 else{
	   // If you dont want the trailer centered change the following line to "return$trailer;".
	   $content .= "<center>".$trailer."</center>";
	 }
 }
	return$content;
}

add_filter('the_content', 'WP_Trailer_API', 40);
?>
