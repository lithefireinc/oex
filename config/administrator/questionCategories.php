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
        'description',
        'order',
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
            'title' => 'Question Category',
            'type' => 'text',
        ),
        'order' => array(
            'title' => 'Order',
            'type' => 'number',
        ),
    ),
    'rules' => array(
        'description' => 'required',
    ),

    'form_width' => 500,

);