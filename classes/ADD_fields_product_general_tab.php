<?php 


class ADD_fields_product_general_tab{
	private $_field_id;
	static  $_instance = null;
	
	private function __construct(){
		$this->_field_id = 'wcpd_product_video';
	}
	
	
	public static function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance = new ADD_fields_product_general_tab();
		}
		
		return self::$_instance;
		
	}
	
	public  function wcpd_add_field_to_product_field(){
	$args = array(
			'id'=> $this->_field_id,
			'class'=>'wcpd-video-field',
			'placeholder'=>'Add youtube video id',
			'label'=>'Add video to product.',
	
			);
	
	
	woocommerce_wp_text_input($args);
	
	
	}
	
	public  function wcpd_save_field_to_product_field($post_id){
	if(!isset($_POST[$this->_field_id])){return;}
	if(empty($_POST[$this->_field_id])){return;}
	
	update_post_meta($post_id, $this->_field_id, sanitize_text_field($_POST[$this->_field_id]) );
	
	}
	
}