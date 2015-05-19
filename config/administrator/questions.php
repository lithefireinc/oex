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
        'question',
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
        'question' => array(
            'title' => "Question",
            'type' => 'textarea',
            'height' => 130
        ),
        'questionSet' => array(
            'type' => "relationship",
            'title' => 'Question Set', //this is the name of the Eloquent relationship method!
            'name_field' => "description",
        ),
	),
    'rules' => array(
        'question_set_id' => 'required',
        'question' => 'required',

    ),
    'messages' => array(
        'question_set_id.required' => 'Select a question set.'
    ),
    'form_width' => 500,

);