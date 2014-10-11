<?php

class ItemCompares extends \Eloquent {
    protected $table = 'item_compares';
	protected $fillable = ['id', 'name', 'index'];
    public $timestamps = false;
}