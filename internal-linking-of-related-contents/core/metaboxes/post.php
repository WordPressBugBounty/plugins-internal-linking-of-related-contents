<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

new ilrc_metaboxes (

	'post', 
	
	array(

		array(
			'type' => 'switch',
			'label' => esc_html__( 'Article without related posts','internal-linking-of-related-contents'),
			'description' => esc_html__( 'Do you want to remove the related posts from this article?','internal-linking-of-related-contents'),
			'id' => 'ilrc_exclude_related_posts',
			'std' => 'off',
		),

	)
	
);

?>