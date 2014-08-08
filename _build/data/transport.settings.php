<?php
/**
 * Loads system settings into build
 *
 * @package staticsaver
 * @subpackage build
 */
$settings = array();

$settings['static_enable_rewrite']= $modx->newObject('modSystemSetting');
$settings['static_enable_rewrite']->fromArray(array(
    'key' => 'staticsaver.enable_rewrite',
    'value' => '0',
    'xtype' => 'combo-boolean',
    'namespace' => 'staticsaver',
    'area' => 'file',
),'',true,true);

$settings['static_file_extension']= $modx->newObject('modSystemSetting');
$settings['static_file_extension']->fromArray(array(
    'key' => 'staticsaver.static_file_extension',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'staticsaver',
    'area' => 'file',
),'',true,true);

$settings['static_chunk_file_extension']= $modx->newObject('modSystemSetting');
$settings['static_chunk_file_extension']->fromArray(array(
	'key' => 'staticsaver.static_chunk_file_extension',
	'value' => 'php',
	'xtype' => 'textfield',
	'namespace' => 'staticsaver',
	'area' => 'file',
),'',true,true);

$settings['static_snippet_file_extension']= $modx->newObject('modSystemSetting');
$settings['static_snippet_file_extension']->fromArray(array(
    'key' => 'staticsaver.static_snippet_file_extension',
    'value' => 'php',
    'xtype' => 'textfield',
    'namespace' => 'staticsaver',
    'area' => 'file',
),'',true,true);


$settings['static_plugin_file_extension']= $modx->newObject('modSystemSetting');
$settings['static_plugin_file_extension']->fromArray(array(
    'key' => 'staticsaver.static_plugin_file_extension',
    'value' => 'php',
    'xtype' => 'textfield',
    'namespace' => 'staticsaver',
    'area' => 'file',
),'',true,true);


$settings['static_template_file_extension']= $modx->newObject('modSystemSetting');
$settings['static_template_file_extension']->fromArray(array(
    'key' => 'staticsaver.static_template_file_extension',
    'value' => 'php',
    'xtype' => 'textfield',
    'namespace' => 'staticsaver',
    'area' => 'file',
),'',true,true);


$settings['static_tv_file_extension']= $modx->newObject('modSystemSetting');
$settings['static_tv_file_extension']->fromArray(array(
    'key' => 'staticsaver.static_tv_file_extension',
    'value' => 'php',
    'xtype' => 'textfield',
    'namespace' => 'staticsaver',
    'area' => 'file',
),'',true,true);


$settings['static_plugin_media_source']= $modx->newObject('modSystemSetting');
$settings['static_plugin_media_source']->fromArray(array(
	'key' => 'staticsaver.static_plugin_media_source',
	'value' => '1',
	'xtype' => 'modx-combo-source',
	'namespace' => 'staticsaver',
	'area' => 'file',
),'',true,true);

$settings['static_snippet_media_source']= $modx->newObject('modSystemSetting');
$settings['static_snippet_media_source']->fromArray(array(
	'key' => 'staticsaver.static_snippet_media_source',
	'value' => '1',
	'xtype' => 'modx-combo-source',
	'namespace' => 'staticsaver',
	'area' => 'file',
),'',true,true);

$settings['static_template_media_source']= $modx->newObject('modSystemSetting');
$settings['static_template_media_source']->fromArray(array(
	'key' => 'staticsaver.static_template_media_source',
	'value' => '1',
	'xtype' => 'modx-combo-source',
	'namespace' => 'staticsaver',
	'area' => 'file',
),'',true,true);

$settings['static_tv_media_source']= $modx->newObject('modSystemSetting');
$settings['static_tv_media_source']->fromArray(array(
	'key' => 'staticsaver.static_tv_media_source',
	'value' => '1',
	'xtype' => 'modx-combo-source',
	'namespace' => 'staticsaver',
	'area' => 'file',
),'',true,true);

$settings['static_chunk_media_source']= $modx->newObject('modSystemSetting');
$settings['static_chunk_media_source']->fromArray(array(
	'key' => 'staticsaver.static_chunk_media_source',
	'value' => '1',
	'xtype' => 'modx-combo-source',
	'namespace' => 'staticsaver',
	'area' => 'file',
),'',true,true);

$settings['static_default']= $modx->newObject('modSystemSetting');
$settings['static_default']->fromArray(array(
    'key' => 'staticsaver.static_default',
    'value' => '0',
    'xtype' => 'combo-boolean',
    'namespace' => 'staticsaver',
    'area' => 'file',
),'',true,true);

$settings['include_category']= $modx->newObject('modSystemSetting');
$settings['include_category']->fromArray(array(
    'key' => 'staticsaver.include_category',
    'value' => '0',
    'xtype' => 'combo-boolean',
    'namespace' => 'staticsaver',
    'area' => 'file',
),'',true,true);

$settings['filename_sanitize']= $modx->newObject('modSystemSetting');
$settings['filename_sanitize']->fromArray(array(
    'key' => 'staticsaver.filename_sanitize',
    'value' => '0',
    'xtype' => 'combo-boolean',
    'namespace' => 'staticsaver',
    'area' => 'file',
),'',true,true);

$settings['filename_sanitize_search']= $modx->newObject('modSystemSetting');
$settings['filename_sanitize_search']->fromArray(array(
    'key' => 'staticsaver.filename_sanitize_search',
    'value' => '[^\w\.]',
    'xtype' => 'textfield',
    'namespace' => 'staticsaver',
    'area' => 'file',
),'',true,true);

$settings['filename_sanitize_replace']= $modx->newObject('modSystemSetting');
$settings['filename_sanitize_replace']->fromArray(array(
    'key' => 'staticsaver.filename_sanitize_replace',
    'value' => '_',
    'xtype' => 'textfield',
    'namespace' => 'staticsaver',
    'area' => 'file',
),'',true,true);

$settings['preserve_case']= $modx->newObject('modSystemSetting');
$settings['preserve_case']->fromArray(array(
    'key' => 'staticsaver.preserve_case',
    'value' => '0',
    'xtype' => 'combo-boolean',
    'namespace' => 'staticsaver',
    'area' => 'file',
),'',true,true);

return $settings;