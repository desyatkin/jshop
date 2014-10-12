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
        DB::insert('INSERT INTO request_params(request_id, param_id, value) VALUES (:request_id, :param_id, :value)'
        ,['request_id' => $this->id,
          'param_id'   => $param_id,
          'value'      => $value]);
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function params()
    {
        return $this->hasMany('RequestParams', 'request_id');
    }

    public function countParams()
    {
        return (RequestParams::where('request_id', '=', $this->id)->where('param_id', '=', 4)->first());
    }
}