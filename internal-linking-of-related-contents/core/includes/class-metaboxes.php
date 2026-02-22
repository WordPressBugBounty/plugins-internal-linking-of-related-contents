<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

if( !class_exists( 'ilrc_metaboxes' ) ) {

	class ilrc_metaboxes {
	   
		public $posttype;
		public $metaboxes_fields;
	   
		public function __construct( $posttype, $fields = array() ) {
	
			$this->posttype = $posttype;
			$this->metaboxes_fields = $fields;

			add_action('admin_init', array(&$this, 'add_script') ,11);
			add_action('add_meta_boxes', array( &$this, 'new_metaboxes' ) ); 
			add_action('save_post', array( &$this, 'ilrc_metaboxes_save' ), 10, 2 );
		
		}

		/**
		 * Loads the plugin scripts and styles
		 */

		public function add_script() {

			global $wp_version, $pagenow;

			$file_dir = plugins_url('/assets/', dirname(__FILE__));
			 
			if ( 
			 	$pagenow == 'post.php' || 
				$pagenow == 'post-new.php'
			) {

				wp_enqueue_style ('ilrc_panel_switch', $file_dir.'css/switch.css' );
				wp_enqueue_style ('ilrc_meta_boxes_style', $file_dir . 'css/metaboxes.css' );

			}

		}

		public function new_metaboxes() {
	
			$posttype = $this->posttype ;
			
			add_meta_box(
				'ilrc_meta_box',
				esc_attr__('Internal Linking of Related Contents','internal-linking-of-related-contents'),
				array( &$this, 'metaboxes_panel' ),
				$posttype,
				'normal',
				'default'
			);
		
		}
		
		public function metaboxes_panel() {
	
			$metaboxes_fields = $this->metaboxes_fields ;
	
			global $post, $post_id;
			
			$posttype = $this->posttype ;

			wp_nonce_field( 'ilrc_metaboxes_save_action', 'ilrc_metaboxes_nonce' );

			foreach ($metaboxes_fields as $value) {
			
				switch ( $value['type'] ) {

					case 'switch':
					
				?>
    
                        <div class="ilrc_metabox_container ilrc_inputbox ilrc_checkbox">
                            
                            <div class="input-left">
                            
                                <label for="<?php echo esc_attr($value['id']); ?>"><?php echo esc_html($value['label']); ?></label>
                            
                            </div>
                            
                            <div class="input-right">

                                <input <?php echo (ilrc_postmeta($value['id']) == TRUE) ? 'checked' : '';?> class="on-off" type="checkbox" name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" >
                                <div class="switch-container"><span class="switch"></span></div>

								<span class="ilrc_metabox_description"><?php echo esc_html($value['description']); ?></span>

                            </div>
                            
                            <div class="clear"></div>
                        
                        </div>

				<?php
					
					break;

				}
			
			}
	
		}
		
		public function ilrc_metaboxes_save( $post_id, $post ) {

			if (
				!isset($_POST['ilrc_metaboxes_nonce']) ||
				!wp_verify_nonce(
					sanitize_text_field(wp_unslash($_POST['ilrc_metaboxes_nonce'])),
					'ilrc_metaboxes_save_action'
				)
			) {
				return;
			}

			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
				return;
			}

			if ( wp_is_post_revision($post_id) || wp_is_post_autosave($post_id) ) {
				return;
			}

			if ( !current_user_can('edit_post', $post_id) ) {
				return;
			}

			if ( !isset($post->post_type) || $post->post_type !== $this->posttype ) {
				return;
			}
				
			$metaboxes_fields = $this->metaboxes_fields ;
		
			foreach ($metaboxes_fields as $field ) {
					
				if ( isset($field['id']) && isset($field['type']) ) {

					switch ( $field['type'] ) {

                        case 'switch': 

							$value = ( isset($_POST[$field['id']]) ) ? true : false;
							update_post_meta($post_id, $field['id'], $value );

						break;

					}
							
				}
					
			}
				
		}
				
	}

}

?>
