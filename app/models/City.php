<?php

class City extends \Eloquent {
	protected $table = 'city';
    public $timestamps = false;
    protected $fillable = ['name'];
}
