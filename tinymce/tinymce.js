function insertZazzleShortcode() {
	if (window.tinyMCE) {
		var zazzlePossibleAttrs = new Array('cols', 'rows');
		var zazzleAttrs = new Array();
		var zazzleShortCode = '[zazzle';
		for (var i = 0; i < zazzlePossibleAttrs.length; i++) {
			var key = zazzlePossibleAttrs[i];
			if (jQuery('#' + key).val() != '') {
				zazzleShortCode += ' ' + key + '="' + jQuery('#' + key).val() + '"';
			}
		}
		zazzleShortCode += ']';

		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, zazzleShortCode);
		//Repaints the editor. Sometimes the browser has graphic glitches. 
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}