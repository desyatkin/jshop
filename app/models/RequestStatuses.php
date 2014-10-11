<?php

class RequestStatuses extends \Eloquent
{
    protected $table = 'request_statuses';
    protected $fillable = ['id', 'name', 'index'];
    public $timestamps = false;
}