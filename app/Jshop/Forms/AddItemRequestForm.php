<?php namespace Jshop\Forms;

use Laracasts\Validation\FormValidator;

class AddItemRequestForm extends FormValidator
{

    /**
     * Validation rules for add item
     *
     * @var array
     */
    protected $rules = [
        'name'        => 'required',
        'item_type'   => 'required',
        'description' => 'required'
    ];

}