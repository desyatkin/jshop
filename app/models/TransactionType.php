<?php

class TransactionType extends \Eloquent {
    protected $table = 'transaction_types';
    public $timestamps = false;
	protected $fillable = ['name'];
}