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

			$templateArray = array('template-1','template-2','template-3','template-11','template-12','template-13','template-18');
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

				case 'template-18':
					
					$post_date = get_the_date();
					$categories = get_the_category( $postid );

					$comments_number = get_comments_number($postid);
					$comments_label = sprintf(
						_n('%s comment', '%s comments', $comments_number, 'internal-linking-related-contents-pro'),
						number_format_i18n($comments_number)
					);

					$meta_parts = array();

					if ( !empty($post_date) ) {
						$meta_parts[] = $post_date;
					}

					if ( !empty($comments_label) ) {
						$meta_parts[] = $comments_label;
					}

					$post_excerpt = get_post_field('post_excerpt', $postid);
					if ( !empty($post_excerpt) ) {
						$post_excerpt = wp_trim_words(wp_strip_all_tags($post_excerpt), 22, '...');
					} elseif ( $relatedPost && !empty($relatedPost->post_content) ) {
						$post_excerpt = wp_trim_words(wp_strip_all_tags($relatedPost->post_content), 22, '...');
					} else {
						$post_excerpt = '';
					}

					$output .= '<div class="internal-linking-related-contents">';

						$output .= '<div class="template-18">';

							$output .= '<div class="template-18-inner">';

								$template_18_categories = ilrc_get_categories_markup(
									$categories,
									array(
										'linkable'   => true,
										'item_class' => 'template-18-category',
									)
								);

								if ( ! empty( $template_18_categories ) ) {
									$output .= '<div class="template-18-header">';
										$output .= $template_18_categories;
									$output .= '</div>';
								}

								$output .= '<h3 class="postTitle template-18-title">';
									$output .= '<a ' . $target . $rel . ' href="' . esc_url($links) . '">';
										$output .= esc_html($title);
									$output .= '</a>';
								$output .= '</h3>';

								if ( !empty($post_excerpt) ) :
									$output .= '<p class="template-18-excerpt">' . esc_html($post_excerpt) . '</p>';
								endif;

								if ( !empty($meta_parts) ) :

									$output .= '<div class="template-18-meta">';

										$meta_total = count($meta_parts);
										$meta_index = 0;

										foreach ( $meta_parts as $meta_part ) :

											$meta_index++;

											$output .= '<span>' . esc_html($meta_part) . '</span>';

											if ( $meta_index < $meta_total ) :
												$output .= '<span class="template-18-separator">&#8226;</span>';
											endif;

										endforeach;

									$output .= '</div>';

								endif;

							$output .= '</div>';

						$output .= '</div>';

					$output .= '</div>';
	
				break;

			}
		
		return $output;
		
	}
	
	add_shortcode('ilrc', 'ilrc_function');

}

?>
