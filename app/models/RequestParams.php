<?php

class RequestParams extends \Eloquent {
    public $timestamps = false;
	protected $fillable = ['request_id', 'param_id', 'value'];
}