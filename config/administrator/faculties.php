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
        'ADVICODE',
        'IDNO',
        'ADVISER',
    ),

    /**
     * The filter set
     */
    'filters' => array(
        'ADVISER',
        'IDNO',
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'ADVISER' => array(
            'title' => 'Adviser',
            'type' => 'text',
        ),
        'IDNO' => array(
            'title' => 'ID number',
            'type' => 'text',
        ),
    ),

);