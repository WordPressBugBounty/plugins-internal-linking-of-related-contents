<?php 

if (!function_exists('ilrc_css_custom')) {

	function ilrc_css_custom() { 

		$css = '';

		if ( ilrc_setting('ilrc_margintop') ) :

			$css .= '
				.internal-linking-related-contents:before { margin-top:' . esc_html(ilrc_setting('ilrc_margintop')) . '}';
			
		endif;
		
		if ( ilrc_setting('ilrc_marginbottom') ) :

			$css .= '
				.internal-linking-related-contents:after { margin-bottom:' . esc_html(ilrc_setting('ilrc_marginbottom')) . '}';
			
		endif;
		
		if ( ilrc_setting('ilrc_backgroundcolor') ) :

			$css .= '
				.internal-linking-related-contents .template-1,
				.internal-linking-related-contents .template-2,
				.internal-linking-related-contents .template-3,
				.internal-linking-related-contents a.template-11,
				.internal-linking-related-contents a.template-12,
				.internal-linking-related-contents .template-18 .template-18-category { background-color:' . esc_html(ilrc_setting('ilrc_backgroundcolor')) . '!important}';

			$css .= '
				.internal-linking-related-contents .template-18 .template-18-header { border-color:' . esc_html(ilrc_setting('ilrc_backgroundcolor')) . '}';

		endif;
		
		if ( ilrc_setting('ilrc_backgroundcolorhover') ) :
			
			$css .= '
				.internal-linking-related-contents .template-1:hover,
				.internal-linking-related-contents .template-1:active,
				.internal-linking-related-contents .template-1:focus,
				.internal-linking-related-contents .template-2 span.cta,
				.internal-linking-related-contents .template-2:hover,
				.internal-linking-related-contents .template-2:active,
				.internal-linking-related-contents .template-2:focus,
				.internal-linking-related-contents .template-3:hover,
				.internal-linking-related-contents .template-3:active,
				.internal-linking-related-contents .template-3:focus,
				.internal-linking-related-contents .template-3 .postTitle,
				.internal-linking-related-contents a.template-11:hover,
				.internal-linking-related-contents a.template-11:active,
				.internal-linking-related-contents a.template-11:focus,
				.internal-linking-related-contents a.template-12:hover,
				.internal-linking-related-contents a.template-12:active,
				.internal-linking-related-contents a.template-12:focus,
				.internal-linking-related-contents .template-18 .template-18-category:hover ,
				.internal-linking-related-contents .template-18 .template-18-category:active ,
				.internal-linking-related-contents .template-18 .template-18-category:focus { background-color:' . esc_html(ilrc_setting('ilrc_backgroundcolorhover')) . '!important}';

		endif;
				
		if ( ilrc_setting('ilrc_textcolor') ) :
			
			$css .= '
				.internal-linking-related-contents .template-1 span,
				.internal-linking-related-contents .template-2 span.postTitle,
				.internal-linking-related-contents .template-3 span.cta,
				.internal-linking-related-contents a.template-11 ,
				.internal-linking-related-contents a.template-12 ,
				.internal-linking-related-contents a.template-13 ,
				.internal-linking-related-contents .template-18 .template-18-title a ,
				.internal-linking-related-contents .template-18 .template-18-excerpt { color:' . esc_html(ilrc_setting('ilrc_textcolor')) . '}';

		endif;

		if ( ilrc_setting('ilrc_textcolorhover') ) :

			$css .= '
				.internal-linking-related-contents .template-1:hover span,
				.internal-linking-related-contents .template-2:hover span.postTitle,
				.internal-linking-related-contents .template-3:hover span.cta,
				.internal-linking-related-contents a.template-11:hover ,
				.internal-linking-related-contents a.template-12:hover ,
				.internal-linking-related-contents a.template-13:hover ,
				.internal-linking-related-contents .template-18 .template-18-title a:hover ,
				.internal-linking-related-contents .template-18 .template-18-title a:active ,
				.internal-linking-related-contents .template-18 .template-18-title a:focus { color:' . esc_html(ilrc_setting('ilrc_textcolorhover')) . '!important}';
		endif;

		if ( ilrc_setting('ilrc_ctatextcolor') ) :
			
			$css .= '
				.internal-linking-related-contents .template-2 span.cta,
				.internal-linking-related-contents .template-3 span.postTitle { color:' . esc_html(ilrc_setting('ilrc_ctatextcolor')) . '}';
			
		endif;
		
		wp_add_inline_style( 'ilrc_style', $css );
		
	}

	add_action('wp_enqueue_scripts', 'ilrc_css_custom', 999);

}

?>