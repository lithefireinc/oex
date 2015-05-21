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
        'question_type',
    ),

	/**
	 * The filter set
	 */
	'filters' => array(
        'question_type',
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
        'question_type' => 'required',

    ),
    'form_width' => 500,

);