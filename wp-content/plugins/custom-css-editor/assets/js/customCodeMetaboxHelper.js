(function($){
	$(document).ready(function(){
		hookEditorResizing();
		$('.ff-custom-code-type input').click(function() {
			
			$('.ff-custom-code-type input').removeAttr('checked');
			$(this).attr('checked', 'checked');
			
			adjustEditorMode();
			
		
			return;
		});		
		
		adjustEditorMode();
		setTimeout(function() { adjustEditorMode(); }, 500);

	});
	
	var adjustEditorMode = function() {
		
		var currentMode = $('.ff-custom-code-type input[checked="checked"]').val();
		
		if(  currentMode == 'js') {
			changeEditorMode( 'javascript', 'javascript' );
			
		} else if ( currentMode == 'tracking_code' ) {
			changeEditorMode('javascript', 'tracking_code');
		} else if( currentMode == 'php' ) {
			changeEditorMode( 'php', 'php' );
		}
		else { 
			changeEditorMode( 'css', 'css' );
		}
		
		
	}
	
	var adjustScreenForPhp = function() {
		$('#CustomCodeLogic, #CustomCodePlacement #post-formats-select').hide(500);
		$('#CustomCodePlacement .ff-php-info').show(500);
		
	}
	
	var adjustScreenForOtherThanPhp = function() {
		$('#CustomCodeLogic, #CustomCodePlacement #post-formats-select').show(500);
		$('#CustomCodePlacement .ff-php-info').hide(500);
	}
	
	var changeEditorMode = function( mode, specific) {
		if( !window.ace ) {
			$('#CustomCodeContent').find('pre[data-ff-option-type="code"]').attr('data-ff-option-mode', mode);
		} else {
			var editorId =$('#CustomCodeContent').find('pre[data-ff-option-type="code"]').attr('id');
			var editor = ace.edit( editorId );
			if( mode == 'php' ) {
				adjustScreenForPhp();
				editor.getSession().setMode({path:"ace/mode/php", inline:true});
			} else {
				adjustScreenForOtherThanPhp();
				editor.getSession().setMode('ace/mode/' + mode);
			}
		}
		
		
		var $editorBefore = $('#CustomCodeContent').find('.ff-editor-before').find('.ff-editor-before-text-holder');
		var $editorAfter = $('#CustomCodeContent').find('.ff-editor-after').find('.ff-editor-after-text-holder');
		
		
		if( mode == 'css' ) {
			$editorBefore.html('&lt;style type="text/css"&gt;').removeClass('hidden');
			$editorAfter.html('&lt;/style&gt;').removeClass('hidden');
		} else if( mode == 'javascript' && specific == 'javascript') {
			$editorBefore.html('&lt;script type="text/javascript"&gt;').removeClass('hidden');
			$editorAfter.html('&lt;/script&gt;').removeClass('hidden');
		} else if( mode == 'php' ) {
			$editorBefore.html('&lt;?php').removeClass('hidden');
			$editorAfter.html('?&gt;').removeClass('hidden');
		}

		if ( specific == 'tracking_code' ) {
			$editorBefore.html(' ');//.addClass('hidden');
			$editorAfter.html(' ');//.addClass('hidden');
		} 
		//$('#CustomCodeContent').find('.ff-editor-before').html('kokot');
		//$('')
		//ff-editor-before

	}
	
	adjustEditorMode();
	
	var hookEditorResizing = function() {
		if( !window.ace ) {
			return false;
		}
		
		var editorId =$('#CustomCodeContent').find('pre[data-ff-option-type="code"]').attr('id');
		var editor = ace.edit( editorId );
		
		editor.getSession().on('change', function(){
			var gutterSize = ($('.ace_layer').outerWidth());
			$('#CustomCodeContent .ff-editor-before, #CustomCodeContent .ff-editor-after').css('margin-left', gutterSize);
			$('#CustomCodeContent .ff-editor-before-inner, #CustomCodeContent .ff-editor-after-inner').css('left', -gutterSize).css('width', gutterSize);
		});
	}
	

	
})(jQuery);