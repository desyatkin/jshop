<?php

class CabinetController extends \BaseController {

	/**
	 * Показываем список доступных покупок
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('cabinet.index');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit()
	{
        return View::make('cabinet.index');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{


		return Redirect::to('/cabinet/');
	}

    public function payment()
    {

    }
}
