<?php

if (!function_exists('ilrc_function')) {

	function ilrc_function($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'postid' => '',
			'template' => 'template-2',
			'posttitle' => '',
			'url' => '',
			'target' => '',
			'rel' => '',
			'cta' => esc_html__( 'Read more', 'internal-linking-of-related-contents')
		), $atts));

			$output = '';

			$relatedPost = get_post($postid);
			
			$title = ($posttitle) ? $posttitle : $relatedPost->post_title;
			$links = ($url) ? $url : get_permalink($postid);
			
			$target = ($target == '_blank') ? 'target="_blank" ' : '';
			$rel = ($rel == 'nofollow') ? 'rel="nofollow" ' : '';

			$templateArray = array('template-1','template-2','template-3','template-11','template-12','template-13');
			$getTemplate = (isset($template) && in_array($template,$templateArray) ) ? $template : 'template-2';

			switch ($getTemplate) {

				case 'template-1':
				case 'template-2':
				case 'template-3':
				default:

					$output .= '<div class="internal-linking-related-contents">';
					$output .= '<a ' . $target . $rel . ' href="' . esc_url($links) . '" class="' . esc_attr($getTemplate) . '">';
					$output .= '<span class="cta">';
					$output .= esc_html($cta);
					$output .= '</span>';
					$output .= '<span class="postTitle">';
					$output .= esc_html($title);
					$output .= '</span>';
					$output .= '</a>';
					$output .= '</div>';

				break;

				case 'template-11':
				case 'template-12':
				case 'template-13':

					$output .= '<div class="internal-linking-related-contents internal-linking-related-contents-' . esc_attr($getTemplate) . '">';
					
						$output .= ($cta) ? '<span class="cta">' . esc_html($cta) . '</span>' : '' ;

						$output .= '<div class="ilrcp-related-post">';
						
							$output .= '<a ' . $target . $rel . ' href="' . esc_url($links) . '" class="' . esc_attr($getTemplate) . '">';
							
								$output .= esc_html($title);
							
							$output .= '</a>';

						$output .= '</div>';

					$output .= '</div>';
	
				break;

			}
		
		return $output;
		
	}
	
	add_shortcode('ilrc', 'ilrc_function');

}

?>
