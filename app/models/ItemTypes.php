<?php

class ItemTypes extends \Eloquent {
    protected  $table = 'item_types';
	protected $fillable = ['id', 'name'];
    public $timestamps = false;
}