/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.height = 400; //高度
	
	config.language = 'zh-cn';   
    config.skin = 'kama';     
    config.removePlugins = 'elementspath';   
    config.extraPlugins = 'myplugin'; //新建插件   
};
