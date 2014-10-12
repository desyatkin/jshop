<?php

use \Jshop\Forms\addItemForm as addItemForm;

class ItemsController extends \BaseController {

    /**
     * @var $addItemForm
     */
    private $addItemForm;

    /**
     * @param addItemForm $addItemForm
     */
    function __construct(addItemForm $addItemForm) {
        $this->addItemForm = $addItemForm;
    }


    /**
	 * Показываем список доступных покупок
	 *
	 * @return Response
	 */
	public function index()
	{
        $items = Items::paginate(9);

        return View::make('items.index')
                    ->with('items', $items);
	}


	/**
	 * Показываем форму для добавления новой покупки
	 *
	 * @return Response
	 */
	public function create()
    {
        $types    = ItemTypes::all();
        $params   = Params::all();
        $compares = ItemCompares::all();
        $cities   = City::all();

        return View::make('items.create')
            ->with('params', $params)
            ->with('compares', $compares)
            ->with('cities', $cities)
            ->with('types', $types);
    }


    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $this->addItemForm->validate(Input::all());

        $item_type_id = Input::get('item_type');

        $item              = new Items;
        $item->city_id     = Input::get('city');
        $item->user_id     = Auth::user()->id;
        $item->name        = Input::get('name');
        $item->description = Input::get('description');
        $item->type_id     = $item_type_id;
        $item->unit        = Input::get('unit');
        $item->save();


        if(Input::hasFile('files')) {
            $files = Input::file('files');
            $rules = array(
                'image' => 'image'
            );
            foreach($files as $file) {
                $input = array('image' => $file );
                $validator = Validator::make($input, $rules);
                /* @var $file Symfony\Component\HttpFoundation\File\UploadedFile */
                if (!$validator->fails())
                {
                    $newFileName = md5(time()). '.' . $file->getClientOriginalExtension();
                    $pic = Pictures::create([
                        'name' => $file->getClientOriginalName(),
                        'path' => $newFileName,
                    ]);

                    $file->move(Config::get('app.upload_img_dir'), $newFileName);

                    ItemPictures::create([
                        'item_id' => $item->id,
                        'picture_id' => $pic->id
                    ]);
                }
            }
        }

        switch ($item_type_id) {
            // Количественная
            case 1:
                // Максимальное количество
                ItemsParams::create([
                    'item_id'    => $item->id,
                    'param_id'   => 4,
                    'compare_id' => 2,
                    'value'      => Input::get('max_unit')
                ]);

                // Стоимость
                ItemsParams::create([
                    'item_id'    => $item->id,
                    'param_id'   => 1,
                    'compare_id' => 3,
                    'value'      => Input::get('cost_unit')
                ]);

                break;

            // Составная
            case 2:
                $param_names = Input::get('param_name');
                $compares    = Input::get('compare');
                $values      = Input::get('value');

                foreach($param_names as $key => $param_name) {
                    ItemsParams::create([
                        'item_id' => $item->id,
                        'param_id' => ItemsParams::find($param_name)->first()->id,
                        'compare_id' => ItemCompares::find($compares[$key])->first()->id,
                        'value' => $values[$key]
                    ]);
                }

                break;

            default:
                break;
        }

        return Redirect::to('/items');
	}


	/**
	 * Показываем покупку
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$item = Items::find($id);

        switch($item->type_id){
            case 1:
                $params = [
                    'max_unit' => ItemsParams::where('item_id', $item->id)->where('param_id', 4)->where('compare_id', 2)->first()->value,
                    'cost_unit' => ItemsParams::where('item_id', $item->id)->where('param_id', 1)->where('compare_id', 3)->first()->value
                ];
                break;
            case 2:
                $params = ItemsParams::where('item_id', $item->id)->distinct('param_id')->get();
                dd($params);
                break;
            default:
                break;
        }

        return View::make('items.show')
                    ->with('params', $params)
                    ->with('item', $item);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
