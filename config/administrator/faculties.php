<?php

/**
 * Faculties model config
 */

return array(

    'title' => 'Faculties',

    'single' => 'faculty',

    'model' => 'App\Faculty',

    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'last_name',
        'first_name',
        'middle_name',
    ),

    /**
     * The filter set
     */
    'filters' => array(
        'last_name',
        'first_name',
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'last_name' => array(
            'title' => 'Last Name',
            'type' => 'text',
        ),
        'middle_name' => array(
            'title' => 'Middle Name',
            'type' => 'text',
        ),
        'first_name' => array(
            'title' => 'First Name',
            'type' => 'text',
        ),
    ),

);