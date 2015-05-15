<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Question Sets',

	'single' => 'question set',

	'model' => 'App\QuestionSet',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'description',
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'description',
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'description' => array(
			'title' => 'Description',
			'type' => 'text',
		),
	),

);