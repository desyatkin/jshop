<?php

class City extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'city';
    public $timestamps = false;
    protected $fillable = ['name'];
}
