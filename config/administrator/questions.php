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
        'order',
        'question',
        'question_set_id' => array(
            'title' => "Question Set",
            'relationship' => 'questionSet', //this is the name of the Eloquent relationship method!
            'select' => "description",
        ),
        'question_type_id' => array(
            'title' => "Question Type",
            'relationship' => 'questionType', //this is the name of the Eloquent relationship method!
            'select' => "question_type",
        ),
    ),

	/**
	 * The filter set
	 */
	'filters' => array(
        'question',
        'question_set_id' => array(
            'title' => "Question Set",
            'relationship' => 'questionSet', //this is the name of the Eloquent relationship method!
            'select' => "description",
        ),
        'question_type_id' => array(
            'title' => "Question Type",
            'relationship' => 'questionType', //this is the name of the Eloquent relationship method!
            'select' => "question_type",
        ),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
        'order' => array(
            'title' => 'Order',
            'type' => 'number',
        ),
		'question' => array(
			'title' => 'Question',
			'type' => 'textarea',
            'height' => '200',
		),
        'questionSet' => array(
            'type' => "relationship",
            'title' => 'Question Set', //this is the name of the Eloquent relationship method!
            'name_field' => "description",
        ),
        'questionType' => array(
            'type' => "relationship",
            'title' => 'Question Type', //this is the name of the Eloquent relationship method!
            'name_field' => "question_type",
        ),
	),
    'rules' => array(
        'question_set_id' => 'required',
        'question' => 'required',
        'question_type_id' => 'required',

    ),
    'messages' => array(
        'question_set_id.required' => 'Select a question set.',
        'question_type_id.required' => 'Select a question type.',
    ),
    'form_width' => 500,

);