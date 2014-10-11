<?php

class Transaction extends \Eloquent {
    protected $table = 'transactions';
    public $timestamps = false;
	protected $fillable = ['type_id', 'user_id', 'value'];
}