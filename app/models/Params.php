<?php

class Params extends \Eloquent {
    protected $table = 'params';
	protected $fillable = ['id', 'name', 'index', 'value'];
    public $timestamps = false;
}