jQuery.noConflict()(function($){

	"use strict";

/* ===============================================
   Get template preview
   =============================================== */

	function ilrc_get_template_preview(option) {

		var $template = $('#ilrc_template');
		var $template_val = $template.val();

		var template_array = ['template-5','template-6','template-7','template-8','template-9','template-10','template-14','template-15','template-16','template-17','template-19'];
		
		$('.ilrc_template_preview')
			.removeClass(function(index, className) {
				return (className.match(/\bilrc_preview_\S+/g) || []).join(' ');
			})
			.addClass('ilrc_preview_' + $template_val);

		if(jQuery.inArray($template_val, template_array) != -1) {
			$('#ilrc_save_settings').attr('disabled', true);
			$('.ilrc_template_preview').addClass('ilrc_pro_template_preview');
		} else {
			$('#ilrc_save_settings').attr('disabled', false);
			$('.ilrc_template_preview').removeClass('ilrc_pro_template_preview');
		}

		if (!$template.next().hasClass('ilrc_template_preview')) {
			$('<div>').addClass('ilrc_template_preview').insertAfter($template);
		}
		
		$('.ilrc_template_preview').html('<img src="' + ilrc_pluginData.path + 'images/template-previews/' + option + '.jpg">');

	}

    $('#ilrc_template').on('change',function() {
		var option = $(this).val();
		ilrc_get_template_preview(option);
	});

    $('#ilrc_template').each(function() {
		var option = $(this).val();
		ilrc_get_template_preview(option);
	});

/* ===============================================
   ColorPicker
   =============================================== */

	$('.ilrc_panel_color').wpColorPicker();

/* ===============================================
   Message, after save options
   =============================================== */

	$('.ilrc_panel_message').delay(1000).fadeOut(1000);

/* ===============================================
   DISMISS UPSELL
   =============================================== */

	$('.ilrc-upsell-dismiss').on('click', function() {

		var $upsell = $(this).closest('.ilrc-upsell');

		$upsell.fadeOut(200);

		$.post(ajaxurl, {
			action: 'ilrc_dismiss_upsell',
			nonce: ilrc_pluginData.ajax_nonce
		}).fail(function() {
			$upsell.show();
		});

	});

/* ===============================================
   RESTORE PLUGIN SETTINGS CONFIRM
   =============================================== */

	$('.ilrc_restore_settings').on("click", function(){

    	if (!window.confirm('Do you want to restore the plugin settings？')) {

			return false;

		}

	});

/* ===============================================
   SAVE PLUGIN SETTINGS
   =============================================== */

	$('#ilrc_save_settings').on("click", function(){

		var template = $('#ilrc_template').val();
		var text_color = ($('#ilrc_textcolor').val() || '').toLowerCase();
		var text_color_hover = ($('#ilrc_textcolorhover').val() || '').toLowerCase();

		var template_array = ['template-5','template-6','template-7','template-8','template-9','template-10','template-14','template-15','template-16','template-17','template-19'];

		if(jQuery.inArray(template, template_array) != -1) {
			window.alert("The selected layout is not available on the free version.");
			return false;
		}

		if( template === 'template-18' && text_color.indexOf('#fff') === 0) {
			window.alert("Please select a darker color for the text if you are using template 18.");
			return false;
		}

		if( template === 'template-18' && text_color_hover.indexOf('#fff') === 0) {
			window.alert("Please select a darker color for the text on hover if you are using template 18.");
			return false;
		}

	});

});
