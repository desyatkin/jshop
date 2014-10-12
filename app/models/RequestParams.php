<?php

class RequestParams extends \Eloquent {
    public $timestamps = false;
	protected $fillable = ['request_id', 'param_id', 'value'];

    public function param() {
        return $this->hasOne('Params', 'id', 'param_id');
    }
}