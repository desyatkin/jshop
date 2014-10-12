<?php

class ItemsParams extends \Eloquent {
    protected $table = 'items_params';
	protected $fillable = ['id', 'item_id', 'param_id', 'compare_id', 'value'];
    public $timestamps = false;

    public function param() {
        return $this->hasOne('Params', 'id', 'param_id');
    }
}