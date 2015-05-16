<?php

/**
 * Questions model config
 */

return array(

	'title' => 'Questions',

	'single' => 'question',

	'model' => 'App\Question',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'title',
        'question_set_id' => array(
            'title' => "Question Set",
            'relationship' => 'questionSet', //this is the name of the Eloquent relationship method!
            'select' => "description",
        ),
    ),

	/**
	 * The filter set
	 */
	'filters' => array(
        'title',
        'question_set_id' => array(
            'title' => "Question Set",
            'relationship' => 'questionSet', //this is the name of the Eloquent relationship method!
            'select' => "description",
        ),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'title' => array(
			'title' => 'Title',
			'type' => 'text',
		),
        'question_set_id' => array(
            'title' => "Question Set",
            'relationship' => 'questionSet', //this is the name of the Eloquent relationship method!
            'select' => "description",
        ),
	),

);