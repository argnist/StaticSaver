<?php
/**
 * Loads system settings into build
 *
 * @package staticsaver
 * @subpackage build
 */
$settings = array();


$settings[0]= $modx->newObject('modSystemSetting');
$settings[0]->fromArray(array(
	'key' => 'staticsaver.static_file_extension',
	'value' => 'php',
	'xtype' => 'textfield',
	'namespace' => 'staticsaver',
	'area' => 'file',
),'',true,true);

$settings[1]= $modx->newObject('modSystemSetting');
$settings[1]->fromArray(array(
	'key' => 'staticsaver.static_plugin_media_source',
	'value' => '1',
	'xtype' => 'modx-combo-source',
	'namespace' => 'staticsaver',
	'area' => 'file',
),'',true,true);

$settings[2]= $modx->newObject('modSystemSetting');
$settings[2]->fromArray(array(
	'key' => 'staticsaver.static_snippet_media_source',
	'value' => '1',
	'xtype' => 'modx-combo-source',
	'namespace' => 'staticsaver',
	'area' => 'file',
),'',true,true);

$settings[3]= $modx->newObject('modSystemSetting');
$settings[3]->fromArray(array(
	'key' => 'staticsaver.static_template_media_source',
	'value' => '1',
	'xtype' => 'modx-combo-source',
	'namespace' => 'staticsaver',
	'area' => 'file',
),'',true,true);

$settings[4]= $modx->newObject('modSystemSetting');
$settings[4]->fromArray(array(
	'key' => 'staticsaver.static_tv_media_source',
	'value' => '1',
	'xtype' => 'modx-combo-source',
	'namespace' => 'staticsaver',
	'area' => 'file',
),'',true,true);

$settings[5]= $modx->newObject('modSystemSetting');
$settings[5]->fromArray(array(
	'key' => 'staticsaver.static_chunk_media_source',
	'value' => '1',
	'xtype' => 'modx-combo-source',
	'namespace' => 'staticsaver',
	'area' => 'file',
),'',true,true);


return $settings;