"use strict";

(function($){

	frslib.provide('frslib._classes.shortcodes');
	frslib.provide('frslib._instances.shortcodes');

	frslib._classes.shortcodes._shortcode_ff_abstract = function() {

//##############################################################################
//# INHERITANCE
//##############################################################################


		// itself
		var _ = {};


//##############################################################################
//#	PARAMS
//##############################################################################


		// shortcode HTML helpers

		_.buttonEdit = '<span class="freshface-shortcode-edit">.</span>';
		_.buttonDelete = '<span class="freshface-shortcode-delete">.</span>';

		_.shortcodeHTML_prefix = '<span class="freshface-shortcode" data-shortcode="ff_$1" contenteditable="false"$2>';
		_.shortcodeHTML_suffix = '</span>';

		_.shortcodeHTML = _.shortcodeHTML_prefix + _.buttonEdit + _.buttonDelete + _.shortcodeHTML_suffix;


//##############################################################################
//# CLEANING MESS FROM HELPERS
//##############################################################################


		_.replaceEditButton = function( content ){
			content = content.replace( /<span class="freshface-shortcode-edit">.<\/span>/g, '' );
			return content;
		}

		_.replaceDeleteButton = function( content ){
			content = content.replace( /<span class="freshface-shortcode-delete">.<\/span>/g, '' );
			return content;
		}

		_.replaceFreshFaceShortcodeClass = function( content ){
			content = content.replace( /class="freshface-shortcode"/g, '' );
			return content;
		}

		_.replaceFreshFaceShortcodeAttributes = function( content ){
			content = content.replace( /contenteditable="false"/g, '' );
			return content;
		}

		_.cleanMessFromHelpers = function( content ){
			content = _.replaceEditButton( content );
			content = _.replaceDeleteButton( content );
			content = _.replaceFreshFaceShortcodeClass( content );
			content = _.replaceFreshFaceShortcodeAttributes( content );
			return content;
		}


//##############################################################################
//# EXECUTIVE FUNCTIONS Swap to HTML, Swap to Text
//##############################################################################


		_.tinyMCE_Shortcode_Delete_Click = function( $shortcodeHTML ){
			$shortcodeHTML.remove();
		}

		_.tinyMCE_BeforeSetContent = function( content ){;
			content = content.replace( /\[\/ff_([^\]]*)\]/g , '' );
			content = content.replace(/\[ff_([^\s]+)([^\]]*)\/]/g, _.shortcodeHTML);
			content = content.replace(/\[ff_([^\s]+)([^\]]*)\]/g, _.shortcodeHTML);
			return content;
		}

		_.tinyMCE_PostProcess = function( content ){
			content = _.cleanMessFromHelpers( content );

			content = content.replace(/<span ([^\>]*)data-shortcode="ff_([^\s]*)"([^\>]*)><\/span>/g, '[ff_$2 $1 $3]');
			content = content.replace(/\[ff_([^\s]+)\s+([^\>]*)\]/g, '[ff_$1 $2]');
			content = content.replace(/\[([^\]^\s]*)\s+([^\]^\s]*)\]/g, '[$1 $2]');
			return content;
		}


//##############################################################################
//# RETURN ITSELF;
//##############################################################################


		return _;


	};


})(jQuery);
