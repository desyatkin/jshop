<?php

class Pictures extends \Eloquent {
    protected $table = 'pictures';
	protected $fillable = ['id', 'name', 'path'];
}