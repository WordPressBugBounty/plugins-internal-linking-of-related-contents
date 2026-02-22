<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* SETTINGS */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('ilrc_setting')) {

	function ilrc_setting($id, $default = '' ) {

		$settings = get_option('ilrc_settings');

		if(isset($settings[$id]) && !empty($settings[$id])):

			return $settings[$id];

		else:

			return $default;

		endif;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Get post meta */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('ilrc_postmeta')) {

	function ilrc_postmeta( $id, $default = '' ) {
	
		global $post, $wp_query;
		
		$content_ID = 0;

		if ( isset( $post ) && is_object( $post ) && isset( $post->ID ) ) {
			$content_ID = $post->ID;
		} elseif (
			isset( $wp_query ) &&
			is_object( $wp_query ) &&
			isset( $wp_query->post ) &&
			is_object( $wp_query->post ) &&
			isset( $wp_query->post->ID )
		) {
			$content_ID = $wp_query->post->ID;
		} elseif ( function_exists( 'get_queried_object_id' ) ) {
			$content_ID = get_queried_object_id();
		}

		if ( empty( $content_ID ) ) {
			return $default;
		}

		$val = get_post_meta( $content_ID , $id, TRUE);
		
		if ( !empty($val) ) :
			
			return $val;
			
		else:
				
			return $default;
			
		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* Get categories markup */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'ilrc_get_categories_markup' ) ) {

	function ilrc_get_categories_markup( $categories, $args = array() ) {

		if ( empty( $categories ) || is_wp_error( $categories ) || ! is_array( $categories ) ) {
			return '';
		}

		$args = wp_parse_args(
			$args,
			array(
				'linkable'        => false,
				'item_class'      => '',
				'separator'       => '',
				'separator_class' => '',
			)
		);

		$items_markup = array();

		foreach ( $categories as $cat ) {

			if ( empty( $cat->name ) ) {
				continue;
			}

			$item_class_attr = ! empty( $args['item_class'] ) ? ' class="' . esc_attr( $args['item_class'] ) . '"' : '';

			if ( ! empty( $args['linkable'] ) ) {

				$category_link = get_category_link( $cat->term_id );

				if ( empty( $category_link ) || is_wp_error( $category_link ) ) {
					continue;
				}

				$items_markup[] = '<a' . $item_class_attr . ' href="' . esc_url( $category_link ) . '">' . esc_html( $cat->name ) . '</a>';

			} else {

				$items_markup[] = '<span' . $item_class_attr . '>' . esc_html( $cat->name ) . '</span>';

			}
		}

		if ( empty( $items_markup ) ) {
			return '';
		}

		if ( empty( $args['separator'] ) ) {
			return implode( '', $items_markup );
		}

		$separator_class_attr = ! empty( $args['separator_class'] ) ? ' class="' . esc_attr( $args['separator_class'] ) . '"' : '';
		$separator_markup = '<span' . $separator_class_attr . '>' . wp_kses_post( $args['separator'] ) . '</span>';

		return implode( $separator_markup, $items_markup );
	}

}

?>