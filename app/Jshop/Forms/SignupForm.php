<?php namespace Jshop\Forms;

use Laracasts\Validation\FormValidator;

class SignupForm extends FormValidator {

    /**
     * Validation rules for logging in
     *
     * @var array
     */
    protected $rules = [
        'email' => 'required|email|unique:users',
        'password' => 'required'
    ];

}