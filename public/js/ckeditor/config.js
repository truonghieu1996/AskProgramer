/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.uiColor = '#AADC6E';
	config.skin = 'office2013';
	config.height = 500;
	config.removePlugins = 'elementspath';
	config.resize_enabled = false;
	config.toolbarGroups = [
		{name: 'pbckcode'},
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'editing' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		'/',
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'others', groups: [ 'others' ] }
	];
	config.extraPlugins = 'pbckcode';
	config.allowedContent = 'pre[*]{*}(*)';
	config.pbckcode = {
	    cls: '',
	    highlighter: 'PRETTIFY',
	    modes: [['HTML', 'html'], ['CSS', 'css'], ['PHP', 'php'], ['JS', 'javascript'], ['C/C++', 'c_cpp'],['C#', 'csharp'],['SQL', 'sql'],['Java', 'java']],
	    theme: 'textmate',
	    tab_size: '4'
	};
	config.removeButtons = 'Save,Print,Paste,PasteFromWord,Subscript,Superscript,Language,Anchor,Flash,SpecialChar,PageBreak';
	
	config.filebrowserBrowseUrl			= 'http://127.0.0.1:8080/fit/public/js/ckfinder/ckfinder.html?type=Files';
	config.filebrowserImageBrowseUrl	= 'http://127.0.0.1:8080/fit/public/js/ckfinder/ckfinder.html?type=Images';
	config.filebrowserUploadUrl			= 'http://127.0.0.1:8080/fit/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl	= 'http://127.0.0.1:8080/fit/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
};
