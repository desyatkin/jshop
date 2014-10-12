<?php

use \Jshop\Forms\SignupForm as SignupForm;

class SignupController extends \BaseController {

    /**
     * @var SignupForm
     */
    private $signupForm;

    /**
     * @param SignupForm $signupForm
     */
    function __construct(SignupForm $signupForm) {
        $this->signupForm = $signupForm;
    }


    /**
	 * Показываем форму
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('signup.index');
	}



	/**
	 * Сохраняем пользователя
	 *
	 * @return Response
	 */
	public function store()
	{
        try {
            $this->signupForm->validate(Input::all());

            $user = User::create([
                'email'    => Input::get('email'),
                'password' => Hash::make(Input::get('password'))
            ]);

            Auth::login($user);
        } catch(\Laracasts\Validation\FormValidationException $e) {
            return Redirect::to('/')
                ->with(Input::all())
                ->withErrors($e->getErrors());
        }
        return Redirect::to('/');
	}


}
