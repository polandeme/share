/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.toolbar = 'SH';
	 
	//
	    config.toolbar_SH =
        [
        // ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        ['Format'],
        ['Bold','Italic','Strike'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
        ['Link','Unlink'],
        // ['Maximize','-','About'] //- 分隔符
        ];
	//禁止拖拽
	config.resize_enabled = false;
	//禁止右键菜单
	// config.menu_groups = '';
	// 移除状态栏
	config.removePlugins = 'elementspath';

};
