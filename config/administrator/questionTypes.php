<?php

/**
 * Questions model config
 */

return array(

	'title' => 'Question Types',

	'single' => 'question type',

	'model' => 'App\QuestionType',

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
		'question_type' => array(
			'title' => 'Question Type',
			'type' => 'text',
		),
	),
    'rules' => array(
        'description' => 'required',

    ),
    'form_width' => 500,

);