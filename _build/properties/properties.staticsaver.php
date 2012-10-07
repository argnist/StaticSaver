<?php
/**
 * Properties for the StaticSaver snippet.
 *
 * @package staticsaver
 * @subpackage build
 */
$properties = array(
	array(
		'name' => 'tpl',
		'desc' => 'prop_staticsaver.tpl_desc',
		'type' => 'textfield',
		'options' => '',
		'value' => 'tpl.StaticSaver.item',
		'lexicon' => 'staticsaver:properties',
	),
	array(
		'name' => 'sortBy',
		'desc' => 'prop_staticsaver.sortby_desc',
		'type' => 'textfield',
		'options' => '',
		'value' => 'name',
		'lexicon' => 'staticsaver:properties',
	),
	array(
		'name' => 'sortDir',
		'desc' => 'prop_staticsaver.sortdir_desc',
		'type' => 'list',
		'options' => array(
			array('text' => 'ASC','value' => 'ASC'),
			array('text' => 'DESC','value' => 'DESC'),
		),
		'value' => 'ASC',
		'lexicon' => 'staticsaver:properties',
	),
	array(
		'name' => 'limit',
		'desc' => 'prop_staticsaver.limit_desc',
		'type' => 'numberfield',
		'options' => '',
		'value' => 5,
		'lexicon' => 'staticsaver:properties',
	),
	array(
		'name' => 'outputSeparator',
		'desc' => 'prop_staticsaver.outputseparator_desc',
		'type' => 'textfield',
		'options' => '',
		'value' => '',
		'lexicon' => 'staticsaver:properties',
	),
	array(
		'name' => 'toPlaceholder',
		'desc' => 'prop_staticsaver.toplaceholder_desc',
		'type' => 'combo-boolean',
		'options' => '',
		'value' => false,
		'lexicon' => 'staticsaver:properties',
	),
/*
	array(
		'name' => '',
		'desc' => 'prop_staticsaver.',
		'type' => 'textfield',
		'options' => '',
		'value' => '',
		'lexicon' => 'staticsaver:properties',
	),
	*/
);

return $properties;