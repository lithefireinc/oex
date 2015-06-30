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
        'question_category_id' => array(
            'title' => "Question Category",
            'relationship' => 'questionCategory', //this is the name of the Eloquent relationship method!
            'select' => "description",
        ),
        'question_type_id' => array(
            'title' => "Question Type",
            'relationship' => 'questionType', //this is the name of the Eloquent relationship method!
            'select' => "description",
        ),
    ),

	/**
	 * The filter set
	 */
	'filters' => array(
        'question',
        'questionCategory' => array(
            'title' => "Question Category",
            'type' => 'relationship',
            'name_field' => "description",
        ),
        'questionType' => array(
            'title' => "Question Type",
            'type' => 'relationship',
            'name_field' => "description",
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
        'questionCategory' => array(
            'type' => "relationship",
            'title' => 'Question Category', //this is the name of the Eloquent relationship method!
            'name_field' => "description",
        ),
        'questionType' => array(
            'type' => "relationship",
            'title' => 'Question Type', //this is the name of the Eloquent relationship method!
            'name_field' => "description",
        ),
	),
    'rules' => array(
        'question_category_id' => 'required',
        'question' => 'required',
        'question_type_id' => 'required',

    ),
    'messages' => array(
        'question_category_id.required' => 'Select a question category.',
        'question_type_id.required' => 'Select a question type.',
    ),
    'form_width' => 500,

);