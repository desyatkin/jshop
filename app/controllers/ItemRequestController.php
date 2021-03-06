<?php

use \Jshop\Forms\AddItemRequestForm as addItemRequestForm;

class ItemRequestController extends \BaseController {

    /**
     * @var $addItemRequesForm
     */
    private $addItemRequestForm;

    /**
     * @param AddItemRequestForm $addItemRequestForm
     */
    function __construct(AddItemRequestForm $addItemRequestForm) {
        $this->addItemRequestForm = $addItemRequestForm;
    }

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
//        $this->addItemRequestForm->validate(Input::all());
        $user = Auth::user();

        $item_id = (int)Input::get('item_id', false);
        $description = Input::get('description', '');
        $item = Items::find($item_id);
        if($item) {
            switch($item->type_id) {
                case 1:
                    $number = (int)Input::get('number', false);
                    if($number) {
                        $summ = $number * $item->costParam()->value;
                        if($user->money < $summ) {
                            Flash::error('У вас не достаточно средст для покупки');
                            return Redirect::to('/items/' . $item_id)->with(Input::all());
                        } else {
                            $request = ItemRequest::create([
                                'description' => $description,
                                'item_id' => $item_id,
                                'money' => 0,
                                'user_id' => $user->id,
                                'status_id' => 1
                            ]);
                            $request->addParam(4, $number);
                            $request->payItem($summ);
                        }
                    } else {
                        Flash::error('Вы не выбрали нужное кол-во');
                        return Redirect::to('/items/' . $item_id)->with(Input::all());
                    }
                break;
                case 2:
                    $params = Input::get('params', []);
                    if($params && isset($params[1])) {
                        $summ = (float)$params[1];
                        if($user->money < $summ) {
                            Flash::error('У вас не достаточно средст для покупки');
                            return Redirect::to('/items/' . $item_id)->with(Input::all());
                        } else {
                            $request = ItemRequest::create([
                                'description' => $description,
                                'item_id' => $item_id,
                                'money' => 0,
                                'user_id' => $user->id,
                                'status_id' => 1
                            ]);
                            foreach ($params as $paramId => $value) {
                                $request->addParam($paramId, $value);
                            }
                            $request->payItem($summ);
                        }
                    } else {
                        Flash::error('Вы не заполнили все поля');
                        return Redirect::to('/items/' . $item_id)->with(Input::all());
                    }
                    break;
            }
        }

//        $item_type_id = Input::get('item_type');
//
//        $item              = new Items;
//        $item->city_id     = Input::get('city');
//        $item->user_id     = Auth::user()->id;
//        $item->name        = Input::get('name');
//        $item->description = Input::get('description');
//        $item->type_id     = $item_type_id;
//        $item->unit        = Input::get('unit');
//        $item->save();
//
//
//        switch ($item_type_id) {
//            // Количественная
//            case 1:
//                // Максимальное количество
//                ItemsParams::create([
//                    'item_id'    => $item->id,
//                    'param_id'   => 4,
//                    'compare_id' => 2,
//                    'value'      => Input::get('max_unit')
//                ]);
//
//                // Стоимость
//                ItemsParams::create([
//                    'item_id'    => $item->id,
//                    'param_id'   => 1,
//                    'compare_id' => 3,
//                    'value'      => Input::get('cost_unit')
//                ]);
//
//                break;
//
//            // Составная
//            case 2:
//                $param_names = Input::get('param_name');
//                $compares    = Input::get('compare');
//                $values      = Input::get('value');
//
//                foreach($param_names as $key => $param_name) {
//                    ItemsParams::create([
//                        'item_id' => $item->id,
//                        'param_id' => ItemsParams::find($param_name)->first()->id,
//                        'compare_id' => ItemCompares::find($compares[$key])->first()->id,
//                        'value' => $values[$key]
//                    ]);
//                }
//
//                break;
//
//            default:
//
//            break;
//        }

        return Redirect::to('/items/' . $item_id);
	}
}
