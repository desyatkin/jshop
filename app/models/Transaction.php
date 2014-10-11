<?php

class Transaction extends \Eloquent
{
    protected $table = 'transactions';
    public $timestamps = false;
    protected $fillable = ['type_id', 'item_id', 'user_id', 'value'];

    public function type()
    {
        return $this->belongsTo('TransactionType', 'type_id');
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function item()
    {
        return $this->belongsTo('Item', 'item_id');
    }
}