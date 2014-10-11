<?php

use \Jshop\Forms\SigninForm as SigninForm;

class SigninController extends \BaseController {

    /**
     * @var $signinForm
     */
    private $signinForm;

    /**
     * @param SigninForm $signinForm
     */
    function __construct(SigninForm $signinForm) {
        $this->signinForm = $signinForm;
    }


    /**
	 * Показываем форму
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('signin.index');
	}

	/**
	 * Авторизуем пользователя
	 *
	 * @return Response
	 */
	public function store()
	{
        $this->signinForm->validate(Input::all());

        if(Auth::attempt([
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ])) {
            return Redirect::to('/');
        } else {
            Flash::error('Неверная пара логин:пароль');
            return Redirect::back();
        }
	}


    /**
     * Logout пользователя
     *
     * @return mixed
     */
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }


}
