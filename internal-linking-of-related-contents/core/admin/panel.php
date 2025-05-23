<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$optpanel = array (

	array (	"name" => "Navigation",
			"type" => "navigation",
			"item" => array(

				"Plugin_Settings" => esc_html__( 'Plugin settings','internal-linking-of-related-contents'),
				"Import_Export"	=> esc_html__( 'Import/Export','internal-linking-of-related-contents'),
				"free_vs_pro" => esc_html__( 'Free vs Pro','internal-linking-of-related-contents'),
				ILRC_SALE_PAGE . "ilrc-panel"	=> esc_html__( 'Upgrade to Premium','internal-linking-of-related-contents'),
			),

			"start" => "<ul>",
			"end" => "</ul>"
	),

	array(	"tab" => "Plugin_Settings",
			"element" =>

		array(	"type" => "start-form",
				"name" => "Plugin_Settings"),

			array(	"type" => "start-open-container",
					"name" => esc_html__( 'Plugin settings','internal-linking-of-related-contents')),

						array(
							'name' => esc_html__( 'Template','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'Select the template for the related contents. Please note that the templates marked as PRO are not available in the free version. The preview is shown only to maintain visual consistency in the selection, especially for the last three templates introduced in version 1.1.8 of the plugin','internal-linking-of-related-contents'),
							'id' => 'ilrc_template',
							'type' => 'select',
							'options' => array(
								'template-1' => esc_html__( 'Template 1','internal-linking-of-related-contents'),
								'template-2' => esc_html__( 'Template 2','internal-linking-of-related-contents'),
								'template-3' => esc_html__( 'Template 3','internal-linking-of-related-contents'),
								'template-4' => esc_html__( 'Template 4 (PRO)','internal-linking-of-related-contents'),
								'template-5' => esc_html__( 'Template 5 (PRO)','internal-linking-of-related-contents'),
								'template-6' => esc_html__( 'Template 6 (PRO)','internal-linking-of-related-contents'),
								'template-7' => esc_html__( 'Template 7 (PRO)','internal-linking-of-related-contents'),
								'template-8' => esc_html__( 'Template 8 (PRO)','internal-linking-of-related-contents'),
								'template-9' => esc_html__( 'Template 9 (PRO)','internal-linking-of-related-contents'),
								'template-10' => esc_html__( 'Template 10 (PRO)','internal-linking-of-related-contents'),
								'template-11' => esc_html__( 'Template 11','internal-linking-of-related-contents'),
								'template-12' => esc_html__( 'Template 12','internal-linking-of-related-contents'),
								'template-13' => esc_html__( 'Template 13','internal-linking-of-related-contents')
							),
							'std' => 'template-2'
						),

						array(
							'name' => esc_html__( 'Background color','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'Select the background color.','internal-linking-of-related-contents'),
							'id' => 'ilrc_backgroundcolor',
							'type' => 'color',
							'std' => '#ec7063'
						),

						array(
							'name' => esc_html__( 'Background color at hover','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'Select the background color at hover.','internal-linking-of-related-contents'),
							'id' => 'ilrc_backgroundcolorhover',
							'type' => 'color',
							'std' => '#e74c3c'
						),

						array(
							'name' => esc_html__( 'Text color','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'Select the text color.','internal-linking-of-related-contents'),
							'id' => 'ilrc_textcolor',
							'type' => 'color',
							'std' => '#ffffff'
						),

						array(
							'name' => esc_html__( 'Text color at hover','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'Select the text color at hover.','internal-linking-of-related-contents'),
							'id' => 'ilrc_textcolorhover',
							'type' => 'color',
							'std' => '#fff'
						),

						array(
							'name' => esc_html__( 'Button text color','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'Select the text color for buttons.','internal-linking-of-related-contents'),
							'id' => 'ilrc_ctatextcolor',
							'type' => 'color',
							'std' => '#ffffff'
						),

						array(
							'name' => esc_html__( 'Margin top','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'Insert the margin above the related content.','internal-linking-of-related-contents'),
							'id' => 'ilrc_margintop',
							'type' => 'text',
							'std' => '15'
						),

						array(
							'name' => esc_html__( 'Margin bottom','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'Insert the margin below the related content.','internal-linking-of-related-contents'),
							'id' => 'ilrc_marginbottom',
							'type' => 'text',
							'std' => '15'
						),

						array(
							'name' => esc_html__( 'Call to action','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'Insert the call to action for all related contents.','internal-linking-of-related-contents'),
							'id' => 'ilrc_cta',
							'type' => 'text',
							'std' => esc_html__( 'Read more', 'internal-linking-of-related-contents')
						),

						array(
							'name' => esc_html__( 'Count','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'How many related contents do you want to display?.','internal-linking-of-related-contents'),
							'id' => 'ilrc_count',
							'type' => 'select',
							'options' => array(
								'1' => esc_html__( '1','internal-linking-of-related-contents'),
								'2' => esc_html__( '2','internal-linking-of-related-contents'),
								'3' => esc_html__( '3','internal-linking-of-related-contents'),
							),
							'std' => '2'
						),

						array(
							'name' => esc_html__( 'Interval','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'After how many paragraphs do you want to insert a related content?','internal-linking-of-related-contents'),
							'id' => 'ilrc_offset',
							'type' => 'select',
							'options' => array(
								'1' => esc_html__( '1','internal-linking-of-related-contents'),
								'2' => esc_html__( '2','internal-linking-of-related-contents'),
								'3' => esc_html__( '3','internal-linking-of-related-contents'),
								'4' => esc_html__( '4','internal-linking-of-related-contents'),
								'5' => esc_html__( '5','internal-linking-of-related-contents'),
								'6' => esc_html__( '6','internal-linking-of-related-contents')
							),
							'std' => '2'
						),

						array(
							'name' => esc_html__( 'Engine search','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'How do you want to get the related contents?.','internal-linking-of-related-contents'),
							'id' => 'ilrc_enginesearch',
							'type' => 'select',
							'options' => array(
								'categories' => esc_html__( 'Based of post categories','internal-linking-of-related-contents'),
								'tags' => esc_html__( 'Based of post tags','internal-linking-of-related-contents'),
							),
							'std' => 'categories'
						),

						array(
							'name' => esc_html__( 'Target attribute','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'Set _blank to open the related content in a new window.','internal-linking-of-related-contents'),
							'id' => 'ilrc_targetattribute',
							'type' => 'select',
							'options' => array(
								'' => esc_html__( '_self','internal-linking-of-related-contents'),
								'_blank' => esc_html__( '_blank','internal-linking-of-related-contents'),
							),
							'std' => ''
						),

						array(
							'name' => esc_html__( 'Rel attribute','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'Set the rel attribute for the related contents.','internal-linking-of-related-contents'),
							'id' => 'ilrc_relattribute',
							'type' => 'select',
							'options' => array(
								'' => esc_html__( 'dofollow','internal-linking-of-related-contents'),
								'nofollow' => esc_html__( 'nofollow','internal-linking-of-related-contents'),
							),
							'std' => ''
						),

						array(
							'name' => esc_html__( 'the_content hook priority','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'If the related contents does not show, please change the priority of the_content hook.','internal-linking-of-related-contents'),
							'id' => 'ilrc_hookpriority',
							'type' => 'text',
							'std' => '999'
						),

						array(
							'name' => esc_html__( 'Show only recently published related posts','internal-linking-of-related-contents'),
							'desc' => esc_html__( 'Display only related posts published in the last X days. Set to 0 to disable the filter.','internal-linking-of-related-contents'),
							'id' => 'ilrc_filter_posts_by_days',
							'type' => 'text',
							'std' => '0'
						),

						array(
							'type' => 'save-button',
							'value' => 'Save',
							'class' => 'General'
						),

			array( "type" => "end-container"),

		array(	"type" => "end-form"),

	),
	array(	"tab" => "Import_Export",
			"element" =>

		array(	"type" => "start-form",
				"name" => "Import_Export"),

			array(	"type" => "start-open-container",
					"name" => esc_html__( 'Import / Export', 'internal-linking-of-related-contents')),

				array(	"name" => esc_html__( 'Import / Export', 'internal-linking-of-related-contents'),
						"type" => "import_export"),

			array(	"type" => "end-container"),

		array(	"type" => "end-form"),

	),

	array(	"tab" => "free_vs_pro",
			"element" =>

		array(	"type" => "start-form",
				"name" => "free_vs_pro"),

			array(	"type" => "start-open-container",
					"name" => esc_html__( 'Free vs Pro', 'internal-linking-of-related-contents')),

				array(	"name" => esc_html__( 'Free vs Pro', 'internal-linking-of-related-contents'),
						"type" => "free_vs_pro"),

			array(	"type" => "end-container"),

		array(	"type" => "end-form"),

	),

	array(	"type" => "end-tab"),

);

new ilrc_panel ($optpanel);

?>
