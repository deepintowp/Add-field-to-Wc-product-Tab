<?php 

class WCPD_fornt_end{
	private $_field_id;
	static  $_instance = null;
	
	private function __construct(){
		$this->_field_id = 'wcpd_product_video';
	}
	
	public static function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance = new WCPD_fornt_end();
		}
		
		return self::$_instance;
		
	}
	
	
	public function wcpd_show_video_below_product_image(){
		if(!is_product()){
			return;
		}
		if(get_post_meta(get_the_ID(), $this->_field_id, true)){
			echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.get_post_meta(get_the_ID(), $this->_field_id, true).'" frameborder="0" allowfullscreen></iframe>';
		}
	}
	
	
	
	
	
}