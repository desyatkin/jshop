<?php

class YandexMoneyController extends \BaseController {

	/**
	 * Redirect URL
	 * GET /yds
	 *
	 * @return Response
	 */
	public function yd()
	{
		$secret = 's5hV95c8DwvjcaWvN9rbc4vM';

        $notification_type = Input::get('notification_type', '');
        $operation_id = Input::get('operation_id', '');
        $amount = Input::get('amount', '');
        $currency = Input::get('currency', '');
        $datetime = Input::get('datetime', '');
        $sender = Input::get('sender', '');
        $codepro = Input::get('codepro', '');
        $label = Input::get('label', '');
        $sha = sha1("$notification_type&$operation_id&$amount&$currency&$datetime&$sender&$codepro&$secret&$label");

        if( $sha == Input::get('sha1_hash', '') ) {
            $user = User::find((int)$label);
            if($user) {
                $user->money = $user->money + $amount;
                $user->save();
            }
        }

        Log::error(Input::all());
        Log::error($sha);
	}
}