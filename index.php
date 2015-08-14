<?php
/*
Plugin Name: Extend Post Data
Plugin URI: https://github.com/mhmli/mhm-extend-postdata
Description: Automatically extends Post and Page data with an array containing all of the extra meta data pertinent to the $post object.
Author: Mark Howells-Mead
Version: 1.0
Author URI: http://permanenttourist.ch/
*/

class MHM_ExtendPostdata {
	
	var $key = '';
	
	function dump($var,$die=false){
		echo '<pre>' .print_r($var,1). '</pre>';
		if($die){die();}
	}//dump

	//////////////////////////////////////////////////

	public function __construct(){
		$this->key = basename(__DIR__);
		add_action( 'the_post', array(&$this, 'extend_postdata') );
	}

	//////////////////////////////////////////////////
	
	public function extend_postdata($post) {
		if( $post ){
			$post->metadata = get_post_meta ( $post->ID );
		}
	}

}

new MHM_ExtendPostdata();
