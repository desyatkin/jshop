<?php

class ItemStatuses extends \Eloquent {
    protected $table = 'item_statuses';
	protected $fillable = ['id', 'name', 'index'];
    public $timestamps = false;
}