<?php

class ItemPictures extends \Eloquent {
    protected $table = 'item_pictures';
	protected $fillable = ['item_id', 'picture_id'];
    protected $primaryKey = 'item_id';
    public $timestamps = false;
}