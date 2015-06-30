<?php

/**
 * Questions model config
 */

return array(

    'title' => 'Question Categories',

    'single' => 'question category',

    'model' => 'App\QuestionCategory',

    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'order',
        'description',
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
        'description',
        'questionSet' => array(
            'title' => "Question Set",
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
        'description' => array(
            'title' => 'Question Category',
            'type' => 'text',
        ),
        'questionSet' => array(
            'type' => "relationship",
            'title' => 'Question Set', //this is the name of the Eloquent relationship method!
            'name_field' => "description",
        ),
    ),
    'rules' => array(
        'description' => 'required',
    ),

    'form_width' => 500,

);