<?php

class HomeController extends BaseController {

    public function index()
    {
//        dd(Auth::check());
        return View::make('home');
    }

}
