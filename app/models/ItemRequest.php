<?php

class ItemRequest extends \Eloquent
{
    protected $table = 'requests';
    protected $fillable = ['user_id', 'item_id', 'status_id', 'money', 'description'];

    public function payItem($money)
    {
        try {
            DB::beginTransaction();

            $this->money = $this->money + $money;
            $this->save();
            //Делаем историю
            Transaction::create([
                'user_id'    => $this->user_id,
                'to_user_id' => 0,
                'type_id'    => 2,
                'item_id'    => $this->item_id,
                'value'      => $money
            ]);

            $this->user->money = $this->user->money - $money;
            $this->user->save();
            DB::commit();
        }catch (\Exception $e) {
            $result['errors'][] = $e->getMessage();
            DB::rollback();
        }
    }

    public function addParam($param_id, $value)
    {
        RequestParams::create([
            'request_id' => $this->id,
            'param_id'   => $param_id,
            'value'      => $value
        ]);
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
}