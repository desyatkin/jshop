<?php namespace Jshop\Forms;

use Laracasts\Validation\FormValidator;

class SigninForm extends FormValidator {

    /**
     * Validation rules for logging in
     *
     * @var array
     */
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

}