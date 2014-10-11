<?php

class Items extends \Eloquent {
    protected $table = 'items';
	protected $fillable = ['id', 'user_id', 'city_id', 'name', 'description', 'status_id', 'end_date'];
}